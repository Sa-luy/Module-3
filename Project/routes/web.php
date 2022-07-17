<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
  return view('admin.dashboard');
})->middleware('auth');

require __DIR__.'/auth.php';
Route::group(
  [
      'prefix' => 'admin',
      // 'middleware' => ['auth']
  ],
  function () {
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
  });
