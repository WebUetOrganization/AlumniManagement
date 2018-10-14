<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 9/28/2018
 * Time: 12:24 PM
 */

namespace App\Http\Controllers;

use App\Alumni;
use App\Company;
use App\Course;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class HomeController extends Controller {
    //hiển thị ds cựu sv
    public function show(){
        $alumni = Alumni::all();
        return view('navbar', ['alumni'=>$alumni]);
    }
    //hiển thị trang cập nhật thông tin
    public function showUpdateForm(Alumni $alumni) {
        return view('form', ['alumni'=>$alumni]);
    }
    //lưu thông tin người dùng cập nhật
    public function storeInfo(Request $request, Alumni $alumni){
        if ($request->filled('name')){
            $alumni->name = $request->input('name');
            $alumni->save();
        }
        if($request->filled('birth')){
            $alumni->birthday = $request->input('birth');
            $alumni->save();
        }
        if($request->filled('district')){
            $district = District::find($alumni->district->id);
            $district->name = $request->input('district');
            $district->save();
        }
        if($request->filled('province')){
            $province = Province::find($alumni->province->id);
            $province->name = $request->input('province');
            $province->save();
        }
        if($request->filled('phone')){
            $alumni->phone = $request->input('phone');
            $alumni->save();
        }
        if($request->filled('mail')){
            $alumni->mail = $request->input('mail');
            $alumni->save();
        }
        if($request->filled('alma-meter')){
            $course = Course::find($alumni->course->id);
            $course->school = $request->input('alma-meter');
            $course->save();
        }
        if($request->filled('course')){
            $course = Course::find($alumni->course->id);
            $course->name = $request->input('course');
            $course->save();
        }
        //nếu người dùng chọn 1 cty từ form select để cập nhật
        if ($request->filled('choice')){
            $company_id = $request->input('choice');           //lấy giá trị tên cty người dùng chọn trong form select để thay đổi
            $old_comp = $alumni->company()->find($company_id);      //lấy ra cty đang muốn cập nhật
            $temp_com = new Company;                                //tạo 1 cty mới (tạm thời)
            $temp_com = $old_comp;
            if ($request->filled('company')){                  //nếu người dùng chọn đổi tên cty mà mình đã/đang làm
                $new_company = $request->input('company');     //lấy tên cty mới mà người dùng muốn đổi
                $company = Company::all();                          //lấy tất cả ds cty trong bảng cty
                foreach ($company as $com){                         //duyệt ds cty vừa lấy
                    if ($com->name == $new_company){                //nếu có cty nào trùng tên với cty mà người dùng vừa nhập
                        $temp_com = $com;                           //lưu nó vào cty tạm vừa tạo (*)
                        break;                                      //thoát vòng lặp
                    }
                }
                //nếu cty vừa nhập trùng tên với 1 cty đã có trong bảng company
                if ($temp_com->name == $new_company){
                    $alumni->company()->updateExistingPivot($company_id, ['company_id'=>$temp_com->id]); //trỏ khóa ngoài của cty cũ đến cty mới
                }
                //nếu tên cty mới muốn sửa ko có trong bảng company
                else{
                    $temp_com->name = $new_company; //tạo 1 cty mới vs tên vừa nhập
                    $temp_com->save();
                    $alumni->company()->updateExistingPivot($company_id, ['company_id'=>$temp_com->id]); //trỏ khóa ngoài của cty cũ đến cty mới
                }
            }
            if ($request->filled('start')){
                $alumni->company()->updateExistingPivot($temp_com, ['start_time'=>$request->input('start')]);
            }
            if ($request->filled('quit')){
                $alumni->company()->updateExistingPivot($temp_com, ['quit_time'=>$request->input('quit')]);
            }
            if ($request->filled('job')){
                $alumni->company()->updateExistingPivot($temp_com, ['job'=>$request->input('job')]);
            }
            if ($request->filled('salary')){
                $alumni->company()->updateExistingPivot($temp_com, ['salary'=>$request->input('salary')]);
            }
        }
        //cập nhật avatar mới và lưu vào db
        if ($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $filepath = $request->file->storeAs('public/upload', $filename);
            $alumni->avatar = $filename;
            $alumni->save();
        }
        //trở về trang profile
        return redirect()->route('profile', $alumni->id);
    }

}

