@extends('index2')
@section('css')
    <link href="{{asset('css/login.css')}} "rel="stylesheet">
@endsection
@section('content')


        <!-- Page Container -->
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <!-- <div class="bg-image" style="background-image: url('assets/media/photos/photo6@2x.jpg');"> -->
                    <div class="hero-static bg-white-95">
                        <div class="content">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4">
                                    <!-- Sign In Block -->
                                    <div class="block block-themed block-fx-shadow  mb-0">
                                        <div class="block-header">
                                            <h3 class="block-title">Forget Password</h3>
                                            <div class="block-options">
                                                <!-- <a class="btn-block-option font-size-sm" href="op_auth_reminder.html">Forgot Password?</a> -->
                                                <a class="btn-block-option" href="{{ route('login') }}" data-toggle="tooltip" data-placement="left" title="Sign In">
                                                    <i class="fa fa-sign-in-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                                <!-- <h1 class="mb-2">World News</h1>
                                                <p>Welcome, please login.</p> -->

                                                <!-- Sign In Form -->
                                                        @if (session('status'))
                                                             <div class="alert alert-success" role="alert">
                                                             {{ session('status') }}
                                                             </div>
                                                         @endif

                                                <form class="js-validation-signin" action="{{ route('password.email') }}" method="POST">
                                                    @csrf
                                                    <div class="py-3">
                                                        <div class="form-group">
                                                            <label for="val-username">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>
                                                            <input id="email" type="email" class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            {{-- <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="login-username" placeholder="Username"> --}}
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">

                                                        <div class="col-md-7">
                                                            <button type="submit" class="btn btn-block btn-success" >
                                                                <i class="fa fa-unlock-alt mr-1"></i> {{ __('Send Password Reset Link') }}
                                                            </button>
                                                        </div>

                                                </form>
                                                <!-- END Sign In Form -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Sign In Block -->
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- </div> -->
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
@endsection
@section('js')
        <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('js/js/pages/op_auth_signin.min.js')}}"></script>
@endsection
