<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Moderna Bootstrap Template - Index</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('org/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('org/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    @yield('style')
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('org/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/owl.carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('org/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('org/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Moderna - v2.0.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('components.org.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->

    @yield('slide')
    <!-- End Hero -->

    <main id="main">
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('components.org.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('org/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('org/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('org/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('org/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('org/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('org/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('org/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('org/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('org/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('org/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('org/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
