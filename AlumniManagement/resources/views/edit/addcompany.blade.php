<div class="container-fluid">
    {{--add new job modal--}}
    <div id="myPopup" class="pop row">
        <div class="popup-content">
            <div class="popup-header">
                <span class="close1" onclick="closeModal()">&times;</span>
                <h2>New Job</h2>
            </div>
            <div class="popup-body">
                <form class="form-group" method="post" action="{{route('savejob')}}">
                    @csrf
                    <label for="start">start time:</label>
                    <input type="date" id="start" name="start" class="form-control" placeholder="Start time..." required>
                    <label for="quit">quit time:</label>
                    <input type="date" id="quit" name="quit" class="form-control" placeholder="Quit time...">
                    <label for="job">position in the organization:</label>
                    <input type="text" id="job" name="job" class="form-control" placeholder="Job..." required>
                    <label for="salary">salary:</label>
                    <input type="number" id="salary" name="salary" class="form-control" placeholder="Salary..." min="0" required>
                    <label for="company">organization:</label>
                    <input type="text" id="company" name="company" class="form-control" placeholder="Company..." required>
                    <label for="choice">type of the organization (optional):</label>
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
                    <label for="address">organization address (optional):</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Company address...">
                    <div style="text-align: center"><button class="btn btn-primary" type="submit" value="Update">Add</button></div>
                </form>
            </div>
        </div>
    </div>
    {{--update a job modal--}}
    <div id="myPopup1" class="pop row">
        <div class="popup-content">
            <div class="popup-header">
                <span class="close1" onclick="closePopup()">&times;</span>
                <h2>Update Job</h2>
            </div>
            <div class="popup-body">
                <form class="form-group" method="post" action="{{route('updatejob')}}">
                    @csrf
                    <p><select class="custom-select custom-select-sm" id="company" name="choice1" required>
                            <option disabled selected value="">choose the organization you want to update</option>
                            @foreach(Auth::user()->alumni->company as $com)
                                <option value="{{$com->id}}">{{$com->name}}</option>
                            @endforeach
                        </select></p>
                    <label for="start">new organization:</label>
                    <input type="text" id="company1" name="company" class="form-control" placeholder="Organizaiton...">
                    <label for="start">start time:</label>
                    <input type="date" id="start" name="start" class="form-control">
                    <label for="quit">quit time:</label>
                    <input type="date" id="quit" name="quit" class="form-control" placeholder="Quit time..." >
                    <label for="job">position in the organization:</label>
                    <input type="text" id="job" name="job" class="form-control" placeholder="Job..." >
                    <label for="salary">salary:</label>
                    <input type="number" id="salary" name="salary" class="form-control" placeholder="Salary..." min="0" >
                    <label for="choice">type of the organization (optional):</label>
                    <p><select class="custom-select custom-select-sm" id="company" name="choice2">
                            <option disabled selected>company type</option>
                            <option value="public">public</option>
                            <option value="private">private</option>
                            <option value="non-government organization">non-government organization</option>
                            <option value="state">state-owned enterpise</option>
                            <option value="education">education</option>
                            <option value="government">government</option>
                        </select>
                    </p>
                    <label for="address">organization address (optional):</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Address...">
                    <div style="text-align: center"><button class="btn btn-primary" type="submit" value="Update">Update</button></div>
                </form>
            </div>
        </div>
    </div>
    {{--upload avatar modal--}}
    <div id="myPopup2" class="pop row">
        <div class="popup-content">
            <div class="popup-header">
                <span class="close1" onclick="closePopAva()">&times;</span>
                <h2>Change Avatar</h2>
            </div>
            <div class="popup-body">
                <form class="form-group" method="post" action="{{route('avatar')}}" enctype="multipart/form-data">
                    @csrf
                    <div style="text-align: center">
                        <label class="newbtn item">
                            @if(!is_null(Auth::user()->alumni->avatar))
                                <img id="blah" class="img-thumbnail" src="{{asset('storage/upload/'.Auth::user()->alumni->avatar)}}">
                            @else
                                <img id="blah" class="img-thumbnail" src="{{asset('storage/upload/avt.jpg')}}">
                            @endif
                            <input id="pic" class='pis' onchange="readURL(this);" name="file" type="file" >
                        </label>
                        <p style="color: grey">Please upload your avatar</p>
                    </div>
                    <div style="text-align: center"><button class="btn btn-primary" type="submit" value="Update">Save</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
