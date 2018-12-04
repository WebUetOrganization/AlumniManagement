<div class="row body" style="margin-top: 70px;">
    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2">

    </div>
    <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
        <a href="{{route('profile', $al)}}">
            <div class="wrapper bordered">
                <div class="avt">
                    @if(!is_null($al->avatar))
                        <img id="avatar" src="{{asset('storage/upload/'.$al->avatar)}}" style="height: 180px; width: 250px" alt="avatar" class="img-thumbnail">
                    @else
                        <img id="avatar" src="{{asset('storage/upload/avt.jpg')}}" style="height: 180px; width: 250px" alt="avatar" class="img-thumbnail">
                    @endif
                </div>
                <div class="content-card">
					<span style="display: flex;">
						<p>Name:</p>
						<p>{{$al->name}}</p>
					</span>
                    <span style="display: flex;">
						Date of birth:
                        @if(!is_null($al->birthday))
                            <p>{{$al->birthday}}</p>
                        @else
                            <p><i>please update your info</i></p>
                        @endif
					</span>
                    <span style="display: flex;">
						Address:
                        @if(!is_null($al->district) || !is_null($al->province))
                            <p>{{$al->district->name}} - {{$al->province->name}}</p>
                        @else
                            <p><i>please update your info</i></p>
                        @endif
					</span>
                    <span style="display: flex;">
						Education:
                        @if(!is_null($al->course) && !is_null($al->course->school))
                            <p>{{$al->course->school}}</p>
                        @else
                            <p><i>please update your info</i></p>
                        @endif
					</span>
                </div>
            </div>
        </a>
    </div>
</div>
