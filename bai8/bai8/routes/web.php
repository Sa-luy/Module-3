<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

Route::get('home', function () {

    return view('welcome');
 
 })->name('home.index');
 
Route::get('login', [\App\Http\Controllers\LoginController::class, 'showFormLogin'])->name('auth.showFormLogin');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('auth.login');
Route::get('/blog', [BlogController::class, 'showBlog'])->name('show.blog');
Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('products', [ProductController::class, 'index'])->name('index');
Route::get('products/{id}', [ProductController::class, 'show'])->name('show');