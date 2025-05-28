<?php $__env->startSection('title', 'PettyShop - About Us'); ?>

<?php $__env->startSection('main-content'); ?>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="/">Ana Sayfa<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">Hakkımızda</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <?php
                            $settings = DB::table('settings')->get();
                        ?>
                        <h3><span>PettyShop</span>'a Hoş Geldiniz</h3>
                        <p>
                            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($data->description); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                        <div class="button">
                            <a href="<?php echo e(route('blog')); ?>" class="btn">Blogumuz</a>
                            <a href="<?php echo e(route('contact')); ?>" class="btn primary">İletişim</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        <div class="button">
                            <a href="https://www.youtube.com/watch?v=7edcgCdiHVU" class="video video-popup mfp-iframe"><i
                                    class="fa fa-play"></i></a>
                        </div>
                        <img src="<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($data->photo); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                            alt="<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($data->photo); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->


    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Ücretsiz Kargo</h4>
                        <p>100$ üzeri siparişler</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Ücretsiz İade</h4>
                        <p>30 gün içinde iade</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Güvenli Ödeme</h4>
                        <p>%100 güvenli ödeme</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>En Uygun Fiyat</h4>
                        <p>Garantili fiyat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    <?php echo $__env->make('frontend.layouts.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Ecommerce-Laravel\Ecommerce-Laravel\resources\views/frontend/pages/about-us.blade.php ENDPATH**/ ?>