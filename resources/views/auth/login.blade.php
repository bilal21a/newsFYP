@extends('index')
@section('css')
    <link href="{{asset('css/login.css')}} "rel="stylesheet">
@endsection

@section('content')
    

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
                                        <h3 class="block-title">Sign In</h3>
                                        <div class="block-options">
                                            @if (Route::has('password.request'))
                                            <a class="btn-block-option font-size-sm" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>

                                                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                {{ __('Forgot Password?') }}
                                                            </a> --}}
                                            @endif
                                            {{-- <a class="btn-block-option font-size-sm" href="op_auth_reminder.html">Forgot Password?</a> --}}
                                            <a class="btn-block-option" href="{{ route('register') }}" data-toggle="tooltip" data-placement="left" title="New Account">
                                                <i class="fa fa-user-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">
                                            <h1 class="mb-2">World News</h1>
                                            <p>Welcome, please login.</p>

                                            <!-- Sign In Form -->

                                            <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input id="email" type="email" class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                                        {{-- <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="login-username" placeholder="Username"> --}}
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="password" type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        {{-- <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="login-password" placeholder="Password"> --}}
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label class="custom-control-label font-w400" for="login-remember">{{ __('Remember Me') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-success">
                                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{ __('Login') }}
                                                        </button>
                                                    </div>
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
@endsection

@section('js')
        <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('js/js/pages/op_auth_signin.min.js')}}"></script>
@endsection
