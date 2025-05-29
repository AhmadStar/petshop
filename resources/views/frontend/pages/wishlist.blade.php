@extends('frontend.layouts.master')
@section('title','PettyShop')
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ 'home' }}">Ana Sayfa<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Favori Listesi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>ÜRÜN</th>
                                <th>ÜRÜN ADI</th>
                                <th class="text-center">TUTAR</th>
                                <th class="text-center">SEPETE EKLE</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Helper::getAllProductFromWishlist())
                                @foreach (Helper::getAllProductFromWishlist() as $key => $wishlist)
                                    <tr>
                                        @php
                                            $photo = explode(',', $wishlist->product['photo']);
                                        @endphp
                                        <td class="image" data-title="No"><img src="{{ $photo[0] }}"
                                                alt="{{ $photo[0] }}"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a
                                                    href="{{ route('product-detail', $wishlist->product['slug']) }}">{{ $wishlist->product['title'] }}</a>
                                            </p>
                                            <p class="product-des">{!! $wishlist['summary'] !!}</p>
                                        </td>
                                        <td class="total-amount" data-title="Total"><span>${{ $wishlist['amount'] }}</span>
                                        </td>
                                        <td><a href="{{ route('add-to-cart', $wishlist->product['slug']) }}"
                                                class='btn text-white'>Sepete Ekle</a></td>
                                        <td class="action" data-title="Remove"><a
                                                href="{{ route('wishlist-delete', $wishlist->id) }}"><i
                                                    class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center">
                                        Favori listenizde ürün bulunmamaktadır. <a href="{{ route('product-grids') }}"
                                            style="color:blue;">Alışverişe devam et</a>
                                    </td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Ücretsiz Kargo</h4>
                        <p>Açılışa özel ücretsiz kargo</p>
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

    @include('frontend.layouts.newsletter')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="images/modal1.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal2.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal3.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal4.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Sepete Ekle</a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Paylaş:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush
