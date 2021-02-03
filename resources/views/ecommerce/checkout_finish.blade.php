<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Decorative Plant</title>

    <!-- CSS -->

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/front/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendors/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/assets/css/checkout.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('ecommerce/css/style.css') }}">
    <style>
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
    </style>

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a style="color:#0ACC94;font-weight: bold;" class="navbar-brand" href="/"><img
                src="{{secure_asset('/front/assets/image/logo.png')}}" alt="">Decorative Plant</a>
    </nav>

    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <h5><a class="active" href="/"> Home </a>/ <a class="active" href="{{route('front.list_cart')}}">Carts</a> /
            Checkout Finish</h5>
    </div>

    <!-- Page -->
    <div class="page">
        <section class="order_details" style="margin-top: -100px">
            <div class="container">
                <h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima.</h3>
                <div class="row order_d_inner">
                    <div class="col-lg-12">
                        <div class="details_item">
                            <h3>Informasi Pesanan</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->customer_address }}</td>
                                        <td>{{ $order->district->city->name }}</td>
                                        <td>Indonesia</td>
                                        <td>Rp {{ number_format($order->subtotal) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/" class="btn btn-info"><i class="mdi mdi-arrow-left"></i> Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <div id="footer">
        <span id="text">Copyright 2021. All Rights Reserved Design by Muhammad Rizky</span>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="{{asset('
            front / assets / js / vendor / jquery.slim.min.js ')}}"><\/script>')
    </script>
    <script src="{{asset('/front/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('ecommerce/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ecommerce/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('ecommerce/vendors/counter-up/jquery.counterup.js') }}"></script>
</body>

</html>