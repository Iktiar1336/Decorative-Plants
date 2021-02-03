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
                src="{{secure_asset('/front/assets/image/logo.png')}}" alt="">Decorative Plant</a>
    </nav>

    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <h5><a class="active" href="/"> Home </a>/ Cart </h5>
    </div>

    <!-- Page -->
    <div class="page">
        <div class="container">
            <div class="cart_inner">
                <form action="{{ route('front.update_cart') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($carts as $row)
                              <tr>
                                <td>
                                  <div class="media">
                                    <div class="d-flex">
                                                            <img src="{{ secure_asset('storage/products/' . $row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
                                    </div>
                                    <div class="media-body">
                                                            <p>{{ $row['product_name'] }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                                    <h5>Rp {{ number_format($row['product_price']) }}</h5>
                                </td>
                                <td>
                                  <div class="product_count">
                                    
                                    
                                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                                                        <input type="text" name="qty[]" id="sst{{ $row['product_id'] }}" maxlength="12" value="{{ $row['qty'] }}" title="Quantity:" class="input-text qty">
                                                        <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control">
                                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                                    
                                    
                                    <button onclick="var result = document.getElementById('sst{{ $row['product_id'] }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                     class="increase items-count" type="button">
                                      <i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button onclick="var result = document.getElementById('sst{{ $row['product_id'] }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                     class="reduced items-count" type="button">
                                      <i class="lnr lnr-chevron-down"></i>
                                    </button>
                                  </div>
                                </td>
                                <td>
                                                    <h5>Rp {{ number_format($row['product_price'] * $row['qty']) }}</h5>
                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4">Tidak ada belanjaan</td>
                                            </tr>
                                            @endforelse
                              <tr class="bottom_button">
                                <td>
                                  <button class="gray_btn">Update Cart</button>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                            </tr>
                </form>
                <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        <h5>Subtotal</h5>
                    </td>
                    <td>
                        <h5>Rp {{ number_format($subtotal) }}</h5>
                    </td>
                </tr>
                {{-- <tr class="shipping_area">
								<td></td>
								<td></td>
								<td>
									<h5>Shipping</h5>
								</td>
								<td>
									<div class="shipping_box">
										<ul class="list">
											<li>
												<a href="#">Flat Rate: $5.00</a>
											</li>
											<li>
												<a href="#">Free Shipping</a>
											</li>
											<li>
												<a href="#">Flat Rate: $10.00</a>
											</li>
											<li class="active">
												<a href="#">Local Delivery: $2.00</a>
											</li>
										</ul>
										<h6>Calculate Shipping
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</h6>
										<select class="shipping_select">
											<option value="1">Bangladesh</option>
											<option value="2">India</option>
											<option value="4">Pakistan</option>
										</select>
										<select class="shipping_select">
											<option value="1">Select a State</option>
											<option value="2">Select a State</option>
											<option value="4">Select a State</option>
										</select>
										<input type="text" placeholder="Postcode/Zipcode">
										<a class="gray_btn" href="#">Update Details</a>
									</div>
								</td>
							</tr> --}}
                <tr class="out_button_area">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="checkout_btn_inner">
                            <a class="gray_btn" href="{{ route('front.index') }}">Continue Shopping</a>
                            <a class="main_btn" href="{{ route('front.checkout') }}">Proceed to checkout</a>
                        </div>
                    </td>
                </tr>
                </tbody>
                </table>
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
</body>

</html>