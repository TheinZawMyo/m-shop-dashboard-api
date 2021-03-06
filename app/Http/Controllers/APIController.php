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
use App\Models\Order;

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
            return response(['error' => $validator->errors(), 'status' => 0]); 
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

        return response($data, 200);
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
            return response(['token' => $token,'user' => auth()->user(), 'status' => 1], 200);
        }else {
            return response(['error' => 'Unauthorized User', 'status' => 0]);
        }
    }

    public function updateProfile(Request $request){
        if($request){
             User::where('id', $request->id)
                    ->update([
                        'phone' => $request->phone,
                        'address' => $request->address
                    ]);
            $user = User::findOrFail($request->id);
            if($user){
                return response([
                    'message' => 'User information has been updated successfully', 
                    'status' => 1, 
                    'user' => $user]);
            }
        }
        return response(['error' => 'Something wrong!', 'status' => 0]);
        
    }

    public function userDetail(Request $request){
        $order_detail = User::where('id', $request->id)
                        ->where('orders.apt_rjt_order', '!=', 0)
                        ->join('orders', 'orders.user_id', '=', 'users.id')
                        ->join('products', 'products.p_id', '=', 'orders.p_id')
                        ->select('products.p_name as product_name', 'products.price',
                        'orders.order_id', 'orders.qty', 'orders.created_at as ordered_date', 'orders.apt_rjt_order as order_status')
                        ->orderBy('orders.created_at', 'asc')
                        ->get();
        $user_detail = User::findOrFail($request->id);  
        return response([
            'user_detail' => $user_detail,
            'order_detail' => $order_detail,
            'status' => 1
        ]);
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
                ->orderBy('products.created_at', 'desc');
        
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


    /**
     * product detail api
     */
    public function productDetail(Request $request){
        $id = $request->input('product_id');
        $product = DB::table('products')
                    ->where('p_id', $id)
                    ->join('brands', 'brands.b_id', '=', 'products.b_id')
                    ->select('products.*', 'brands.b_name')        
                    ->first();
        if($product){
            return response([
                'product' => new ProductResource($product),
                'status' => 1,
            ]);
        }else {
            return response([
                'message' => 'There is no product',
                'status' => 0
            ]);
        }
    }


    public function itemOrder(Request $request){
        if($req_data = $request->orders){
            foreach($req_data as $key => $value){
                $order = Order::create([
                    'order_id' => 'order_' .strtoupper($this->unique_code()),
                    'user_id' => $value['user_id'],
                    'p_id' => $value['p_id'],
                    'qty' => $value['qty'],
                    'total' => $value['total'],
                ]);
            }
        }
        if($order){
            return response(['success' => 'Your order is done successfully', 'status' => 1]);
        }else {
            return response(['error' => 'Your order is failed', 'status' => 0]);
        }
        // return response($request->orders);
    }

    /**
     * unique id 
     */
    function unique_code()
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
    }

}
