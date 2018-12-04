@extends('index')
@php
    use App\Charts\HighCharts;
@endphp
@section('content')
    <div class="container" style="margin-top: 100px">
        <h3 class="text-primary text-center">{{$survey->name}} </h3>
        <form method="post" action="{{route('survey.submit', $survey)}}">
            @csrf
        @foreach($survey->question as $question)
            <div class="card mb-3 mx-auto" style="width: 40rem;">
                <div class="card-header bg-primary text-white">
                    {{$question->content}}
                </div>
                <ul class="list-group list-group-flush">
                @foreach($question->answer as $answer)
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label for="{{$answer->id}}" class="col-sm-2 col-form-label">{{$answer->answer}}</label>
                            <div class="col-sm-10">
                                <input type="{{$question->type}}" name="{{$question->id}}" value="{{$answer->id}}" id="{{$answer->id}}">
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
                <div class="card-footer bg-info">
                    <a href="{{route('showchart', [$survey, $question])}}" class="btn btn-outline-light" id="{{$question->id}}" >
                        thống kê
                    </a>
                </div>
            </div>
        @endforeach
            <div style="text-align: center"><input type="submit" class="btn btn-primary" value="Submit"></div>
        </form>
    </div>

@endsection