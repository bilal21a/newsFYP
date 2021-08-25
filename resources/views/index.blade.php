<!DOCTYPE html>
<html lang="en">
    <head>


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link href="{{asset('css/oneui.min.css')}} "rel="stylesheet">
        <link href="{{asset('css/style.css')}} "rel="stylesheet">
        <link href="{{asset('css/footer.css')}} "rel="stylesheet">

        @yield('css')
    </head>

    <body>
        @yield('inline_css')

        @include('layouts.partials.header')

            <br> <br> <br> <br>
        @yield('content')






        @include('layouts.partials.footer')

        <!-- JavaScript Libraries -->
        {{-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> --}}
        <script src="{{asset('js/oneui.core.min.js')}}"></script>
        <script src="{{asset('js/oneui.app.min.js')}}"></script>
        <script src="{{asset('js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('js/pages/be_pages_dashboard.min.js')}}"></script>
        @yield('js')

    </body>
</html>
