@extends('index')
@section('title', 'Alumnus.vn')
@section('content')
    @each('card', $alumni, 'al')
@endsection

