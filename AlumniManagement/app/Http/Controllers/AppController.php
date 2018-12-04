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
use Illuminate\Support\Facades\Auth;

class AppController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    //hiển thị ds cựu sv
    public function show(){
        $alumni = Alumni::all();
        return view('navbar', ['alumni'=>$alumni]);
    }

    public function search(Request $request){
        $name = $request->input('search');
        $alumni = Alumni::where('name', 'like',"%{$name}%")->get();
//        dd($name);
        return view('navbar', ['alumni'=>$alumni]);
    }

    //hiển thị trang cập nhật thông tin
    public function showUpdateForm() {
        return view('form');
    }

    //lưu thông tin người dùng cập nhật
    public function storeInfo(Request $request){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if ($request->filled('name')){
            $new_name = $request->input('name');
            $sv->name = $new_name;
            $sv->save();
        }

        if ($request->filled('birth')) {
            $new_dob = $request->input('birth');
            $sv->birthday = $new_dob;
            $sv->save();
        }

        if ($request->filled('phone')) {
            $new_phone = $request->input('phone');
            $sv->phone = $new_phone;
            $sv->save();
        }

        if ($request->filled('mail')) {
            $new_email = $request->input('mail');
            Auth::user()->email = $new_email;
            Auth::user()->save();
            $sv->mail = $new_email;
            $sv->save();
        }

        if ($request->filled('district')) {
            $new_district = $request->input('district');
            $temp_dist = District::firstOrCreate(['name'=>$new_district]);
            $alumnus->district()->associate($temp_dist);
            $alumnus->save();
        }
        //update province
        if ($request->filled('province')) {
            $new_province = $request->input('province');
            $temp_prov = Province::firstOrCreate(['name'=>$new_province]);
            $alumnus->province()->associate($temp_prov);
            $alumnus->save();
        }

        if ($request->filled('school')) {
            $new_school = $request->input('school');
            $temp_school = Course::firstOrCreate(['school' => $new_school]);
            $alumnus->course()->associate($temp_school);
            $alumnus->save();
        }

        if ($request->filled('company')){
            $comp = Company::firstOrCreate(
                ['name' => $request->input('company')],
                ['address' => $request->input('address'),
                    'type' => $request->input('choice')]
            );
            $alumnus->company()->attach($comp->id, [
                'start_time' => $request->input('start'),
                'quit_time' => $request->input('quit'),
                'job' => $request->input('job'),
                'salary' => $request->input('salary')
            ]);
        }

        if ($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/upload', $filename);
            $sv->avatar = $filename;
            $sv->save();
        }
        //trở về trang profile
        return redirect()->route('profile', Auth::user()->alumni_id);
    }

}

