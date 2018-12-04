<?php

namespace App\Http\Controllers;

use App\QA;
use App\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function surveyList(){
        $surveys = Survey::all();
        return view('survey.survey', ['surveys' => $surveys]);
    }

    public function questions(Survey $survey){
        return view('survey.questions', ['survey' => $survey]);
    }

    public function submitSurvey(Request $request, Survey $survey){
        $user = Auth::user();
        $do_id = DB::table('do_survey')->insertGetId(['survey_id' => $survey->id, 'user_id' => $user->id,
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        foreach ($survey->question as $question) {
            if($request->filled($question->id)){
                $answer_id = $request->input($question->id);
                DB::table('answer_question')->insert(['do_id' => $do_id, 'answer_id' => $answer_id,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }
        }
        return redirect()->route('survey.list');
    }
}
