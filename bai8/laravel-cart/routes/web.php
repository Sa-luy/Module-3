<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[\App\Http\Controllers\ShopController::class,'index'])->name('shop.index');

 

Route::get('/carts',[\App\Http\Controllers\ShopController::class,'getCart'])->name('shop.getCart');

 

Route::get('/{idProduct}/add-to-cart', [\App\Http\Controllers\ShopController::class,'addToCart'])->name('cart.addToCart');
