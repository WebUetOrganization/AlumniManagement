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
            <a href="{{route('profile',Auth::user()->alumni_id)}}" class="sideavt">
                <img id="avatar" src="{{asset('storage/upload/avt.jpg')}}" style="height: 180px; width: 180px" alt="avatar" class="img-thumbnail rounded img-fluid">
            </a>
        @endif
            <a href="{{route('home')}}" class="underline"><i class="material-icons">home</i> Home</a>
            <a href="{{route('survey.list')}}" class="underline"><i class="material-icons">format_list_bulleted</i> Survey</a>
            {{--<a href="{{route('showchart')}}" class="underline"><i class="material-icons">assessment</i> Statistic</a>--}}
        @if(Auth::user()->role_id == 1)
            <a href="{{route('voyager.dashboard')}}" class="underline"><i class="material-icons">event_note</i> Admin</a>
        @endif
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

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel bg-primary fixed-top">

        <div class="container">
            @auth
                <span style="font-size:26px;cursor:pointer;color: white" onclick="openNav()">&#9776;</span>
            @endauth
            <a class="navbar-brand text-white" href="{{ url('/') }}"> Alumnus.vn </a>
            @auth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="material-icons">search</i>
                </button>
                <div class="collapse navbar-collapse " id="navbarTogglerDemo02" style="width: 200px;">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="post" action="{{route('search')}}">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" required>
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
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

    <main>
        @yield('content')
    </main>
</body>