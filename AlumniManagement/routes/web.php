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
//trang chủ gọi đến file welcome.blade.template
Route::get('/', function () {
    return view('welcome');
});
//trang alumni gọi phương thức show của HomeController
Route::get('/alumni', 'HomeController@show');

