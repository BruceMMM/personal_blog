<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- BOOTSTRAP CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <!-- Fontawesome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- CUSTOM CSS  -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>


             <!-- NAVBAR SEXTION -->

    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">

                <a href="" class="navbar-brand">
                    Personal Blog
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link home">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('posts')}}" class="nav-link">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link ">CONTACT</a>
                        </li>
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ StrToUpper(Auth::user()->name)}}
                            </a>
                            <div class="dropdown-menu dropdown-bg" aria-labelledby="navbarDropdown">
                                <a href=""
                                onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?'))
                                {document.getElementById('logout-form').submit()}" class="nav-link ">LOGOUT</a>
                                <form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none">
                                @csrf
                                </form>
                            </div>
                        </li>

                        @else

                        <li class="nav-item">
                            <a href="{{url('login')}}" class="nav-link ">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('register')}}" class="nav-link ">REGISTER</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
                <!-- HEADER SECTION-->

    <section class="header header-bg  justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                        <div class="header-text">

                            <p class="text-white" >Hello, I'm</p>
                            <h1>Myo Maung Maung</h1>

                            <a href="{{url('posts')}}" class="custom-btn btn-bg btn mt-3" >
                            <i class="fa fa-plus-circle"> Explore My Blog!</i></a>

                        </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="header-image">

                    <img src="{{asset('images/Me_jacket6.png')}}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>




                <!-- Contnet -->
                <div class="container-fluid content">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>




            <!--   Footer  -->
   <footer class="site-footer" id="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
            <h4 class="my-4">About This Website</h4>

            <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus iste odit deserunt, excepturi autem rem vero, laudantium veniam velit blanditiis, nisi necessitatibus voluptas eum impedit. Repudiandae, omnis soluta. Nobis, porro!
            </p>
          </div>

          <div class="col-lg-3 col-md-6 col-12" >
            <h4 class="my-4">Contact Info</h4>

            <p class="mb-1">
              <i class="fa fa-phone mr-2 footer-icon"></i>
              +959 259 040 363
            </p>

            <p>
              <a href="#">
                <i class="fa fa-envelope mr-2 footer-icon"></i>
                hello@gmail.com
              </a>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 col-12" >
            <h4 class="my-4">Address</h4>

            <p class="mb-1">
              <i class="fa fa-home mr-2 footer-icon"></i>
              No(123),Insein Township,Yangon.
            </p>
          </div>

          <div class="col-md-12">
            <p class="copyright-text">Copyright &copy; 2020  Company
          </div>

        </div>
      </div>
    </footer>


    <!-- CUSTOMS JS  -->
    <script src="js/main.js"></script>
    <!-- BOOTSTRAP JS  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
