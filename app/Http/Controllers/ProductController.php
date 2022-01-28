<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{

    public function productList(){
        $products = Product::orderBy('price', 'desc')->paginate(8);
        return view('products.product_list', compact('products'));
    }



    public function productSearch(Request $request){
        if($request->ajax()){
            $req_data = str_replace(" ", "%", $request->get('query'));
            
            $products = DB::table('products')
                    ->where('p_name', 'like', '%'.$req_data.'%')
                    ->orWhere('specs', 'like', '%'.$req_data.'%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);
            
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'specs' => 'required',
            'brand_name' => 'required',
            'stock' => 'required'
        ]);

        $req_data = array();
        $req_data['p_name'] = $request->post('name');
        $req_data['price'] = $request->post('price');
        $req_data['qty'] = $request->post('qty');
        $req_data['specs'] = $request->post('specs');
        $req_data['b_id'] = $request->post('brand_name');
        $req_data['stock'] = $request->post('stock');
        
        
        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $product_photo = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $product_photo);
            $req_data['p_image'] = $product_photo;
        }

        
        Product::create($req_data);

        return redirect()->back()->with('success', 'Item has been inserted successfully.');

    }


    public function getDetail($id){
       
        $product = Product::where('p_id', $id)->first();
        $brands = Brand::all();
        if(!empty($product)){
            return view('products.edit_product', compact('product', 'brands'));
        }
    }


    public function deleteItem($id){
        $product = Product::where('p_id', $id)->delete();

        return redirect()->route('product#list')->with('success', 'Item has been deleted successfully.');
    }


    public function updateItem(Request $request, $id){
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'specs' => 'required',
            'brand_name' => 'required',
            'stock' => 'required'
        ]);

        $req_data = array();
        $req_data['p_name'] = $request->post('name');
        $req_data['price'] = $request->post('price');
        $req_data['qty'] = $request->post('qty');
        $req_data['specs'] = $request->post('specs');
        $req_data['b_id'] = $request->post('brand_name');
        $req_data['stock'] = $request->post('stock');
        
        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $product_photo = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $product_photo);
            $req_data['p_image'] = $product_photo;
        }
        $product = Product::where('p_id', $id)
                    ->update($req_data);
        
        return redirect()->back()->with('success', 'Item has been updated successfully.');
    }

}
