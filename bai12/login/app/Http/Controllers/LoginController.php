<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
public function resgister(){
    $user= new User();
    $user->name='admin';
    $user->email='admin@mail.com';
    $user->password=Hash::make(123456);
    $user->save();
}

    public function login(){
        return view('login');
    }
    public function storeLogin(Request $request) {
        $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:6'
            

        ]);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            //chuyen cong ta dung
            // if (Auth::guard('ten cong')attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');



    }

}
