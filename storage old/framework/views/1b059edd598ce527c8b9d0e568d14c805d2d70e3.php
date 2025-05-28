
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>E-Bülten</h4>
<p>Bültenimize abone olun, ilk alışverişinizde <span>%10</span> indirim kazanın</p>
<form action="<?php echo e(route('subscribe')); ?>" method="post" class="newsletter-inner">
    <?php echo csrf_field(); ?>
    <input name="email" placeholder="E-posta adresiniz" required="" type="email">
    <button class="btn" type="submit">Abone Ol</button>
</form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
<?php /**PATH C:\wamp64\www\Ecommerce-Laravel\Ecommerce-Laravel\resources\views/frontend/layouts/newsletter.blade.php ENDPATH**/ ?>