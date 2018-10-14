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
use App\Alumni;

//trang alumni gọi phương thức show của HomeController
Route::get('/', 'HomeController@show')->name('home');

//gọi trang cá nhân người dùng
Route::get('/profile/{alumni}', function (Alumni $alumni){
    return view('profile', ['alumni'=>$alumni]);
})->name('profile');

//get: gọi trang update profile, post: lưu thông tin update
Route::get('/update/{alumni}', 'HomeController@showUpdateForm')->name('update');
Route::post('/update/{alumni}', 'HomeController@storeInfo');

Route::get('/welcome', function (){
    return view('welcome');
});
