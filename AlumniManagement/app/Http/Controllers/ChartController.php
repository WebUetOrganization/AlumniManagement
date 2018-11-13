<?php

namespace App\Http\Controllers;

use App\Charts\ECharts;
use App\Charts\HighCharts;

class ChartController extends Controller
{
    public function showCharts() {
        $geo = new ECharts();
        $geo->labels(['America', 'Africa', 'Europe', 'Asia', 'Oceania']);
        $geo->dataset('', 'bar', [200, 25, 150, 275, 80])->color('#58c4ef');
        $geo->width(500);
        $geo->height(400);

        $age = new HighCharts();
        $age->labels(['<22', '22-30', '30-40', '40-50', '>50']);
        $age->dataset('Phân bố độ tuổi người dùng', 'line', [155, 365, 105, 65, 50]);
        $age->width(500);
        $age->height(400);

        $edu = new HighCharts();
        $edu->labels(['không học vấn', 'Tiếu học', 'Trung học',
            'bỏ học Đại học', 'Cử nhân', 'Kỹ sư', 'Bác sĩ', 'Tiến sĩ', 'Giáo sư']);
        $edu->dataset('Trình độ học vấn', 'bar', [13, 7, 25, 15, 320, 285, 20, 25, 20]);
        $edu->width(500);
        $edu->height(400);

        $gender = new ECharts();
        $gender->labels(['nam', 'nữ', 'khác']);
        $gender->dataset('', 'pie', [386, 320,24]);
        $gender->width(500);
        $gender->height(400);
        $gender->displayAxes(false);

        $other1 = new HighCharts();
        $other1->labels(['thể thao', 'nấu ăn', 'xem phim', 'nghe nhạc', 'lướt web', 'từ thiện', 'du lịch', 'sống ảo', 'chạy Grab']);
        $other1->dataset('sở thích người dùng', 'line', [246, 170, 237, 152, 129, 101, 31, 89, 57]);
        $other1->width(500);
        $other1->height(400);

        $other2 = new ECharts();
        $other2->labels(['facebook', 'instagram', 'twitter', 'youtube', 'tumblr', 'wechat', 'whatsapp', 'zalo', 'snapchat']);
        $other2->dataset('mạng xã hội yêu thích', 'pie', [429, 407, 322, 552, 149, 220, 133, 68, 112]);
        $other2->width(500);
        $other2->height(400);
        $other2->displayAxes(false);
        $other2->displayLegend(false);

        $other3 = new HighCharts();
        $other3->labels(['<30m', '30m - 1h', '1h-2h', '2-4h', '4h-8h', '>8h']);
        $other3->dataset('thời gian online 1 ngày', 'bar', [36, 180, 337, 252, 109, 21]);
        $other3->width(500);
        $other3->height(400);

        $work1 = new ECharts();
        $work1->labels(['thất nghiệp', 'freelance', 'part-time', 'full-time']);
        $work1->dataset('tỷ lệ việc làm', 'pie', [102, 148, 260, 220]);
        $work1->width(500);
        $work1->height(400);
        $work1->displayAxes(false);

        $work2 = new HighCharts();
        $work2->labels(['khi chưa ra trường', 'ngay sau khi ra trường', 'từ 1 - 3 tháng sau khi ra trường', '>3 tháng']);
        $work2->dataset('thời gian tìm được việc sau khi ra trường', 'bar', [188, 202, 210, 120]);
        $work2->width(500);
        $work2->height(400);

        $work3 = new ECharts();
        $work3->labels(['đúng ngành', 'trái ngành']);
        $work3->dataset('tỷ lệ làm đúng ngành', 'pie', [420, 300]);
        $work3->width(500);
        $work3->height(400);
        $work3->displayAxes(false);

        $work4 = new ECharts();
        $work4->labels(['<500$', '500 - 1000$', '1000 - 3000$', '>3000$']);
        $work4->dataset('mới ra trường', 'bar', [310, 250, 120, 40]);
        $work4->dataset('sau 1 năm', 'bar', [120, 270, 150, 180]);
        $work4->dataset('sau 3 năm', 'bar', [60, 160, 290, 210]);
        $work4->dataset('sau 5 năm', 'bar', [20, 130, 270, 300]);
        $work4->width(500);
        $work4->height(400);

        $time1 = new HighCharts();
        $time1->labels(['<40h', '40-50h', '50-60h', '>60h']);
        $time1->dataset('số giờ làm việc 1 tuần', 'line', [290, 310, 150, 70]);
        $time1->width(500);
        $time1->height(400);
        $time1->label('người');

        $time2 = new HighCharts();
        $time2->labels(['<5d', '5-10d', '10-15d', '>15d']);
        $time2->dataset('số ngày nghỉ có lương 1 năm', 'line', [20, 160, 390, 150]);
        $time2->width(500);
        $time2->height(400);
        $time2->label('người');

        $env1 = new ECharts();
        $env1->labels(['rất không hài lòng', 'không hài lòng', 'hài lòng', 'rất hài lòng']);
        $env1->dataset('độ hài lòng với môi trường làm việc', 'pie', [60, 90, 320, 250]);
        $env1->width(500);
        $env1->height(400);
        $env1->displayAxes(false);

        $env2 = new ECharts();
        $env2->labels(['kinh tế', 'kỹ thuật', 'xây dựng', 'giáo dục']);
        $env2->dataset('lĩnh vực', 'bar', [220, 270, 110, 120])->color('#58c4ef');
        $env2->width(500);
        $env2->height(400);

        $var_set = ['geo' => $geo, 'age' => $age, 'edu' => $edu, 'gender' => $gender,
            'other1' => $other1, 'other2' => $other2, 'other3' => $other3,
            'work1'=>$work1, 'work2' => $work2, 'work3' => $work3, 'work4' => $work4,
            'time1' => $time1, 'time2' => $time2, 'env1' =>$env1, 'env2'=>$env2,];

        return view('charts.chartlist', $var_set);
    }
}
