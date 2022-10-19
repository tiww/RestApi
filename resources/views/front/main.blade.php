<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Project B</title>
  {{--  <title>{{ $title }}</title>   --}}
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('frontAssets/img/brand/sepatu.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontAssets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('frontAssets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <!-- Alertify CSS -->
  <link rel="stylesheet" href="{{ asset('frontAssets/css/alertify.min.css') }}"/>

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontAssets/css/style.css') }}" rel="stylesheet">

  <!-- Icon -->
  <script src="https://kit.fontawesome.com/42771ee002.js" crossorigin="anonymous"></script>
  
</head>
<body>
  <header id="header" class="fixed-top">
    @include('front.layouts.header')
  </header><!-- End Header -->
  
  @yield('content')
 
  <!-- ======= Footer ======= -->
  <footer id="footer">
  @include('front.layouts.footer')
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontAssets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('frontAssets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontAssets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontAssets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontAssets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontAssets/vendor/php-email-form/validate.js') }}"></script>
  

  <!-- Template Main JS File -->
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="{{ asset('frontAssets/js/main.js') }}"></script>
  <script src="{{ asset('frontAssets/js/custom.js') }}"></script>
  <script src="{{ asset('frontAssets/js/custom2.js') }}"></script>

  <!-- alertify -->
  <script src="{{ asset('frontAssets/js/alertify.min.js') }}"></script>
  
</body>
</html>