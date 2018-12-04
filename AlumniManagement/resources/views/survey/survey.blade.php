@extends('index')
@section('content')
    <div class="container" style="margin-top: 100px">
        <h3 class="text-primary text-center">Khảo sát sinh viên</h3>
        @foreach($surveys as $survey)
            <a href="{{route('survey.do', $survey)}}">
                <div class="card">
                    <div class="card-body">
                        {{$survey->name}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection