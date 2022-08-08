<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustommerController extends Controller
{
   public function register (){
       return view('customer.login');
    }
    public function postregister (Request $request){
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::guard('customers')->attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('dashboard');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
}
