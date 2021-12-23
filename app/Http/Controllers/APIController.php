<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;

class APIController extends Controller
{
    /**
     * register api
     */
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors(), 'status' => 0], 400); 
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('MshopApiToken')->accessToken;

        $data = [
            'token' => $token,
            'user' => $user,
            'status' => 1
        ];

        return response()->json($data, 200);
    }

    /**
     * login api
     */

    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth()->attempt($data)){
            $token = auth()->user()->createToken('MshopApiToken')->accessToken;
            return response()->json(['token' => $token,'user' => auth()->user(), 'status' => 1], 200);
        }else {
            return response()->json(['error' => 'Unauthorized', 'status' => 0], 401);
        }
    }

    /***
     * product list api
     */
    public function productList(Request $request){
        
        $perPage = 12;
        $page = $request->input("page", 1);
        $data = $request->input("query");

        $query = Product::query();
        $query->where('products.p_name', 'like', '%'.$data.'%')
                ->join('brands', 'brands.b_id','=', 'products.b_id')
                ->select('products.*', 'brands.b_name')
                ->orderBy('created_at', 'desc');
        
        $total = $query->count();

        $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        return response([
           'products' => ProductResource::collection($result),
            'total' => $total,
            'current_page' => $page,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage),
        ]);

    }

    // /***
    //  * custom pagination
    //  */
    // public function paginate($items, $perPage = 5, $page = null, $options = [])
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }
}
