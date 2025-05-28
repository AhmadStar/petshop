@extends('frontend.layouts.master')
@section('title','PettyShop')

@section('main-content')

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
            <div class="row center-footer-logo">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <h3><span>PettyShop</span>'a Hoş Geldiniz</h3>
                        <p>
                            @foreach ($settings as $data)
                                {{ $data->description }}
                            @endforeach
                        </p>
                        {{-- <div class="button">
                            <a href="{{ route('contact') }}" class="btn primary">İletişim</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <img src="https://media.istockphoto.com/id/1355290974/photo/dog-near-different-variation-of-goods-for-animals.jpg?s=612x612&w=0&k=20&c=mL_5zyUinqzo32fKV_0lb0ycD8NnvvlsKCBg51CbO2Q=" alt="">
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
                        <p>2000₺ üzeri siparişler</p>
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

    @include('frontend.layouts.newsletter')
@endsection
