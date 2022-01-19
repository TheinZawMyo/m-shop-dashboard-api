<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class OrderController extends Controller
{
    public function list(){
        
        $order_users = DB::table('users')
                    ->select('id', 'name', 'phone', 'address')
                    ->whereExists(function ($query) {
                        $query->select(DB::raw(1))
                                ->from('orders')
                                ->whereColumn('orders.u_id', 'users.id');
                    })->get();
        // dd($order_users);
        return view('orders.order_list', compact('order_users'));
    }
}
