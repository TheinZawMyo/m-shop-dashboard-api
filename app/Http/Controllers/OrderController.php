<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use DB;

class OrderController extends Controller
{
    public function customerList(){
        
        $query = Order::query();
        $query->where('apt_rjt_order', 1)
                ->orderBy('orders.created_at', 'asc')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->select('users.id', 'users.name', 'users.phone', 'users.address', 'orders.created_at as ordered_date');
        
        $order_users = $query->distinct()->get();

        return view('orders.order_list', compact('order_users'));

    }

    public function orderList(Request $request){
        if($userId = $request->get('id')){
            $orders = Order::join('products', 'products.p_id', '=', 'orders.p_id')
                        ->join('brands', 'brands.b_id', '=', 'products.b_id')
                        ->where('orders.user_id', $userId)
                        ->select('products.*', 'brands.b_name as brand', 'orders.total as total', 'orders.qty', 'orders.order_id as orderId')
                        ->get();
            return response($orders);
        }
        return "ERROR";
    }
}
