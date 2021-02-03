<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{secure_asset('/front/assets/icon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{secure_asset('/front/assets/icon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{secure_asset('/front/assets/icon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{secure_asset('/front/assets/icon/site.webmanifest')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title')</title>

    <!-- CSS -->

    <!-- Bootstrap core CSS -->
    <link href="{{secure_asset('/front/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/assets/vendors/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/css/style.css') }}">
    @yield('css')
    <style>
        body {
            overflow-x: hidden;
            font-family: 'Poppins'
        }

        #breadcrumb {
            background: #FFFFFF !important;
            padding: 30px 5%;
        }

        #breadcrumb .active {
            color: #C4C4C4;
        }

        #breadcrumb a:hover {
            text-decoration: none;
        }

        .navbar-brand {
            margin-right: 0px !important;
        }

        nav {
            display: flex;
            justify-content: center !important;
            align-items: center;
            background: #FFFFFF !important;
            padding: 100px 5%;
        }

        nav img {
            width: 40px;
            margin: auto !important;
            margin-right: 10px !important;
        }

        .mini-submenu {
            display: none;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid rgba(0, 0, 0, 0.9);
            border-radius: 4px;
            padding: 9px;
            /*position: relative;*/
            width: 42px;

        }

        .mini-submenu:hover {
            cursor: pointer;
        }

        .mini-submenu .icon-bar {
            border-radius: 1px;
            display: block;
            height: 2px;
            width: 22px;
            margin-top: 3px;
        }

        .mini-submenu .icon-bar {
            background-color: #000;
        }

        #slide-submenu {
            background: rgba(0, 0, 0, 0.45);
            display: inline-block;
            padding: 0 8px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a style="color:#0ACC94;font-weight: bold;" class="navbar-brand" href="/"><img
                src="{{secure_asset('/front/assets/image/logo.png')}}" alt="">Decorative Plant</a>
    </nav>

    <!-- Breadcrumb -->
    @yield('breadcumb')

    <!-- Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3 sidebar mb-5">
                <div class="mini-submenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <div class="list-group">
                    <span href="#" class="list-group-item active">
                        Submenu
                        <span class="pull-right" id="slide-submenu">
                            <i class="fa fa-times"></i>
                        </span>
                    </span>
                    <a href="{{route('home')}}" class="list-group-item">
                        <i class="fa fa-comment-o"></i> Dashboard
                    </a>
                    <a href="{{route('customer.orders')}}" class="list-group-item">
                        <i class="fa fa-search"></i> Pesanan
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-user"></i> Pengaturan
                    </a>
                    <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    @yield('js')
    <script>
        window.jQuery || document.write('<script src="{{asset('
            front / assets / js / vendor / jquery.slim.min.js ')}}"><\/script>')
    </script>
    <script src="{{secure_asset('/front/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ secure_asset('ecommerce/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ secure_asset('ecommerce/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('ecommerce/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script>
        $(function () {

            $('#slide-submenu').on('click', function () {
                $(this).closest('.list-group').fadeOut('slide', function () {
                    $('.mini-submenu').fadeIn();
                });

            });

            $('.mini-submenu').on('click', function () {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        })
    </script>
    <script src="{{ secure_asset('ecommerce/vendors/counter-up/jquery.counterup.js') }}"></script>
    <script src="https://kit.fontawesome.com/715497a4a3.js" crossorigin="anonymous"></script>
</body>

</html>