<?php

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
Route::prefix('goods')->middleware('checklogin')->group(function(){
    Route::get('/create','goodsController@create');
    Route::post('/store','goodsController@store');
    Route::get('/index','goodsController@index');
    Route::get('/edit/{id}','goodsController@edit');
    Route::post('/update/{id}','goodsController@update');
    Route::get('/destroy/{id}','goodsController@destroy');

});


Route::prefix('admin')->middleware('checklogin')->group(function(){
	Route::get('create','AdminController@create');
	Route::post('store','AdminController@store');
	Route::get('/','AdminController@index');
	Route::get('edit/{id}','AdminController@edit');
	Route::post('update/{id}','AdminController@update');
	Route::get('destroy/{id}','AdminController@destroy');
});

Route::get('/login','LoginController@login');
Route::post('/logindo','LoginController@logindo');

//品牌表
Route::prefix('brand')->middleware('checklogin')->group(function(){
Route::get('/create','BrandController@create');
Route::post('/store','BrandController@store');
Route::get('/','BrandController@index');
Route::get('/edit/{id}','BrandController@edit');
Route::post('/update/{id}','BrandController@update');
Route::get('/destroy/{id}','BrandController@destroy');
});