<!doctype html>
<html lang="en">
    <head>
        @php
            $name= App\Setting::first();
        @endphp
        <title>{{ $name->system_name }} - Admin</title>
         <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href={{ asset('img/system_image/favicon.jpg') }}>
        <link rel="icon" type="image/png" sizes="192x192" href={{ asset('img/system_image/favicon.jpg') }}>
        <link rel="apple-touch-icon" sizes="180x180" href={{ asset('img/system_image/favicon.jpg') }}>
        <!-- END Icons -->
        @yield('before_css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link href="{{asset('css/oneui.min.css')}} "rel="stylesheet">
        @yield('css')

    </head>
    <body>

        @yield('internal_css')

        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            @include('layouts.partials.admin.rightsidebar')

            @include('layouts.partials.admin.leaftsidebar')

            @include('layouts.partials.admin.header')



            <main id="main-container">
                    @yield('content')
            </main>



        </div>


        <script src="{{asset('js/oneui.core.min.js')}}"></script>
        <script src="{{asset('js/oneui.app.min.js')}}"></script>
        <script src="{{asset('js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('js/pages/be_pages_dashboard.min.js')}}"></script>
        @yield('js')

    </body>
</html>
