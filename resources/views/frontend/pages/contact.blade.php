@extends('frontend.layouts.master')
@section('title','PettyShop')

@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Ana Sayfa<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">İletişim</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                @php
                                    $settings = DB::table('settings')->get();
                                @endphp
                                <h4>İletişim</h4>
                            <h3>Bize mesaj yazın @auth @else<span style="font-size:12px;" class="text-danger">[Önce
                                    giriş yapmalısınız]</span>@endauth
                            </h3>
                        </div>
                        <form class="form-contact form contact_form" method="post"
                            action="{{ route('contact.store') }}" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Adınız<span>*</span></label>
                                        <input name="name" id="name" type="text" placeholder="Adınızı girin">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Konu<span>*</span></label>
                                        <input name="subject" type="text" id="subject" placeholder="Konu girin">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>E-posta Adresiniz<span>*</span></label>
                                        <input name="email" type="email" id="email"
                                            placeholder="E-posta adresinizi girin">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Telefon Numaranız<span>*</span></label>
                                        <input id="phone" name="phone" type="number"
                                            placeholder="Telefon numaranızı girin">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Mesajınız<span>*</span></label>
                                        <textarea name="message" id="message" cols="30" rows="9" placeholder="Mesajınızı yazın"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Mesajı Gönder</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-head">
                        <div class="single-info">
                            <i class="fa fa-phone"></i>
                            <h4 class="title">Bizi Arayın:</h4>
                            <ul>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-envelope-open"></i>
                            <h4 class="title">E-posta:</h4>
                            <ul>
                                <li><a href="mailto:info@yourwebsite.com">
                                        @foreach ($settings as $data)
                                            {{ $data->email }}
                                        @endforeach
                                    </a></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-location-arrow"></i>
                            <h4 class="title">Adresimiz:</h4>
                            <ul>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->address }}
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-success">Teşekkürler!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success">Mesajınız başarıyla gönderildi!</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-warning">Üzgünüz!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-warning">Bir şeyler yanlış gitti.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .modal-dialog .modal-content .modal-header {
        position: initial;
        padding: 10px 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .modal-dialog .modal-content .modal-body {
        height: 100px;
        padding: 10px 20px;
    }

    .modal-dialog .modal-content {
        width: 50%;
        border-radius: 0;
        margin: auto;
    }
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
