<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')
</head>
<body class="js">

	<div class="preloader-wrap">
    <div class="preloader">
      <div class="dog-head"></div>
      <div class="dog-body"></div>
    </div>
  </div>

	@include('frontend.layouts.notification')
	@include('frontend.layouts.header')
	@yield('main-content')

	@include('frontend.layouts.footer')

</body>
</html>
