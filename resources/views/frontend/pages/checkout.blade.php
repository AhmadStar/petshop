@extends('frontend.layouts.master')
@section('title','PettyShop')

@section('main-content')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Anasayfa<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Ödeme</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" action="{{ route('cart.order') }}">
                @csrf
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Alışverişini Tamamla</h2>
                            <p>Sadece son birkaç adım kaldı!</p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Ad <span>*</span></label>
                                        <input type="text" name="first_name" placeholder=""
                                            value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Soyad <span>*</span></label>
                                        <input type="text" name="last_name" placeholder="" value="{{ old('last_name') }}"
                                            required>
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>E-posta Adresi <span>*</span></label>
                                        <input type="email" name="email" placeholder="" value="{{ old('email') }}"
                                            required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Telefon Numarası <span>*</span></label>
                                        <input type="number" name="phone" placeholder="" value="{{ old('phone') }}"
                                            required>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Country<span>*</span></label>
                                        <select name="country" id="country" required>
                                            <option value="TR">Türkiye</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Adres<span>*</span></label>
                                        <input type="text" name="address1" placeholder=""
                                            value="{{ old('address1') }}">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Detaylı Adres</label>
                                        <input type="text" name="address2" placeholder=""
                                            value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Posta Kodu</label>
                                        <input type="text" name="post_code" placeholder=""
                                            value="{{ old('post_code') }}">
                                        @error('post_code')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <div class="single-widget">
                                <h2>SİPARİŞ ÖZETİ</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Ürünler
                                            Toplam<span>{{ number_format(Helper::totalCartPrice(), 2) }}TL</span></li>
                                        <li class="shipping">
                                            Kargo Ücreti
                                            @if (count(Helper::shipping()) > 0 && Helper::cartCount() > 0)
                                                <select name="shipping" class="nice-select" required>
                                                    <option value="">Adres Seçin</option>
                                                    @foreach (Helper::shipping() as $shipping)
                                                        <option value="{{ $shipping->id }}" class="shippingOption"
                                                            data-price="{{ $shipping->price }}">{{ $shipping->type }}:
                                                            {{ $shipping->price }}TL</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <span>Ücretsiz</span>
                                            @endif
                                        </li>

                                        @if (session('coupon'))
                                            <li class="coupon_price" data-price="{{ session('coupon')['value'] }}">Kazanç
                                                <span>{{ number_format(session('coupon')['value'], 2) }}TL</span></li>
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session('coupon')) {
                                                $total_amount = $total_amount - session('coupon')['value'];
                                            }
                                        @endphp
                                        @if (session('coupon'))
                                            <li class="last" id="order_total_price">
                                                Toplam<span>{{ number_format($total_amount, 2) }}TL</span></li>
                                        @else
                                            <li class="last" id="order_total_price">
                                                Toplam<span>{{ number_format($total_amount, 2) }}TL</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="single-widget">
                                <h2>Ödeme Yöntemleri</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Ödemeleri Kontrol Et</label> --}}
                                        <form-group>
                                            <input name="payment_method" type="radio" value="cod" required> <label>
                                                Kapıda Ödeme</label><br>
                                            <input name="payment_method" type="radio" value="cardpay" required> <label>
                                                Kartla Ödeme</label><br>
                                            <div id="creditCardDetails" style="display: none;">
                                                <label for="cardNumber">Kart Numarası:</label>
                                                <input type="text" id="cardNumber" name="card_number"
                                                    maxlength="16"><br>

                                                <label for="cardName">Ad Soyad:</label>
                                                <input type="text" id="cardName" name="card_name"><br>

                                                <label for="expirationDate">Geçerlilik Tarihi:</label>
                                                <input type="text" id="expirationDate" name="expiration_date"
                                                    maxlength="5"><br>

                                                <label for="cvv">CVV:</label>
                                                <input type="text" id="cvv" name="cvv" maxlength="3"><br>
                                            </div>
                                        </form-group>
                                    </div>
                                </div>

                            </div>
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{ 'backend/img/payment-method.png' }}" alt="#">
                                </div>
                            </div>
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn">ÖDEME YAP</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
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

@endsection
@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        function showMe(box) {
            var checkbox = document.getElementById('shipping').style.display;
            var vis = 'none';
            if (checkbox == "none") {
                vis = 'block';
            }
            if (checkbox == "block") {
                vis = "none";
            }
            document.getElementById(box).style.display = vis;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="payment_method"]').change(function() {
                if ($(this).val() === 'cardpay') {
                    $('#creditCardDetails').show();
                } else {
                    $('#creditCardDetails').hide();
                }
            });
        });
    </script>
@endpush
