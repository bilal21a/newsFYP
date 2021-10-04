<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @yield('title')

         <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href={{ asset('img/system_image/favicon.jpg') }}>
        <link rel="icon" type="image/png" sizes="192x192" href={{ asset('img/system_image/favicon.jpg') }}>
        <link rel="apple-touch-icon" sizes="180x180" href={{ asset('img/system_image/favicon.jpg') }}>
        <!-- END Icons -->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link href="{{asset('css/oneui.min.css')}} "rel="stylesheet">
        <link href="{{asset('css/style.css')}} "rel="stylesheet">
        <link href="{{asset('css/footer.css')}} "rel="stylesheet">

        @yield('css')
    </head>

    <body>
        @yield('inline_css')

        @include('layouts.partials.header')

        @yield('content')





        @include('layouts.partials.footer')

        <!-- JavaScript Libraries -->
        {{-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> --}}
        <script src="{{asset('js/oneui.core.min.js')}}"></script>
        <script src="{{asset('js/oneui.app.min.js')}}"></script>
        <script src="{{asset('js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('js/pages/be_pages_dashboard.min.js')}}"></script>
        <script>
            $( document ).ready(function() {
              $(".s-btn-close").css("display","none");
              $(".s-btn-open").css("display","block");
            $( "#s-btn-click1" ).click(function() {
              $(".s-btn-close").css("display","block");
              $(".s-btn-open").css("display","none");
            });
            $( "#s-btn-click" ).click(function() {
              $(".s-btn-close").css("display","none");
              $(".s-btn-open").css("display","block");
            });

  });
          </script>
        @yield('js')

    </body>
</html>
