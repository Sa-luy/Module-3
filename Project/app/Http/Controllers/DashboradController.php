<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function __invoke()
    {
        // dd(123);
        return view('admin.dashboard');
    }
}
