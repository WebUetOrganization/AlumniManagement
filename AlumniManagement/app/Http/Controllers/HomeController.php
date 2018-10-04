<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 9/28/2018
 * Time: 12:24 PM
 */

namespace App\Http\Controllers;

use App\Alumni;
use App\Course;
use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    //method demo
    public function show(){
        //C1: thao tac database su dung DB facade, query, lấy ra danh sách sinh viên và tên tỉnh, huyện của sv đó
//        $alumni = DB::table('alumni')->join('courses', 'alumni.course_id', '=', 'courses.id')
//            ->join('provinces', 'alumni.province_id', '=', 'provinces.id')
//            ->join('districts', 'alumni.district_id', '=', 'districts.id')
//            ->select('alumni.name', 'alumni.birthday', 'alumni.phone', 'alumni.mail','courses.name as course_name',
//                'provinces.name as province_name', 'districts.name as district_name')->get();
        //---------------------------------------------------------------------------
        //C2: thao tac database su dung Eloquent model, cũng lấy ra ds sv và tên tỉnh huyện của sv đó
        //thao tac với db nên sử dụng Eloquent model, sẽ nhanh và gọn gàng hơn rất nhiều
        $alumni = Alumni::all();                        //lay ra danh sach cuu sinh vien
        return view('home', ['alumni'=>$alumni]); //truyen danh sach vao blade template
    }
}