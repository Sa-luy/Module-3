<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\ArrayShape;

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
Route::get('/luy', function () {
    App::setlocale('setLang');
    return __('messages.hello');
})->name('getLang');
Route::get('/setlang/{lang}', function ($lang) {
   session(['setlang'=>$lang]);
    return  redirect()->route('getLang');
})->name('setlang');
