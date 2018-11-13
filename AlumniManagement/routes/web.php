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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//trang alumni gọi phương thức show của HomeController


//gọi trang cá nhân người dùng
Route::get('/profile/{alumni}', function (Alumni $alumni){
    return view('profile', ['alumni'=>$alumni]);
})->name('profile')->middleware('auth');

//get: gọi trang update profile, post: lưu thông tin update
Route::get('/update', 'AppController@showUpdateForm')->name('update')->middleware('auth');
Route::post('/update', 'AppController@storeInfo');

Auth::routes();
Route::get('/', 'AppController@show')->name('home')->middleware('auth');

Route::prefix('/edit')->group(function (){
    Route::post('/username/{placeholder}', 'EditController@editName')->name('name');
    Route::post('/userdob/{placeholder}', 'EditController@editDob')->name('birthday');
    Route::post('/userphone/{placeholder}', 'EditController@editPhone')->name('phone');
    Route::post('/useremail/{placeholder}', 'EditController@editEmail')->name('email');
    Route::post('/userschool/{placeholder}', 'EditController@editSchool')->name('school');
    Route::post('/useravatar', 'EditController@editAvatar')->name('avatar');
    Route::post('/useraddress/{placeholder1?}/{placeholder2?}', 'EditController@editAddress')->name('address');
});

Route::prefix('/delete')->group(function (){
    Route::post('/userdob', 'EditController@deleteDob')->name('delbirthday');
    Route::post('/userphone', 'EditController@deletePhone')->name('delphone');
    Route::post('/userschool', 'EditController@deleteSchool')->name('delschool');
    Route::post('/usercourse', 'EditController@deleteCourse')->name('delcourse');
    Route::post('/useraddress', 'EditController@deleteAddress')->name('deladdress');
});

Route::post('/savejob', 'CompanyController@saveJob')->name('savejob');
Route::post('/updatejob', 'CompanyController@updateJob')->name('updatejob');

Route::get('/statistics', 'ChartController@showCharts')->name('showchart');
