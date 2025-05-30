@yield('meta')
<title>@yield('title')</title>
<link rel="icon" type="image/png" href="http://127.0.0.1:8000/frontend/img/logo-2.webp">
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
<link rel="manifest" href="/manifest.json">
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
<style>
    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }

    /*
</style>
@stack('styles')
