<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php echo $__env->make('frontend.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="js">

	<div class="preloader-wrap">
    <div class="preloader">
      <div class="dog-head"></div>
      <div class="dog-body"></div>
    </div>
  </div>

	<?php echo $__env->make('frontend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- Header -->
	<?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!--/ End Header -->
	<?php echo $__env->yieldContent('main-content'); ?>

	<?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\wamp64\www\Ecommerce-Laravel\Ecommerce-Laravel\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>