@extends('index')
@section('content')
    <div class="row body" style="margin-top: 61px">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form class="form-group" action="{{route('update', $alumni->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="text-align: center"><h2 class="text-primary"><b>Update profile</b></h2></div>
                <div class="row">
                    <div class="col-lg-5" style="margin-bottom: 30px">
                        <div style="text-align: center">
                            <label class="newbtn item">
                                <img id="blah" class="img-thumbnail" src="{{asset('storage/upload/'.$alumni->avatar)}}">
                                <span class="notify-badge">Select your avatar</span>
                                <input id="pic" class='pis' onchange="readURL(this);" name="file" type="file" >
                            </label>
                            <p style="color: grey">Your avatar size should be 200px*200px</p>
                        </div>
                    </div>
                    <div class="col-lg-7" style="padding-right: 50px;padding-left: 50px">
                        <h4 class="text text-primary">Background</h4>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name...">
                        <input type="text" id="birth" name="birth" class="form-control" placeholder="DOB...">
                        <input type="text" id="district" name="district" class="form-control" placeholder="District...">
                        <input type="text" id="province" name="province" class="form-control" placeholder="Province...">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone...">
                        <input type="text" id="email" name="mail" class="form-control" placeholder="Email...">
                        <h4 class="text text-primary">Education</h4>
                        <input type="text" id="alma-meter" name="alma-meter" class="form-control" placeholder="Alma meter...">
                        <input type="text" id="course" name="course" class="form-control" placeholder="Course....">
                        <h4 class="text text-primary">Job</h4>
                        <p><select class="custom-select custom-select-sm" id="company" name="choice">
                            <option disabled selected>choose the company you want to update</option>
                            @foreach($alumni->company as $com)
                                <option value="{{$com->id}}">{{$com->name}}</option>
                            @endforeach
                        </select></p>
                        <input type="text" id="company" name="company" class="form-control" placeholder="Company...">
                        <input type="text" id="start" name="start" class="form-control" placeholder="Start time...">
                        <input type="text" id="quit" name="quit" class="form-control" placeholder="Quit time...">
                        <input type="text" id="job" name="job" class="form-control" placeholder="Job...">
                        <input type="text" id="salary" name="salary" class="form-control" placeholder="Salary...">
                        <div style="text-align: center"><button class="btn btn-primary" type="submit" value="Update">update</button></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection