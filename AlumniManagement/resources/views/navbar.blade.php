@extends('index')
@section('title', 'Alumni.org')
@section('content')
    @each('card', $alumni, 'al')
@endsection

