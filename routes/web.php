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
Route::prefix('goods')->group(function(){
    Route::get('/create','goodsController@create');
    Route::post('/store','goodsController@store');
    Route::get('/index','goodsController@index');
    Route::get('/edit/{id}','goodsController@edit');
    Route::post('/update/{id}','goodsController@update');
    Route::get('/destroy/{id}','goodsController@destroy');

});
