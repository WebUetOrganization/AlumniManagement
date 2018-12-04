@extends('index')
@section('title', 'Alumni.org')
@section('content')
    {{--chart menu--}}
    <div class="container">
        <div class="text-center mb-5" style="margin-top: 80px">
            <h3 class="text-primary">User Statistics</h3>
        </div>
        <div class="row">
            <div class="col-md-3 border-right border-primary">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#item-1">Thông tin cơ bản</a>
                        <div id="item-1" class="collapse">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#geography">Địa lý</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#age">tuổi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#edu">Giáo dục</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#gender">Giới tính</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#others">Khác</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#item-2">Công Việc</a>
                        <div id="item-2" class="collapse">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#work">Nghề nghiệp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#time">Thời gian làm việc</a>
                                </li>
                                <li class="nav-item" href="#">
                                    <a class="nav-link" href="http://alumnus.vn/statistics#environment">Môi trường làm việc</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                @yield('chart-content')
            </div>
        </div>

    </div>
@endsection