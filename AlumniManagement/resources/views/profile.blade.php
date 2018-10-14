@extends('index')
@section('content')
    <div class="container" style="margin-top: 61px;">
        <div class="row">
            <div class="col-md-12">
                <div class="avatar bg-primary">
                    <img src="{{asset('storage/upload/'.$alumni->avatar)}}" class="rounded-circle mx-auto d-block" alt="" width="300px" height="300px">
                    <div class="text-center">-----------<i class="material-icons">verified_user</i>-----------</div>
                </div>
                <hr>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="card col-md-4 ">
                    <div class=" Left_Info" >
                        <h3 class="title " style="color: #227dc7">Background</h3>
                        <span style="display: flex;"><i class="material-icons">person</i>Name: {{$alumni->name}}</span><br>
                        <span style="display: flex;"><i class="material-icons">cake</i>Date of Birth: {{$alumni->birthday}} </span> <br>
                        <span style="display: flex;"><i class="material-icons">home</i>Address:{{$alumni->district->name}} - {{$alumni->province->name}}</span><br>
                        <span style="display: flex;"><i class="material-icons">school</i>Alma mater: {{$alumni->course->school}}</span><br>
                        <span style="display: flex;"><i class="material-icons">date_range</i>Course:{{$alumni->course->name}}</span><br>
                        <span style="display: flex;"><i class="material-icons">phone</i>Phone: {{$alumni->phone}}</span><br>
                        <span style="display: flex;"><i class="material-icons">email</i>Email:{{$alumni->mail}}</span><br>
                        <a href="{{route('update', $alumni->id)}}">update</a>
                    </div>
                </div>
                <div class="card col-md-8">
                    <div class="Right_Info">
                        <h3 class="title" style="color: #227dc7">Jobs</h3>
                        @each('career', $alumni->company()->orderBy('start_time', 'desc')->get(), 'com')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection