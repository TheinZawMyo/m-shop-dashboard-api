<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Session;

class EmployeeController extends Controller
{
    public function index(){
        if(Session::has('LOGIN_USER')){
            return redirect()->route('order#list');
        }
        return view('login.login');
    }

    /**
     * login
     */
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:8|max:40'
        ]);
        
        $user = Employee::where('email', $request->email)->first();
        if(!empty($user) && Hash::check($request->password, $user->password)){
            Session::put('LOGIN_USER', $user);
        
            return redirect()->route('order#list');
        }else {
            return redirect()->route('emp#login')->with(['error' => 'Invalid User! Try again!']);
        }

    }

    public function logout(){
        if(Session::has("LOGIN_USER")){
            Session::forget('LOGIN_USER');
        }

        return view('login.login');
    }
}
