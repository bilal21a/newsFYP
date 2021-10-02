<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{asset('css/login.css')}} "rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{ asset('css/util.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('css/main.css') }}>
	<link rel="icon" type="image/png" href={{ asset('images/icons/favicon.ico') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('vendor/bootstrap/css/bootstrap.min.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('vendor/animate/animate.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('vendor/css-hamburgers/hamburgers.min.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('vendor/animsition/css/animsition.min.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('vendor/select2/select2.min.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('vendor/daterangepicker/daterangepicker.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}>
</head>

<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url({{ URL::asset('images/bg-01.jpg') }})
    /* {{ asset('images/bg-01.jpg') }};"> */
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Admin Login
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>

        <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('js/js/pages/op_auth_signin.min.js')}}"></script>
        <script src={{ asset('vendor/jquery/jquery-3.2.1.min.js') }}></script>
        <script src={{ asset('vendor/animsition/js/animsition.min.js') }}></script>
        <script src={{ asset('vendor/bootstrap/js/popper.js') }}></script>
        <script src={{ asset('vendor/bootstrap/js/bootstrap.min.js') }}></script>
        <script src={{ asset('vendor/select2/select2.min.js') }}></script>
        <script src={{ asset('vendor/daterangepicker/moment.min.js') }}></script>
        <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script src={{ asset('vendor/countdowntime/countdowntime.js') }}></script>
        <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
