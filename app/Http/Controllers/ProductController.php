<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{

    public function productList(){
        $products = Product::orderBy('price', 'desc')->paginate(6);
        return view('products.product_list', compact('products'));
    }



    public function productSearch(Request $request){
        if($request->ajax()){
            $req_data = str_replace(" ", "%", $request->get('query'));
            
            $products = DB::table('products')
                    ->where('p_name', 'like', '%'.$req_data.'%')
                    ->orWhere('specs', 'like', '%'.$req_data.'%')
                    ->orderBy('price', 'desc')
                    ->paginate(6);
            
            return view('products.product_pagination', compact('products'))->render();

        }
    }

    public function newProductForm(){
        $brands = Brand::all();
        return view('products.add_product', compact('brands'));
    }

    public function saveProduct(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required',
            'qty' => 'required',
            'product_img' => 'required|image:jpeg,png,jpg|max:2048',
            'specs' => 'required',
            'brand_name' => 'required',
            'stock' => 'required'
        ]);
        // echo 'hello';
    }
}
