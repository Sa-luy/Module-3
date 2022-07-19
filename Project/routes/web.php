<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::get('/dashboard', function () {
  return view('admin.dashboard');
})->name('dashboard');




require __DIR__.'/auth.php';
Route::group(
  [
    'prefix' => 'admin',
    'middleware' => ['auth']
  ],
  function () {
    //dashboard
    Route::get('/dashboard',DashboradController::class)->name('dashboard');
    //category
    Route::resource('category', CategoryController::class);
    Route::get('category-trashed', [CategoryController::class, 'trashed'])->name('category-trashed');
    Route::post('category-trashed/{id}', [CategoryController::class, 'restore'])->name('admin.category.restore');
    Route::post('category-forceDelete/{id}', [CategoryController::class, 'forceDelete'])->name('category-force-delete');
    //product
    Route::resource('product', ProductController::class);
    Route::get('product-trashed', [ProductController::class, 'trashed'])->name('product-trashed');
    Route::post('product-trashed/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
    Route::post('product-forceDelete/{id}', [ProductController::class, 'forceDelete'])->name('product-force-delete');
    //User
    Route::resource('user', UserController::class);
    Route::get('user-trashed', [UserController::class, 'trashed'])->name('user-trashed');
    Route::post('user-trashed/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
    Route::post('user-forceDelete/{id}', [UserController::class, 'forceDelete'])->name('user-force-delete');
    //role
    Route::resource('role', RoleController::class);
    Route::get('role-trashed', [RoleController::class, 'trashed'])->name('role-trashed');
    Route::post('role-trashed/{id}', [RoleController::class, 'restore'])->name('admin.role.restore');
    Route::post('role-forceDelete/{id}', [RoleController::class, 'forceDelete'])->name('role-force-delete');



  });



