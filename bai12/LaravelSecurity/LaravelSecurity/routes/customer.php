<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Customer\LoginController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('customer.login');
// Route::middleware('auth:customer')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth:customer');


