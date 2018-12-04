<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 10/28/2018
 * Time: 1:57 PM
 */

namespace App\Http\Controllers;

use App\Alumni;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController
{
    public function saveJob(Request $request){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
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
        return redirect()->route('profile', $alumnus->id);
    }

    public function updateJob(Request $request){
        $sv = Auth::user()->alumni;
        $alumnus = Alumni::find($sv->id);
        //update thong tin ve cong ty
        if ($request->filled('company')){
            Company::where('id', $request->input('choice1'))
                ->update(['name' => $request->input('address')]);
        }
        if ($request->filled('address')){
            Company::where('id', $request->input('choice1'))
                ->update(['address' => $request->input('address')]);
        }
        if ($request->filled('choice2')){
            Company::where('id', $request->input('choice1'))
                ->update(['type' => $request->input('choice2')]);
        }
        $comp = Company::where('id', $request->input('choice1'))->first();
        //update thong tin ve cong viec
        if($request->filled('start')){
            $alumnus->company()->updateExistingPivot($comp, [
                'start_time' => $request->input('start')
            ]);
        }
        if($request->filled('quit')){
            $alumnus->company()->updateExistingPivot($comp, [
                'quit_time' => $request->input('quit')
            ]);
        }
        if($request->filled('job')){
            $alumnus->company()->updateExistingPivot($comp, [
                'job' => $request->input('job')
            ]);
        }
        if($request->filled('salary')){
            $alumnus->company()->updateExistingPivot($comp, [
                'salary' => $request->input('salary')
            ]);
        }
        return redirect()->route('profile', $alumnus->id);
    }
}