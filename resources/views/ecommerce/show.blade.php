<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{secure_asset('/front/assets/icon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{secure_asset('/front/assets/icon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{secure_asset('/front/assets/icon/favicon-16x16.png')}}">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Decorative Plant</title>

    <!-- CSS -->
    <link href="{{secure_asset('/front/assets/css/detail.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{secure_asset('/front/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/dist/css/style.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/responsive/detail/phone-responsive.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/responsive/detail/tablet-responsive.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/front/assets/responsive/detail/desktop-responsive.css')}}" rel="stylesheet">
    <link href="{{secure_asset('/assets/vendors/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('ecommerce/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('ecommerce/css/style.css') }}">

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a style="color:#0ACC94;font-weight: bold;" class="navbar-brand m-auto" href="/"><img
                src="{{secure_asset('/front/assets/image/logo.png')}}" alt="">Decorative Plant</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <img src="{{asset('/image/shopping-cart.png')}}" style="width: 20; height: 30px" alt="">
                <span class="basket-item-count">
                    <sup><span class="badge badge-pill red"></span></sup>
                </span>
            </li>
        </ul>
    </nav>

    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <h5><a class="active" href="/"> Home </a>/ Details </h5>
    </div>
    <!-- Page -->
    <div class="page container">
        <div class="col-sm-6">
            <img src="{{ secure_asset('/image/' . $product->image) }}">
        </div>
        <div class="col-sm-6">
            <div id="description">
                <h2 id="tittle-detail">{{$product->name}}</h2>
                <p class="mt-5" id="buyer">Nama ilmiah : {{$product->ilmiah}}</p>
                <p id="buyer">Keluarga : {{ $product->category->name }}</p>
                <p id="buyer">Ordo : {{$product->ordo}}</p>
                <p id="buyer">Tingkatan takson : {{$product->takson}}</p>
                <p class="mt-5" id="total">Total</p>
                <p id="price">IDR {{ number_format($product->price) }}</p>

                <form action="{{ route('front.cart') }}" method="POST">
                    @csrf
                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                            class="input-text qty">
                        <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control">
                        <button
                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                            class="increase items-count" type="button">
                            <i class="fa fa-chevron-up"></i>
                        </button>
                        <button
                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                            class="reduced items-count" type="button">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="card_area">
                        <button class="btn btn-cart"> <i class="fa fa-cart-plus"></i> Add to Cart</button>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                    @endif
                </form>
            </div>
        </div>
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
    <script src="{{ secure_asset('/front/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ secure_asset('ecommerce/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ secure_asset('ecommerce/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('ecommerce/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ secure_asset('ecommerce/vendors/counter-up/jquery.counterup.js') }}"></script>
    <script src="{{ secure_asset('/js/sweetalert.min.js') }}"></script>
    @if (session('sukses'))
    <script>
        swal("Success!", "Product was successfully added to cart!",);
    </script>
    @endif
    <script src="https://kit.fontawesome.com/715497a4a3.js" crossorigin="anonymous"></script>
</body>

</html>