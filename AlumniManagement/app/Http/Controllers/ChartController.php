<?php

namespace App\Http\Controllers;

use App\Charts\ECharts;
use App\Charts\HighCharts;
use App\Question;
use App\Survey;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showCharts(Survey $survey, Question $question) {

        $counts = DB::table('count_answers')->where([['survey_id', '=', $survey->id], ['content', '=', $question->content]])->get();
        $label= json_decode(json_encode($counts->pluck('answer')), 'true');
        $dat = json_decode(json_encode($counts->pluck('answer_count')), 'true');

        $chart = new ECharts();
        $chart->labels($label);
        $chart->dataset($counts[0]->description, 'bar', $dat);
        $chart->width(500);
        $chart->height(400);

        $var_set = ['chart' => $chart];
        return view('charts.chartdemo', $var_set);
    }
}
