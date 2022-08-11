<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    {{-- csrf token for ajax --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.ico') }}">
    {{-- bootstrap touchspin class for (quantity increment decrement) --}}
    <link href="{{ asset('front/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('front/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('front/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

     <!-- Owl Carousel Css min css -->
     <link href="{{ asset('front/assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- Owl carousel theme-->
     <link href="{{ asset('front/assets/css/owl.theme.default.min.css') }}"  rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
     <link href="{{ asset('front/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body data-topbar="light" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('frontend.layout.header')

        @include('frontend.layout.navbar')

        @yield('content')

    </div>
    <!-- END layout-wrapper -->



    <!-- JAVASCRIPT -->
    <script src="{{ asset('front/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('front/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('front/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('front/assets/js/app.js') }}"></script>

    {{-- jquery --}}
    <script src="{{ asset('front/assets/js/jquery-3.6.0.min.js') }}"></script>
    {{-- owl carousel js --}}
    <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>

    {{-- custom js --}}
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>
    <script src="{{ asset('front/assets/js/front_script.js') }}"></script>

     <!-- Bootrstrap touchspin -->
     <script src="{{ asset('front/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

     <script src="{{ asset('front/assets/js/pages/ecommerce-cart.init.js') }}"></script>

  <!-- Sweet Alerts js -->
  <script src="{{ asset('front/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

  <!-- Sweet alert init js-->
  <script src="{{ asset('front/assets/js/pages/sweet-alerts.init.js') }}"></script>

    {{-- @yield('scripts') --}}

</body>

</html>
