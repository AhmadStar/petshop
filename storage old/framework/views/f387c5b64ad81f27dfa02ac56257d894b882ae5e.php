<?php $__env->startSection('title', 'PettyShop - HOME PAGE'); ?>
<?php $__env->startSection('main-content'); ?>
    <!-- Slider Area -->
    <?php if(count($banners) > 0): ?>
        <section id="Gslider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#Gslider" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ? 'active' : ''); ?>">
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                        <img class="first-slide" src="<?php echo e($banner->photo); ?>" alt="First slide">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="wow fadeInDown"><?php echo e($banner->title); ?></h1>
                            <p><?php echo html_entity_decode($banner->description); ?></p>
                            <a class="btn btn-lg ws-btn wow fadeInUpBig" href="<?php echo e(route('product-grids')); ?>"
                                role="button">Hemen Al<i class="far fa-arrow-alt-circle-right"></i></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Önceki</span>
            </a>
            <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Sonraki</span>
            </a>
        </section>
    <?php endif; ?>

    <!--/ End Slider Area -->

    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <?php
                    $category_lists = DB::table('categories')->where('status', 'active')->limit(3)->get();
                ?>
                <?php if($category_lists): ?>
                    <?php $__currentLoopData = $category_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($cat->is_parent == 1): ?>
                            <!-- Single Banner  -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-banner">
                                    <?php if($cat->photo): ?>
                                        <img src="<?php echo e($cat->photo); ?>" alt="<?php echo e($cat->photo); ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/600x370" alt="#">
                                    <?php endif; ?>
                                    <div class="content">
                                        <h3><?php echo e($cat->title); ?></h3>
                                        <a href="<?php echo e(route('product-cat', $cat->slug)); ?>">Hemen Keşfet</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- /End Single Banner  -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End Small Banner -->

    <!--== Start Product Category Area Wrapper ==-->
    <section class="product-area product-category-area bg-color-f2 pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title shape-center text-center">
              <h5 class="sub-title">TREND KATEGORİLER</h5>
              <h2 class="title">SENİN İÇİN;</h2>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-gutter-43">
          <div class="col">
            <!--== Start Product Category Item ==-->
            <div class="product-category-item">
              <div class="thumb">
                <a href="shop.html"><img src="http://127.0.0.1:8000/frontend/img/category/1.webp" width="200" height="200" alt="Kedi Kategorisi"></a>
              </div>
              <div class="content">
                <h3 class="title"><a href="shop.html">Kedi</a></h3>
              </div>
            </div>
            <!--== End Product Category Item ==-->
          </div>
          <div class="col">
            <!--== Start Product Category Item ==-->
            <div class="product-category-item">
              <div class="thumb">
                <a href="shop.html"><img src="http://127.0.0.1:8000/frontend/img/category/2.webp" width="200" height="200" alt="Balık Kategorisi"></a>
              </div>
              <div class="content">
                <h3 class="title"><a href="shop.html">Balık</a></h3>
              </div>
            </div>
            <!--== End Product Category Item ==-->
          </div>
          <div class="col">
            <!--== Start Product Category Item ==-->
            <div class="product-category-item">
              <div class="thumb">
                <a href="shop.html"><img src="http://127.0.0.1:8000/frontend/img/category/3.webp" width="200" height="200" alt="Kuş Kategorisi"></a>
              </div>
              <div class="content">
                <h3 class="title"><a href="shop.html">Kuş/Papağan</a></h3>
              </div>
            </div>
            <!--== End Product Category Item ==-->
          </div>
          <div class="col">
            <!--== Start Product Category Item ==-->
            <div class="product-category-item">
              <div class="thumb">
                <a href="shop.html"><img src="http://127.0.0.1:8000/frontend/img/category/4.webp" width="200" height="200" alt="Köpek Kategorisi"></a>
              </div>
              <div class="content">
                <h3 class="title"><a href="shop.html">Köpek</a></h3>
              </div>
            </div>
            <!--== End Product Category Item ==-->
          </div>
          <div class="col">
            <!--== Start Product Category Item ==-->
            <div class="product-category-item">
              <div class="thumb">
                <a href="shop.html"><img src="http://127.0.0.1:8000/frontend/img/category/5.webp" width="200" height="200" alt="Tavşan Kategorisi"></a>
              </div>
              <div class="content">
                <h3 class="title"><a href="shop.html">Tavşan</a></h3>
              </div>
            </div>
            <!--== End Product Category Item ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Category Area Wrapper ==-->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title shape-center text-center">
                        <h2>Yeni Ürünler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                <?php
                                    $categories = DB::table('categories')
                                        ->where('status', 'active')
                                        ->where('is_parent', 1)
                                        ->get();
                                    // dd($categories);
                                ?>
                                <?php if($categories): ?>
                                    <button class="btn" style="background:#474654"data-filter="*">
                                        Son Eklenenler
                                    </button>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button class="btn"
                                            style="background:none;color:#474654;"data-filter=".<?php echo e($cat->id); ?>">
                                            <?php echo e($cat->title); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid" id="myTabContent">
                            <?php
                                $recentlyAddedProducts = DB::table('products')
                                    ->where('status', 'active')
                                    ->orderBy('created_at', 'desc')
                                    ->take(8) // Get the 8 most recently added products
                                    ->get();
                            ?>

                            <?php $__currentLoopData = $recentlyAddedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo e($product->cat_id); ?>">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?php echo e(route('product-detail', $product->slug)); ?>">
                                                <?php
                                                    $photos = explode(',', $product->photo);
                                                ?>
                                                <img class="default-img" src="<?php echo e($photos[0]); ?>"
                                                    alt="<?php echo e($photos[0]); ?>">
                                                <img class="hover-img" src="<?php echo e($photos[0]); ?>"
                                                    alt="<?php echo e($photos[0]); ?>">
                                                <?php if($product->stock <= 0): ?>
                                                    <span class="out-of-stock">Tükendi</span>
                                                <?php elseif($product->condition == 'new'): ?>
                                                    <span class="new">Yeni</span>
                                                <?php elseif($product->condition == 'hot'): ?>
                                                    <span class="hot">Popüler</span>
                                                <?php else: ?>
                                                    <span class="price-dec"><?php echo e($product->discount); ?>% İndirim</span>
                                                <?php endif; ?>
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#<?php echo e($product->id); ?>"
                                                        title="Hızlı Görünüm" href="#">
                                                        <i class="ti-eye"></i><span>Hızlı Bakış</span>
                                                    </a>
                                                    <a title="Favori Listesi"
                                                        href="<?php echo e(route('add-to-wishlist', $product->slug)); ?>">
                                                        <i class="ti-heart"></i><span>Favorilere Ekle</span>
                                                    </a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Sepete Ekle"
                                                        href="<?php echo e(route('add-to-cart', $product->slug)); ?>">Sepete Ekle</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a
                                                    href="<?php echo e(route('product-detail', $product->slug)); ?>"><?php echo e($product->title); ?></a>
                                            </h3>
                                            <?php
                                                $after_discount =
                                                    $product->price - ($product->price * $product->discount) / 100;
                                            ?>
                                            <div class="product-price">
                                                <span>$<?php echo e(number_format($after_discount, 2)); ?></span>
                                                <del
                                                    style="padding-left: 4%;">$<?php echo e(number_format($product->price, 2)); ?></del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <?php if($featured): ?>
                    <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Single Banner  -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single-banner">
                                <?php
                                    $photo = explode(',', $data->photo);
                                ?>
                                <img src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
                                <div class="content">
                                    <p><?php echo e($data->cat_info['title']); ?></p>
                                    <h3><?php echo e($data->title); ?> <br><span><?php echo e($data->discount); ?>%'a varan</span> indirim</h3>
                                    <a href="<?php echo e(route('product-detail', $data->slug)); ?>">Hemen Al</a>
                                </div>
                            </div>
                        </div>
                        <!-- /End Single Banner  -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title shape-center">
                        <h2>Çok Satanlar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <?php $__currentLoopData = $product_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->condition == 'hot'): ?>
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?php echo e(route('product-detail', $product->slug)); ?>">
                                            <?php
                                                $photo = explode(',', $product->photo);
                                                // dd($photo);
                                            ?>
                                            <img class="default-img" src="<?php echo e($photo[0]); ?>"
                                                alt="<?php echo e($photo[0]); ?>">
                                            <img class="hover-img" src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
                                            
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#<?php echo e($product->id); ?>"
                                                    title="Hızlı Görünüm" href="#">
                                                    <i class="ti-eye"></i><span>Hızlı Bakış</span>
                                                </a>
                                                <a title="Favori Listesi"
                                                    href="<?php echo e(route('add-to-wishlist', $product->slug)); ?>">
                                                    <i class="ti-heart"></i><span>Favorilere Ekle</span>
                                                </a>
                                            </div>
                                            <div class="product-action-2">
                                                <a href="<?php echo e(route('add-to-cart', $product->slug)); ?>">Sepete Ekle</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a
                                                href="<?php echo e(route('product-detail', $product->slug)); ?>"><?php echo e($product->title); ?></a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="old">$<?php echo e(number_format($product->price, 2)); ?></span>
                                            <?php
                                                $after_discount =
                                                    $product->price - ($product->price * $product->discount) / 100;
                                            ?>
                                            <span>$<?php echo e(number_format($after_discount, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title shape-left">
                                <h1>Son Ürünler</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $product_lists = DB::table('products')
                                ->where('status', 'active')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
                        ?>
                        <?php $__currentLoopData = $product_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <!-- Start Single List  -->
                                <div class="single-list">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="list-image overlay">
                                                <?php
                                                    $photo = explode(',', $product->photo);
                                                    // dd($photo);
                                                ?>
                                                <img src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
                                                <a href="<?php echo e(route('add-to-cart', $product->slug)); ?>" class="buy"><i
                                                        class="fa fa-shopping-bag"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                                            <div class="content">
                                                <h4 class="title"><a
                                                        href="<?php echo e(route('product-detail', $product->slug)); ?>"><?php echo e($product->title); ?></a>
                                                </h4>
                                                <p class="price with-discount"><?php echo e(number_format($product->discount, 2)); ?>%
                                                    İNDİRİM</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List  -->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->

    <section class="bg-theme-color position-relative z-index-1">
      <div class="p--0">
        <div class="row divider-style1">
          <div class="col-lg-3 col-xl-4">
            <div class="divider-thumb divider-thumb-left">
              <img src="http://127.0.0.1:8000/frontend/img/photos/divider1.webp" width="351" height="435" alt="Image-HasTech">
              <div class="shape-circle"></div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4">
            <div class="divider-content text-center">
              <h5 class="sub-title">%50'ye Varan İndirimlerden Faydalan!</h5>
              <h2 class="title">En İyi Teklif</h2>
              <p class="desc">En kaliteli ürünlere en uygun fiyatlara erişebilmek için aşağıdaki butona tıkla ve</p>
              <a class="btn-theme text-dark" href="shop.html">Alışverişe Başla</a>
              <img class="shape-object" src="http://127.0.0.1:8000/frontend/img/shape/object1.webp" width="316" height="302" alt="Image-HasTech">
            </div>
          </div>
          <div class="col-lg-3 col-xl-4">
            <div class="divider-thumb divider-thumb-right">
              <img src="http://127.0.0.1:8000/frontend/img/photos/divider2.webp" width="488" height="447" alt="Image-HasTech">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title shape-center text-center">
                        <h2>Blogumuzdan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if($posts): ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Blog  -->
                            <div class="shop-single-blog">
                                <img src="<?php echo e($post->photo); ?>" alt="<?php echo e($post->photo); ?>">
                                <div class="content">
                                    <p class="date"><?php echo e($post->created_at->format('d M , Y. D')); ?></p>
                                    <a href="<?php echo e(route('blog.detail', $post->slug)); ?>"
                                        class="title"><?php echo e($post->title); ?></a>
                                    <a href="<?php echo e(route('blog.detail', $post->slug)); ?>" class="more-btn">Devamını Oku</a>
                                </div>
                            </div>
                            <!-- End Single Blog  -->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

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

    <!-- Modal -->
    <?php if($product_lists): ?>
        <?php $__currentLoopData = $product_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="<?php echo e($product->id); ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                    <div class="product-gallery">
                                        <div class="quickview-slider-active">
                                            <?php
                                                $photo = explode(',', $product->photo);
                                                // dd($photo);
                                            ?>
                                            <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single-slider">
                                                    <img src="<?php echo e($data); ?>" alt="<?php echo e($data); ?>">
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2><?php echo e($product->title); ?></h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    <?php
                                                        $rate = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->avg('rate');
                                                        $rate_count = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->count();
                                                    ?>
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <?php if($rate >= $i): ?>
                                                            <i class="yellow fa fa-star"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </div>
                                                <a href="#">(<?php echo e($rate_count); ?> müşteri yorumu)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                <!-- With quantity specification -->
                                                <?php if($product->stock > 0): ?>
                                                    <span><i class="fa fa-check-circle-o"></i> <?php echo e($product->stock); ?> Adet
                                                        Stokta</span>
                                                <?php else: ?>
                                                    <span><i class="fa fa-times-circle-o text-danger"></i> Tükendi</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php
                                            $after_discount =
                                                $product->price - ($product->price * $product->discount) / 100;
                                        ?>
                                        <h3><small><del
                                                    class="text-muted">$<?php echo e(number_format($product->price, 2)); ?></del></small>
                                            $<?php echo e(number_format($after_discount, 2)); ?> </h3>
                                        <div class="quickview-peragraph">
                                            <p><?php echo html_entity_decode($product->summary); ?></p>
                                        </div>
                                        <?php if($product->size): ?>
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Beden</h5>
                                                        <select>
                                                            <?php
                                                                $sizes = explode(',', $product->size);
                                                                // dd($sizes);
                                                            ?>
                                                            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option><?php echo e($size); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('single-add-to-cart')); ?>" method="POST" class="mt-4">
                                            <?php echo csrf_field(); ?>
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" name="slug" value="<?php echo e($product->slug); ?>">
                                                    <input type="text" name="quant[1]" class="input-number"
                                                        data-min="1" data-max="1000" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <div class="add-to-cart">
                                                <button type="submit" class="btn">Sepete Ekle</button>
                                                <a href="<?php echo e(route('add-to-wishlist', $product->slug)); ?>"
                                                    class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                        <div class="default-social">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- Modal end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
            background: #000000;
            color: black;
        }

        #Gslider .carousel-inner {
            height: 550px;
        }

        #Gslider .carousel-inner img {
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
            bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
            font-size: 50px;
            font-weight: bold;
            line-height: 100%;
            /* color: #F7941D; */
            color: #1e1e1e;
        }

        #Gslider .carousel-inner .carousel-caption p {
            font-size: 18px;
            color: black;
            margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
            bottom: 70px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        /*==================================================================
                [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function() {
            $filter.on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({
                    filter: filterValue
                });
            });

        });

        // init Isotope
        $(window).on('load', function() {
            var $grid = $topeContainer.each(function() {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine: 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function() {
            $(this).on('click', function() {
                for (var i = 0; i < isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
        function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
                .exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
                .msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Ecommerce-Laravel\Ecommerce-Laravel\resources\views/frontend/index.blade.php ENDPATH**/ ?>