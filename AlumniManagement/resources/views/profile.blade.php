@extends('index')
@section('content')
    <div class="container" style="margin-top: 64px">
        <div class="row">
            <div class="col-12">
                <div class="avatar bg-primary" style="padding-top: 15px">
                    {{--@if(!is_null($alumni->avatar))--}}
                        {{--<img src="{{asset('storage/upload/'.$alumni->avatar)}}" class="rounded-circle mx-auto d-block" alt="" width="300px" height="300px">--}}
                    {{--@else--}}
                        {{--<img id="blah" src="{{asset('storage/upload/avt.jpg')}}" class="rounded-circle mx-auto d-block" alt="" width="300px" height="300px">--}}
                    {{--@endif--}}
                    <div style="text-align: center">
                        <label id="labe" class="newbtn item" onclick="openPopAva()">
                            @if(!is_null($alumni->avatar))
                            <img src="{{asset('storage/upload/'.$alumni->avatar)}}" class="rounded-circle mx-auto d-block" alt="" width="300px" height="300px">
                            @else
                            <img id="blah" src="{{asset('storage/upload/avt.jpg')}}" class="rounded-circle mx-auto d-block" alt="" width="300px" height="300px">
                            @endif
                            {{--<input id="pic" class='pis' onchange="readURL(this);" name="file" type="file" >--}}
                        </label>
                    </div>
                    <div class="text-center">-----------<i class="material-icons">verified_user</i>-----------</div>
                </div>
                <hr>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="card col-lg-4 ">
                    <div class=" Left_Info" >
                        <h3 class="title " style="color: #227dc7">Background</h3>
                        {{--name--}}
                        <div class="popup">
                            <span class="inf"><i class="material-icons md-36">person</i>Name: {{$alumni->name}}
                            </span>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.editor', ['id' => 'name'])
                            @endif
                            <br>
                        </div>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.editform', ['placeholder' => 'name', 'id' => 'name'])
                            @endif

                        {{--date of birth--}}
                        <div class="popup">
                            <span class="inf"><i class="material-icons md-36" >cake</i>Date of Birth: {{$alumni->birthday}}
                            </span>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.popup', ['id' => 'dob', 'del' => 'delbirthday'])
                            @endif
                            <br>
                        </div>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.dateform', ['placeholder' => 'birthday', 'id' => 'dob'])
                            @endif

                        {{--address--}}
                        @if(!is_null($alumni->district) && !is_null($alumni->province))
                            <div class="popup">
                                <span class="inf"><i class="material-icons">home</i>Address:{{$alumni->district->name}} - {{$alumni->province->name}}
                                </span>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.popup', ['id' => 'address', 'del' => 'deladdress'])
                                @endif
                                <br>
                            </div>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.addressform', ['placeholder1' => 'district', 'placeholder2' => 'province', 'id' => 'address'])
                                @endif
                        @else
                            <div class="popup">
                                <span class="inf"><i class="material-icons">home</i>Address:<i>please update your info</i>
                                </span>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.popup', ['id' => 'address', 'del' => 'deladdress'])
                                @endif
                                <br>
                            </div>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.addressform', ['placeholder1' => 'district', 'placeholder2' => 'province', 'id' => 'address'])
                                @endif
                        @endif
                        {{--course--}}
                        @if(!is_null($alumni->course))
                            {{--school--}}
                            <div class="popup">
                                <span class="inf"><i class="material-icons">school</i>Alma mater: {{$alumni->course->school}}
                                </span>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.popup', ['id' => 'school', 'del' => 'delschool'])
                                @endif
                                <br>
                            </div>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.editform', ['placeholder' => 'school', 'id' => 'school'])
                                @endif
                            {{--course--}}
                            {{--<div class="popup">--}}
                                {{--<span class="inf"><i class="material-icons">date_range</i>Course:{{$alumni->course->name}}--}}
                                {{--</span>--}}
                                {{--@if(Gate::allows('update-info', $alumni))--}}
                                    {{--@include('edit.popup', ['id' => 'course', 'del' => 'delcourse'])--}}
                                {{--@endif--}}
                                {{--<br>--}}
                            {{--</div>--}}
                                {{--@if(Gate::allows('update-info', $alumni))--}}
                                    {{--@include('edit.editform', ['placeholder' => 'course', 'id' => 'course'])--}}
                                {{--@endif--}}
                        @else
                            <div class="popup">
                                <span class="inf"><i class="material-icons">school</i>Alma mater:<i>please update your info</i>
                                </span>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.popup', ['id' => 'school', 'del' => 'delschool'])
                                @endif
                                <br>
                            </div>
                                @if(Gate::allows('update-info', $alumni))
                                    @include('edit.editform', ['placeholder' => 'school', 'id' => 'school'])
                                @endif
                            {{--<div class="popup">--}}
                                {{--<span class="inf"><i class="material-icons">date_range</i>Course:<i>please update your info</i>--}}
                                {{--</span>--}}
                                {{--@if(Gate::allows('update-info', $alumni))--}}
                                    {{--@include('edit.popup', ['id' => 'course', 'del' => 'delcourse'])--}}
                                {{--@endif--}}
                                {{--<br>--}}
                            {{--</div>--}}
                                {{--@if(Gate::allows('update-info', $alumni))--}}
                                    {{--@include('edit.editform', ['placeholder' => 'course', 'id' => 'course'])--}}
                                {{--@endif--}}
                        @endif
                        {{--phone--}}
                        <div class="popup">
                            <span class="inf"><i class="material-icons">phone</i>Phone: {{$alumni->phone}}
                            </span>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.popup', ['id' => 'phone', 'del' => 'delphone'])
                            @endif
                            <br>
                        </div>
                        @if(Gate::allows('update-info', $alumni))
                            @include('edit.editform', ['placeholder' => 'phone', 'id' => 'phone'])
                        @endif
                        {{--email--}}
                        <div class="popup">
                            <span class="inf"><i class="material-icons">email</i>Email:{{$alumni->mail}}
                            </span>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.editor', ['id' => 'email'])
                            @endif
                            <br>
                        </div>
                            @if(Gate::allows('update-info', $alumni))
                                @include('edit.editform', ['placeholder' => 'email', 'id' => 'email'])
                            @endif
                        {{--@if(Gate::allows('update-info', $alumni))--}}
                            {{--<span><a href="{{route('update')}}" class="btn btn-sm btn-primary">update</a></span>--}}
                        {{--@endif--}}
                    </div>
                </div>
                <div class="card col-lg-8">
                    <div class="Right_Info">
                        <h3 class="title" style="color: #227dc7">Jobs</h3>
                        @if(Gate::allows('update-info', $alumni))
                            {{--<div style="text-align: -webkit-center"><button id="myBtn" onclick="openModal()" class="btn btn-sm btn-primary">Add job</button></div>--}}
                            <div class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button id="myBtn1" onclick="openModal()" class="btn btn-primary">Add job</button>
                                    <button id="myBtn2" onclick="openPopup()" class="btn btn-success">Update job</button>
                                </div>
                            </div>
                            @include('edit.addcompany')
                        @endif
                        @each('career', $alumni->company()->orderBy('start_time', 'desc')->get(), 'com')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection