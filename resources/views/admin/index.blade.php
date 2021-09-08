<!doctype html>
<html lang="en">
    <head>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link href="{{asset('css/oneui.min.css')}} "rel="stylesheet">
        @yield('css')

    </head>
    <body>

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
