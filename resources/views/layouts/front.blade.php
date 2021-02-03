<!doctype html>
<html id="home" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="{{secure_asset('/front/assets/icon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{secure_asset('/front/assets/icon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{secure_asset('/front/assets/icon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{secure_asset('/front/assets/icon/site.webmanifest')}}">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="{{secure_asset('/front/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/dist/css/style.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/responsive/home/phone-responsive.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/responsive/home/tablet-responsive.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/responsive/home/desktop-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/font-awesome.min.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="{{secure_asset('/assets/vendors/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet">
    @yield('css')

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white">
        <a style="color:#0ACC94;font-weight: bold;" class="navbar-brand ml-3" href="/"><img src="{{secure_asset('/front/assets/image/logo.png')}}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-url active">
                    <a class="nav-link" id="nav-home" href="#home">Home</a>
                </li>
                <li class="nav-item nav-url">
                    <a class="nav-link" id="nav-service" href="#service">Service</a>
                </li>
                <li class="nav-item nav-url">
                    <a class="nav-link" id="nav-catalog" href="#catalog">Catalog</a>
                </li>
                <li class="nav-item nav-url">
                    <a class="nav-link" id="nav-contact" href="#contact">Contact Us</a>
                </li>
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link btn btn-green" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @if (Auth::user()->level == 'admin')
                            <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                        @else
                            <a class="dropdown-item" href="{{route('home')}}">Profile</a>
                        @endif
                    </div>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" id="nav-contact" href="{{route('front.list_cart')}}" style="color: #83D987;font-size:25px;margin-top: -5px">
                        <img src="{{asset('/image/shopping-cart.png')}}" style="width: 20; height: 30px" alt="">
                        <span class="basket-item-count">
                            <sup><span class="badge badge-pill red"></span></sup>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Banner -->
    <div class="jumbotron"
        style="margin-top: 65px;background: url({{secure_asset('/front/assets/image/cactus-bg.png')}});background-size: cover;background-repeat: no-repeat;background-position: left;">
        <div class="container">
            <b> Welcome to </b>
            <h1 class="display-4">Decorative Plant</h1>
            <p> Your destination to exotic cacti and <br> succelent from all of the world</p>
            <a id="button-service" href="#service"><button class="btn mt-5" type="button">Explore Now</button></a>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Service -->
    <!-- Service -->
    <div class="service" id="service">
        <div class="d-sm-flex">
            <div class="col-sm-7">
                <div id="picture-square">
                    <div id="pict-cover">
                        <div id="pict-border">
                            <img src="{{secure_asset('front/assets/image/daun.png')}}" alt="">
                        </div>
                    </div>
                    <div id="text-1">
                        <div id="text-1-cube">
                            <p id="montera">Montera leaf</p>
                            <p id="price">$250,509</p>
                            <p id="location">Jakarta, indonesia</p>
                        </div>
                    </div>
                    <div id="text-2">
                        <div id="text-2-cube"></div>
                        <p id="healthy">100% Healthy </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div id="service-tittle">Services We Provide</div>
                <div class="service-text">
                    <div id="number-cube"><span id="number">1</span></div>
                    <div id="text-cube">
                        <p id="text">We are not asking for any fee from
                            both party (landlord or even buyer)</p>
                    </div>
                </div>
                <div class="service-text">
                    <div id="number-cube"><span id="number">2</span></div>
                    <div id="text-cube">
                        <p id="text">We take care every single thing that
                            buyer need to complete beforehand</p>
                    </div>
                </div>
                <div class="service-text">
                    <div id="number-cube"><span id="number">3</span></div>
                    <div id="text-cube">
                        <p id="text">We help buyer to find the place without
                            hassle and helping them with paperwork</p>
                    </div>
                </div>
                <div class="service-text">
                    <div id="number-cube"><span id="number">4</span></div>
                    <div id="text-cube">
                        <p id="text">We help landlord to register their license
                            to goverment in order want to sell</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service -->

    <!-- Catalog -->
    <section id="catalog">
        <h2 id="catalog-tittle" style="margin-bottom: 30px">The Catalog<br>This Tropical For You</h2>
        @yield('content')
    </section>
    <!-- End Catalog -->

    <!-- footer -->
    <div id="footer">
        <span id="text">Copyright 2021. All Rights Reserved Design by Muhammad Rizky</span>
    </div>
    <!-- End Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="{{asset('
            front / assets / js / vendor / jquery.slim.min.js ')}}"><\/script>')
    </script>
    <script src="{{secure_asset('/front/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    @yield('js')
    <script type="text/javascript">
        $("#button-service").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#service").offset().top
            }, 1000);
        });
    </script>
    <script type="text/javascript">
        $("#nav-home").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#home").offset().top
            }, 1000);
        });
    </script>
    <script type="text/javascript">
        $("#nav-service").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#service").offset().top
            }, 1000);
        });
    </script>
    <script type="text/javascript">
        $("#nav-catalog").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#catalog").offset().top -80
            }, 1000);
        });
    </script>
    <script type="text/javascript">
        $("#nav-contact").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#contact").offset().top
            }, 1000);
        });
    </script>
    <script>
$(".nav-url").on("click", function(e) {
  $(".nav-url").removeClass("active");
  $(this).addClass("active");
  e.preventDefault();
});

        $(document).ready(function () {
        cartload();
    });

    function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<sup>'+'<span class="badge badge-pill red">'+ value['totalcart']+'</span>'+'</sup>'));
            }
        });
    }
    </script>
    <script src="{{secure_asset('js/jquery.js')}}"></script>
    <script src="https://kit.fontawesome.com/715497a4a3.js" crossorigin="anonymous"></script>
</html>
