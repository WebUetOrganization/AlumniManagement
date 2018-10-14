<div class="row body" style="margin-top: 70px;">
    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2">

    </div>
    <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
        <a href="{{route('profile', $al->id)}}">
            <div class="wrapper bordered">
                <div class="avt">
                    <img id="avatar" src="{{asset('storage/upload/'.$al->avatar)}}" style="height: 180px; width: 200px" alt="avatar" class="img-thumbnail">
                </div>
                <div class="content-card">
					<span style="display: flex;">
						<p>Name:</p>
						<p>{{$al->name}}</p>
					</span>
                    <span style="display: flex;">
						Date of birth:
						<p>{{$al->birthday}}</p>
					</span>
                    <span style="display: flex;">
						course:
						<p>{{$al->course->name}}</p>
					</span>
                    <span style="display: flex;">
						Address:
						<p>{{$al->district->name}} - {{$al->province->name}}</p>
					</span>
                </div>
            </div>
        </a>
    </div>
</div>
