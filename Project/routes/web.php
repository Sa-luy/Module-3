<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Claims\Custom;

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

//home
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::group(
  [
    'prefix' => 'guest',
  ],
  function () {
    Route::get('product_show/{id}', [HomeController::class, 'showProduct'])->name('guest.product_show');
    Route::get('category_show/{id}', [HomeController::class, 'showCategory'])->name('guest.category_show');
    // cart
    Route::get('show-cart', [CartController::class, 'showCart'])->name('showCart');
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('update-to-cart', [CartController::class, 'updateToCart'])->name('updateToCart');
    Route::get('delete-to-cart', [CartController::class, 'deleteToCart'])->name('deleteToCart');
  }
);
//chane_lang
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');



//customer
Route::prefix('customer')->group(function () {
  Route::get('login',[CustomerController::class, 'login'])->name('customer.login');
  Route::post('/checkLogin',[CustomerController::class, 'checkLogin'])->name('customer.checkLogin');

  Route::middleware(['customer:customer','PreventBackHistory'])->group(function () {
    // Route::view('/login','fronten.customers.login')->name('login');
    Route::post('/logout', [CustomerController::class, 'customerLogout'])->name('customer.logout');
    Route::get('/register',[CustomerController::class, 'register'])->name('customer.register');
  });
  Route::middleware(['customer','PreventBackHistory'])->group(function () {
    Route::view('/home','fronten.homepage')->name('customer.home');
  });
});
Route::post('/register',[CustomerController::class, 'registered'])->name('customer.checkregister');
// Route::get








require __DIR__ . '/auth.php';
Route::get('/dashboard', function () {
  return view('admin.dashboard');
})->name('dashboard')->middleware('auth');
Route::group(
  [
    'prefix' => 'admin',
    'middleware' => ['auth']
  ],
  function () {

    //dashboard
    // Route::get('/dashboard',DashboradController::class)->name('dashboard');
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

    //permissions
    Route::prefix('/permissions')->group(function () {
      Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
      Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
    });
    //orders
    Route::resource('order', OrderController::class);
    Route::get('order-trashed', [OrderController::class, 'trashed'])->name('order-trashed');
    // Route::post('user-trashed/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
    // Route::post('user-forceDelete/{id}', [UserController::class, 'forceDelete'])->name('user-force-delete');



  }
);
