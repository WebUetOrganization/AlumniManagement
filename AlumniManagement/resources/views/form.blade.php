@extends('index')
@section('content')
    <div class="row body" style="margin-top: 61px">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

            <form class="form-group" action="{{route('update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="text-align: center"><h2 class="text-primary"><b>Update profile</b></h2>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin-bottom: 30px">
                        <div style="text-align: center">
                            <label class="newbtn item">
                                @if(!is_null(Auth::user()->alumni->avatar))
                                    <img id="blah" class="img-thumbnail" src="{{asset('storage/upload/'.Auth::user()->alumni->avatar)}}">
                                @else
                                    <img id="blah" class="img-thumbnail" src="{{asset('storage/upload/avt.jpg')}}">
                                @endif
                                <span class="notify-badge">Select your avatar</span>
                                <input id="pic" class='pis' onchange="readURL(this);" name="file" type="file" >
                            </label>
                            <p style="color: grey">Your avatar size should be 200px*200px</p>
                        </div>
                    </div>
                    <div class="col-lg-7" style="padding-right: 50px;padding-left: 50px">
                        <h4 class="text text-primary">Background</h4>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name..." required>
                        date of birth
                        <input type="date" id="birth" name="birth" class="form-control" placeholder="DOB..." required>
                        <input type="text" id="district" name="district" class="form-control" placeholder="District...">
                        <input type="text" id="province" name="province" class="form-control" placeholder="Province...">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone...">
                        <h4 class="text text-primary">Education</h4>
                        <input type="text" id="alma-meter" name="school" class="form-control" placeholder="Alma meter...">
                        <h4 class="text text-primary">Job</h4>
                        <input type="text" id="company" name="company" class="form-control" placeholder="Company...">
                        <p><select class="custom-select custom-select-sm" id="company" name="choice">
                                <option disabled selected>company type</option>
                                <option value="public">public</option>
                                <option value="private">private</option>
                                <option value="non-government organization">non-government organization</option>
                                <option value="state">state-owned enterpise</option>
                                <option value="education">education</option>
                                <option value="government">government</option>
                            </select>
                        </p>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Company address...">
                        start time
                        <input type="date" id="start" name="start" class="form-control" placeholder="Start time...">
                        quit time
                        <input type="date" id="quit" name="quit" class="form-control" placeholder="Quit time...">
                        <input type="text" id="job" name="job" class="form-control" placeholder="Job...">
                        <input type="text" id="salary" name="salary" class="form-control" placeholder="Salary...">
                        <div ><button class="btn btn-primary" type="submit" value="Update">update</button>
                            <div style="float: right"><button class="btn btn-success" href="{{route('profile', Auth::user()->alumni_id)}}" value="Update">
                                    skip<i class="inf material-icons">navigate_next</i></button></div></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection