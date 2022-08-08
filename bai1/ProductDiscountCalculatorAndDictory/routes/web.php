<?php

use GuzzleHttp\Psr7\Request;
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

Route::get('/ProductDiscountCalculator', function () {
    return view('welcome');
});
Route::post('ProductDiscountCalculator',function(){
    $ListPrice = $_REQUEST['price'];
    $DiscountPercent = $_REQUEST['percent'];
    $DiscountAmount =  $ListPrice * $DiscountPercent * 0.1;
    $DiscountPrice = $ListPrice - $DiscountAmount ;
    return view('pefect',compact('DiscountPercent','DiscountPrice'));
});
Route::get('/Dictionary', function () {
    return view('Dictionary');
});
Route::post('/Dictionary', function () {
    $dictionary= $_REQUEST['description'];
    $arr=[
        'xinchao'=>'hello',
        'di'=>'go'
    ];
    foreach($arr as $key=>$value){
        if($dictionary==$key){
            return view('Dictionary',compact('value'));
        }
    }
});
Route::get('/add',function(){
    return view('add');
});
Route::post('/add',function(Request $request){
    dd($request->all());
});
Route::get('/edit',function(){
    return view('edit');
});
Route::put('/update',function(Request $request){
    dd($request->all());
});
Route::delete('/delete/{id}',function($id){
    dd($request->all());
});

Route::match(['get','post'],'/update',function(){

});
