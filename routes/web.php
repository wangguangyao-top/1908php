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
Route::get('/brand/create','BrandController@create');
Route::post('/brand/store','BrandController@store');
Route::get('/brand','BrandController@index');
Route::get('/brand/edit/{id}','BrandController@edit');
Route::post('/brand/update/{id}','BrandController@update');
Route::get('/brand/destroy/{id}','BrandController@destroy');

