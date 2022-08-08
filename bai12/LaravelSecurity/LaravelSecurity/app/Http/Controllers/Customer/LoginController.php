<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('customer.login');
        }

        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
