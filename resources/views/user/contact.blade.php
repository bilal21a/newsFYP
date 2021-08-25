@extends('index')

@section('css')
    <link href="{{asset('css/contact.css')}} "rel="stylesheet">

@endsection
@section('content')
        <!-- Breadcrumb Start -->
        {{-- <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ul>
            </div>
        </div> --}}
        <!-- Breadcrumb End -->


        <!-- Contact Start -->
        <div class="container">
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Let's get in touch</h3>
                    <p class="text"> Contact us with the following details. and fillup the form with the details. </p>
                    <div class="info">
                        <div class="social-information"> <i class="fa fa-map-marker-alt">
                            <a class="text-success"  href="https://www.google.com/maps/dir/31.5695028,74.4189131/pen+and+web/@31.5176833,74.3351558,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3919091c8399592b:0xcaf9db2858a4a5bd!2m2!1d74.4133071!2d31.4621124" >
                                NPM,NY,USA</a>
                        </i>
                            <!-- <p>NPM,NY,USA</p> -->
                        </div>
                        <div class="social-information"> <i class="si si-envelope">
                            <a class="text-success" href="mailto:webmaster@example.com">info@worldnews.com</a>
                        </i>
                            <!-- <p>contact@bbbootstrap.com</p> -->

                        </div>
                        <div class="social-information"> <i class="fa fa-mobile-alt">
                            <a class="text-success" href="callto:+923328163808" >Call +923328163808</a>
                        </i>
                            <!-- <p>+1 989 989 9898 </p> -->
                        </div>
                    </div>
                    <div class="social-media">
                        <p>Connect with us :</p>
                        <div class="social-icons"> <a href="#"> <i class="fab fa-facebook-f"></i> </a> <a href="#"> <i class="fab fa-twitter"></i> </a> <a href="#"> <i class="fab fa-instagram"></i> </a> <a href="#"> <i class="fab fa-linkedin"></i> </a> </div>
                    </div>
                </div>
                <div class="contact-info-form"> <span class="circle one"></span> <span class="circle two"></span>
                    <form action="#" onclick="return false;" autocomplete="off">
                        <h3 class="title">Contact us</h3>
                        <div class="social-input-containers"> <input type="text" name="name" class="input" placeholder="Name" /> </div>
                        <div class="social-input-containers"> <input type="email" name="email" class="input" placeholder="Email" /> </div>
                        <div class="social-input-containers"> <input type="tel" name="phone" class="input" placeholder="Phone" /> </div>
                        <div class="social-input-containers textarea"> <textarea name="message" class="input" placeholder="Message"></textarea> </div>
                        <!-- <input type="submit" value="Send" class="btn" /> -->
                        <button type="button" class="btn btn-light">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Contact End -->
 @endsection
