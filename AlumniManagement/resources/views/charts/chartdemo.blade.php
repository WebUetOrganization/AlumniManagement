
@extends('index')
<div class="container" style="margin-top: 100px">
    <div class="row mx-auto">
        <section id="age">
            <div class="text-left text-primary">
                <h4><span class="border-bottom border-primary">thống kê người dùng</span></h4>
            </div>
            <div class="d-flex justify-content-left">
                {!! $chart->container() !!}
            </div>
        </section>
    </div>

</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
