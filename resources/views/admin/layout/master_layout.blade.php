<!DOCTYPE HTML>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset=UTF-8>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('src/assets/favicon.svg')}}" type="image/png" />


    <!--plugins-->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css')}}" />

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    @yield('need-css')
    <title>@yield('title')</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->

        @include('admin.assets.sidebar')


        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.assets.topbar')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                  @yield('main')


            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->

        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.assets.footer')
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-knob/excanvas.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

    <script src="{{ asset('assets/js/index.js')}}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js')}}"></script>
    @include('admin.assets.toaster')
    @yield('need-js')
</body>

</html>
