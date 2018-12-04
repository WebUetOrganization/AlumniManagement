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
Auth::routes();
Route::get('/', 'AppController@show')->name('home')->middleware('auth');
//gọi trang cá nhân người dùng
Route::get('/profile/{alumni}', function (Alumni $alumni){
    return view('profile', ['alumni'=>$alumni]);
})->name('profile')->middleware('auth');
//get: gọi trang update profile, post: lưu thông tin update
Route::get('/update', 'AppController@showUpdateForm')->name('update')->middleware('auth');
Route::post('/update', 'AppController@storeInfo');
//hiển thị thống kê câu trả lời
Route::get('/statistics/{survey}/{question}', 'ChartController@showCharts')->name('showchart');
//tìm kiếm theo tên
Route::post('/search', 'AppController@search')->name('search');
//các trang khảo sát
Route::group(['prefix' => 'survey', 'middleware' => 'auth'], function (){
    Route::get('/list','SurveyController@surveyList')->name('survey.list');
    Route::get('/list/{survey}','SurveyController@questions')->name('survey.do');
    Route::post('/list/{survey}', 'SurveyController@submitSurvey')->name('survey.submit');
});
//các chức năng chỉnh sửa thông tin người dùng
Route::prefix('/edit')->group(function (){
    Route::post('/username/{placeholder}', 'EditController@editName')->name('name');
    Route::post('/userdob/{placeholder}', 'EditController@editDob')->name('birthday');
    Route::post('/userphone/{placeholder}', 'EditController@editPhone')->name('phone');
    Route::post('/useremail/{placeholder}', 'EditController@editEmail')->name('email');
    Route::post('/userschool/{placeholder}', 'EditController@editSchool')->name('school');
    Route::post('/useravatar', 'EditController@editAvatar')->name('avatar');
    Route::post('/useraddress/{placeholder1?}/{placeholder2?}', 'EditController@editAddress')->name('address');
});
//các chức năng xóa thông tin
Route::prefix('/delete')->group(function (){
    Route::post('/userdob', 'EditController@deleteDob')->name('delbirthday');
    Route::post('/userphone', 'EditController@deletePhone')->name('delphone');
    Route::post('/userschool', 'EditController@deleteSchool')->name('delschool');
    Route::post('/usercourse', 'EditController@deleteCourse')->name('delcourse');
    Route::post('/useraddress', 'EditController@deleteAddress')->name('deladdress');
});
//lưu công việc
Route::post('/savejob', 'CompanyController@saveJob')->name('savejob');
//cập nhật công việc
Route::post('/updatejob', 'CompanyController@updateJob')->name('updatejob');
//admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});