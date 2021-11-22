<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Fontawesome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .sidenav{
            width: 200px;
            height:100%;
            position: fixed;
            background-color:black;
            padding:60px 10px;
        }
        .sidenav a{
            text-decoration:none;
            color:#fff;
            font-size:20px;
            display:block;
            padding:6px;
        }
        .main{
            margin-left:200px;
            font-size: 18px;
            padding:70px 20px;

        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="{{ url('admin/dashboard') }}">Personal Blog</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto ">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <form action="{{ url('/logout') }}" method='POST'>
                                        @csrf
                                        <button type="submit" class='dropdown-item' onclick='return confirm(" Are you sure you want to logout")'>Logout</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                 </nav>

                 <!-- Sidenav` -->
                 <div class="sidenav">
                    <a href="{{ url('admin/users') }}">User</a>
                    <a href="{{ url('admin/skills') }}">Skill</a>
                    <a href="{{ url('admin/projects') }}">Project</a>
                    <a href="{{ url('admin/categories') }}">Category</a>
                    <a href="{{ url('admin/posts') }}">Post</a>
                </div>

                <div class="main">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
