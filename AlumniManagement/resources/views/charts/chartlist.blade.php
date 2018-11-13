@extends('charts.charts')
@section('chart-content')

    <section id="geography" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Phân bố địa lý người dùng</span></h4>
        </div>
        <div class="d-flex justify-content-left">
            {!! $geo->container() !!}
        </div>
    </section>

    <section id="age" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Độ tuổi</span></h4>
        </div>
        <div class="d-flex justify-content-left">
            {!! $age->container() !!}
        </div>
    </section>

    <section id="edu" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Trình độ học vấn</span></h4>
        </div>
        <div class="d-flex justify-content-left">
            {!! $edu->container() !!}
        </div>
    </section>

    <section id="gender" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Giới tính</span></h4>
        </div>
        <div class="d-flex justify-content-left">
            {!! $gender->container() !!}
        </div>
    </section>

    <section id="others" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Khác</span></h4>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab">Sở thích</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab">Mạng xã hội</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab">Thời gian online</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                {!! $other1->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                {!! $other2->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                {!! $other3->container() !!}
            </div>
        </div>
    </section>

    <section id="work" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Công việc</span></h4>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-employment" role="tab">Tỷ lệ thất nghiệp</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-time" role="tab">Thời gian tìm việc làm</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-right" role="tab">Tỷ lệ làm đúng ngành</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-salary" role="tab">Lương</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-employment" role="tabpanel" aria-labelledby="nav-home-tab">
                {!! $work1->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-time" role="tabpanel" aria-labelledby="nav-profile-tab">
                {!! $work2->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-right" role="tabpanel" aria-labelledby="nav-contact-tab">
                {!! $work3->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-salary" role="tabpanel" aria-labelledby="nav-contact-tab">
                {!! $work4->container() !!}
            </div>
        </div>
    </section>

    <section id="time" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Thời gian</span></h4>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-hour" role="tab">Số giờ làm 1 tuần</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-day" role="tab">Số ngày nghỉ phép</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-hour" role="tabpanel" aria-labelledby="nav-home-tab">
                {!! $time1->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-day" role="tabpanel" aria-labelledby="nav-profile-tab">
                {!! $time2->container() !!}
            </div>
        </div>
    </section>

    <section id="environment" class="mt-3 mb-5">
        <div class="text-left text-primary">
            <h4><span class="border-bottom border-primary">Môi trường làm việc</span></h4>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-env2" role="tab">ngành nghề</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-env1" role="tab">Độ hài lòng với môi trường</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-env2" role="tabpanel" aria-labelledby="nav-home-tab">
                {!! $env2->container() !!}
            </div>
            <div class="tab-pane fade" id="nav-env1" role="tabpanel" aria-labelledby="nav-profile-tab">
                {!! $env1->container() !!}
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.1.0/dist/frappe-charts.min.iife.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
    {!! $geo->script() !!}
    {!! $age->script() !!}
    {!! $edu->script() !!}
    {!! $gender->script() !!}
    {!! $other1->script() !!}
    {!! $other2->script() !!}
    {!! $other3->script() !!}
    {!! $work1->script() !!}
    {!! $work2->script() !!}
    {!! $work3->script() !!}
    {!! $work4->script() !!}
    {!! $time1->script() !!}
    {!! $time2->script() !!}
    {!! $env1->script() !!}
    {!! $env2->script() !!}
@endsection