<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 10/27/2018
 * Time: 10:42 AM
 */

namespace App\Http\Controllers;
use App\Alumni;
use App\Course;
use App\District;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController {

    protected $alumni;

    public function editName(Request $request, $placeholder) {
        if ($request->filled($placeholder)){
            $sv = Auth::user()->alumni;
            $new_name = $request->input($placeholder);
            $sv->name = $new_name;
            $sv->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function editDob(Request $request, $placeholder) {
        if ($request->filled($placeholder)) {
            $sv = Auth::user()->alumni;
            $new_dob = $request->input($placeholder);
            $sv->birthday = $new_dob;
            $sv->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function editPhone(Request $request, $placeholder) {
        if ($request->filled($placeholder)) {
            $sv = Auth::user()->alumni;
            $new_phone = $request->input($placeholder);
            $sv->phone = $new_phone;
            $sv->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function editEmail(Request $request, $placeholder) {
        if ($request->filled($placeholder)) {
            $sv = Auth::user()->alumni;
            $new_email = $request->input($placeholder);
            Auth::user()->email = $new_email;
            Auth::user()->save();
            $sv->mail = $new_email;
            $sv->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function editAddress(Request $request, $placeholder1, $placeholder2) {
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        //update district
        if ($request->filled($placeholder1)) {
            $new_district = $request->input($placeholder1);
            $temp_dist = District::firstOrCreate(['name'=>$new_district]);
            $alumnus->district()->associate($temp_dist);
            $alumnus->save();
        }
        //update province
        if ($request->filled($placeholder2)) {
            $new_province = $request->input($placeholder2);
            $temp_prov = Province::firstOrCreate(['name'=>$new_province]);
            $alumnus->province()->associate($temp_prov);
            $alumnus->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function editSchool(Request $request, $placeholder) {
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if ($request->filled($placeholder)) {
            $new_school = $request->input($placeholder);
            $temp_school = Course::firstOrCreate(['school' => $new_school]);
            $alumnus->course()->associate($temp_school);
            $alumnus->save();

        }
        return redirect()->route('profile', $sv->id);
    }

    public function editAvatar(Request $request){
        //cập nhật avatar mới và lưu vào db
//        dd($request->file->getClientOriginalName());
        if ($request->hasFile('file')){
            $alumni = Auth::user()->alumni;
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/upload', $filename);
            $alumni->avatar = $filename;
            $alumni->save();
        }
        //trở về trang profile
        return redirect()->route('profile', Auth::user()->alumni_id);
    }
    public function deleteDob(){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if (!is_null($alumnus->birthday)){
            $alumnus->birthday = null;
            $alumnus->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function deletePhone(){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if (!is_null($alumnus->phone)){
            $alumnus->phone = null;
            $alumnus->save();
        }
        return redirect()->route('profile', $sv->id);
    }

    public function deleteSchool(){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if (!is_null($alumnus->course)){
            if (!is_null($alumnus->course->school)){
                $alumnus->course()->dissociate();
                $alumnus->save();
            }
        }
        return redirect()->route('profile', $sv->id);
    }

    public function deleteCourse(){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if (!is_null($alumnus->name)){
            if (!is_null($alumnus->course->name)){
                $alumnus->course()->dissociate();
                $alumnus->save();
            }
        }
        return redirect()->route('profile', $sv->id);
    }

    public function deleteAddress(){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        if (!is_null($alumnus->district)){
            if (!is_null($alumnus->district->name)){
                $alumnus->district()->dissociate();
                $alumnus->save();
            }
        }
        if (!is_null($alumnus->province)){
            if (!is_null($alumnus->province->name)){
                $alumnus->province()->dissociate();
                $alumnus->save();
            }
        }
        return redirect()->route('profile', $sv->id);
    }
}