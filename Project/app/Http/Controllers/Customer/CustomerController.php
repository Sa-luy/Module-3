<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function register()
    {
        return view('fronten.customers.register');
    }
    function login()
    {
        return view('fronten.customers.login');
    }

    function checkLogin(Request $request)
    {
        $request->validate([
            'email' =>'required|email|exists:customers,email',
            'password' => 'required|min:8|max:30'
        ],[
            'email.exists' => 'Email -'.$request->email.'- is not registered'
        ]);
        $credentials=$request->only('email','password');
        if(Auth::guard('customer')->attempt($credentials)){
            return redirect()->route('customer.home');
        }else{
            return redirect()->route('customer.login')->with('fail','Login failed!!! please try again');
        }
    }
    function customerLogout()
    {
        Auth::guard('customer')->logout();
        
        return redirect()->route('home');
    }
}
