<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="sideMenu" class="sidenav bg-primary" style="margin-top: 40px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <img id="avatar" src="" alt="avatar" class="img-thumbnail rounded img-fluid">
        <a href="{{route('home')}}" class="underline"><i class="material-icons">home</i> Home</a>
        <a href="#" class="underline"><i class="material-icons">edit</i> Edit</a>
        <a href="#" class="underline"><i class="material-icons">assessment</i> Thống kê</a>
        <a href="#" class="underline"><i class="material-icons">person_outline</i> Đăng xuất</a>
    </div>
    <nav id="nav" class="navbar bg-primary justify-content-between fixed-top">
        <span style="font-size:30px;cursor:pointer;color: white" onclick="openNav()">&#9776;</span>
        <form class="form-inline">
            <span><input class="form-control" type="search" placeholder="Search" aria-label="Search"></span>
            <span><button class="btn btn-outline-light" type="submit">
                    Search
                </button></span>
        </form>
    </nav>
    @yield('content')
    <script>
        $('.newbtn').bind("click" , function () {
            $('#pic').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function openNav() {
            document.getElementById("sideMenu").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("sideMenu").style.width = "0";
        }
    </script>
</body>