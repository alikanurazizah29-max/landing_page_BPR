<!-- /*
* Template Name: Append
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ asset('user/favicon.png') }}">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('user/fonts/feather/style.css') }}">
  <link rel="stylesheet" href="{{ asset('user/fonts/flaticon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}">

  <title>@yield('title', 'BPR | Home')</title>
</head>
<body>
  @include('user.layout.header')

    @yield('content')

    @include('user.layout.footer')

  <script src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('user/js/jquery-migrate-3.0.0.min.js') }}"></script>
  <script src="{{ asset('user/js/popper.min.js') }}"></script>
  <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('user/js/aos.js') }}"></script>
  <script src="{{ asset('user/js/imagesloaded.pkgd.js') }}"></script>
  <script src="{{ asset('user/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('user/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('user/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('user/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('user/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('user/js/custom.js') }}"></script>

  @yield('scripts')
</body>
</html>
