<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/addjob.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/myjs.js') }}" defer></script>
    <script src="{{ asset('js/addjob.js') }}" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div id="app">
    @auth
        <div id="sideMenu" class="sidenav bg-primary">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            @if(!is_null(Auth::user()->alumni->avatar))
                <a href="{{route('profile',Auth::user()->alumni_id)}}" class="sideavt">
                    <img id="avatar" src="{{asset('storage/upload/'.Auth::user()->alumni->avatar)}}" style="" alt="avatar" class="img-thumbnail rounded img-fluid">
                </a>
            @else
                <img id="avatar" src="{{asset('storage/upload/avt.jpg')}}" style="height: 180px; width: 180px" alt="avatar" class="img-thumbnail rounded img-fluid">
            @endif
            <a href="{{route('home')}}" class="underline"><i class="material-icons">home</i> Home</a>
            <a href="{{route('update', Auth::user()->alumni_id)}}" class="underline"><i class="material-icons">edit</i> Edit</a>
            <a href="{{route('showchart')}}" class="underline"><i class="material-icons">assessment</i> Statistic</a>
            <div>
                <a href="{{ route('logout') }}" class="underline" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    <i class="material-icons">person_outline</i>{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    @endauth

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-primary fixed-top">
        <div class="container-fluid">
        @auth
            <span style="font-size:30px;cursor:pointer;color: white" onclick="openNav()">&#9776;</span>
        @endauth

            <a class="navbar-brand" href="{{ url('/') }}" style="color: white">
                {{--{{ config('app.name', 'Alumni.org') }}--}}
                Alumni.org
            </a>
            @auth
                <a href="{{route('profile',Auth::user()->alumni_id)}}" class="text-white">
                    <div style="display: flex"><i class="material-icons">account_circle</i>{{Auth::user()->alumni->name}}</div>
                </a>
            @endauth

            @guest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: white">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}" style="color: white">{{ __('Register') }}</a>
                                @endif
                            </li>
                    </ul>
                </div>
            @endguest
        </div>
    </nav>
</div>

    <main class="">
        @yield('content')
    </main>
</body>