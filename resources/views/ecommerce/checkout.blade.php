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

        #footer {
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #F5F6F8;
        }

        #footer #text {
            color: #8A8C97;
            text-align: center;
            font-size: 18px;
        }
    </style>

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a style="color:#0ACC94;font-weight: bold;" class="navbar-brand ml-3" href="/"><img
                src="{{asset('/front/assets/image/logo.png')}}" alt="">Decorative Plant</a>
    </nav>

    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <h5><a class="active" href="/"> Home </a>/ <a class="active" href="{{route('front.list_cart')}}">Carts</a> / Checkout </h5>
    </div>

    <!-- Page -->
    <div class="page">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Informasi Pengiriman</h3>
                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif


                        <!-- REMOVE DULU VALUE ACTION-NYA JIKA INGIN MELIHATNYA DI BROWSER -->
                        <!-- KARENA ROUTE NAME front.store_checkout BELUM DIBUAT -->
                        <form class="row contact_form" action="{{ route('front.store_checkout') }}" method="post"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" id="first" name="customer_name" required>

                                <!-- UNTUK MENAMPILKAN JIKA TERDAPAT ERROR VALIDASI -->
                                <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="">No Telp</label>
                                <input type="text" class="form-control" id="number" name="customer_phone" required>
                                <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="hidden" class="form-control" id="user_id" value="{{Auth::user()->id}}"
                                    name="user_id" required>
                                <p class="text-danger">{{ $errors->first('user_id') }}</p>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" class="form-control" id="add1" name="customer_address" required>
                                <p class="text-danger">{{ $errors->first('customer_address') }}</p>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Propinsi</label>
                                <select class="form-control" name="province_id" id="province_id" required>
                                    <option value="">Pilih Propinsi</option>
                                    <!-- LOOPING DATA PROVINCE UNTUK DIPILIH OLEH CUSTOMER -->
                                    @foreach ($provinces as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('province_id') }}</p>
                            </div>

                            <!-- ADAPUN DATA KOTA DAN KECAMATAN AKAN DI RENDER SETELAH PROVINSI DIPILIH -->
                            <div class="col-md-12 form-group p_star">
                                <label for="">Kabupaten / Kota</label>
                                <select class="form-control" name="city_id" id="city_id" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                </select>
                                <p class="text-danger">{{ $errors->first('city_id') }}</p>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Kecamatan</label>
                                <select class="form-control" name="district_id" id="district_id" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <p class="text-danger">{{ $errors->first('district_id') }}</p>
                            </div>
                            <!-- ADAPUN DATA KOTA DAN KECAMATAN AKAN DI RENDER SETELAH PROVINSI DIPILIH -->

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Ringkasan Pesanan</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach ($carts as $cart)
                                <li>
                                    <a href="#">{{ \Str::limit($cart['product_name'], 10) }}
                                        <span class="middle">x {{ $cart['qty'] }}</span>
                                        <span class="last">Rp {{ number_format($cart['product_price']) }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal
                                        <span>Rp {{ number_format($subtotal) }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Pengiriman
                                        <span>Rp 0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span>Rp {{ number_format($subtotal) }}</span>
                                    </a>
                                </li>
                            </ul>
                            <button class="main_btn">Bayar Pesanan</button>
                            </form>
                        </div>
                    </div>
                </div>
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
    <script src="{{asset('/front/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('ecommerce/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ecommerce/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('ecommerce/vendors/counter-up/jquery.counterup.js') }}"></script>
    <script>
        //KETIKA SELECT BOX DENGAN ID province_id DIPILIH
        $('#province_id').on('change', function () {
            //MAKA AKAN MELAKUKAN REQUEST KE URL /API/CITY
            //DAN MENGIRIMKAN DATA PROVINCE_ID
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: {
                    province_id: $(this).val()
                },
                success: function (html) {
                    //SETELAH DATA DITERIMA, SELEBOX DENGAN ID CITY_ID DI KOSONGKAN
                    $('#city_id').empty()
                    //KEMUDIAN APPEND DATA BARU YANG DIDAPATKAN DARI HASIL REQUEST VIA AJAX
                    //UNTUK MENAMPILKAN DATA KABUPATEN / KOTA
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function (key, item) {
                        $('#city_id').append('<option value="' + item.id + '">' + item
                            .name + '</option>')
                    })
                }
            });
        })

        //LOGICNYA SAMA DENGAN CODE DIATAS HANYA BERBEDA OBJEKNYA SAJA
        $('#city_id').on('change', function () {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: {
                    city_id: $(this).val()
                },
                success: function (html) {
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function (key, item) {
                        $('#district_id').append('<option value="' + item.id + '">' + item
                            .name + '</option>')
                    })
                }
            });
        })
    </script>
    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
</body>

</html>