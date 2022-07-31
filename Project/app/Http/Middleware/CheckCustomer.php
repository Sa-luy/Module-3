<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->routeIs('customer.*')){
        if(!Auth::guard('customer')->check() ){
            dd('chưa dang nhap');
                    
            return redirect()->route('customer.login');
        }
        // dd('da dang nhap');
        return $next($request);
    }
    // return redirect()->route('customer.login');
    // dd($request);
    }
}
