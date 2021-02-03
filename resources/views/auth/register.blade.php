<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="{{secure_asset('/front/assets/icon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{secure_asset('/front/assets/icon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{secure_asset('/front/assets/icon/favicon-16x16.png')}}">
    <meta name="author" content="">

    <title>Decorative Plant | Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{secure_asset('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{secure_asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        h2 {
            font-size: 38px;
            color: #0ACC94 !important;
            font-weight: bold;
        }

        .bg-gradient-color {
            background-color: #A3ACB1;
        }

        .bg-green {
            background-color: #23607f;
        }

        .btn-danger{
            border-radius: 20px;
        }

        .card{
            border-radius: 30px;
        }

        @media only screen and (min-width: 769px) and (max-width: 1450px) {
            .container {
                margin-top: 60px;
            }

        }
        @media only screen and (max-width: 576px) {
            .container {
                margin-top: 40px;
            }
        }
    </style>

</head>

<body class="bg-gradient-info">

    <div class="container">
        <a class="btn btn-danger" href="/"><i class="fas fa-arrow-left"></i> Back to Home</a>

        <div class="card o-hidden border-0 shadow-lg my-3">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-green">
                        <center>
                            <img src="{{asset('image/cactus.png')}}" style="width: 80%;margin-top:50px" alt="">
                            <h2>Decorative Plant</h2>
                        </center>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="exampleFirstName" placeholder="Your Name" name="name"
                                            value="{{ old('name') }}" required autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="exampleInputEmail" placeholder="Email Address" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number"
                                        class="form-control @error('no_telp') is-invalid @enderror form-control-user"
                                        id="exampleInputEmail" placeholder="Phone Number" name="no_telp"
                                        value="{{ old('no_telp') }}" required autofocus>
                                    @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password" name="password" required
                                            autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Confirm Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a><br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{secure_asset('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{secure_asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{secure_asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{secure_asset('sbadmin/js/sb-admin-2.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/715497a4a3.js" crossorigin="anonymous"></script>

</body>

</html>
