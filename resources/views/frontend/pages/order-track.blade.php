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
                        <li><a href="{{ route('home') }}">Anasayfa<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Sipariş Takibi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>Siparişinizi takip etmek için lütfen aşağıdaki kutuya Sipariş Numaranızı girin ve "Takip Et" butonuna tıklayın. Bu numara size fişinizde ve aldığınız onay e-postasında verilmiştir veya kullanıcı panelinizden sipariş numaranızı alabilirsiniz.</p>
            <form class="row tracking_form my-4" action="{{ route('product.track.order') }}" method="post" novalidate="novalidate">
                @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2" name="order_number" placeholder="Sipariş numaranızı girin">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Siparişi Takip Et</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
