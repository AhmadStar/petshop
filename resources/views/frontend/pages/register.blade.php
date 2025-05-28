@extends('frontend.layouts.master')
@section('title','PettyShop')

@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Ana Sayfa<i class="ti-arrow-right"></i></a></li>
<li class="active"><a href="javascript:void(0);">Kayıt Ol</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Kayıt Ol</h2>
<form class="form" method="post" action="{{route('register.submit')}}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>Adınız Soyadınız<span>*</span></label>
                <input type="text" name="name" placeholder="" required="required" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>E-posta Adresiniz<span>*</span></label>
                <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Şifreniz<span>*</span></label>
                <input type="password" name="password" placeholder="" required="required">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Şifre Tekrar<span>*</span></label>
                <input type="password" name="password_confirmation" placeholder="" required="required">
                @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group login-btn">
                <button class="btn" type="submit">Kayıt Ol</button>
                <a href="{{route('login.form')}}" class="btn btn-google">Giriş Yap</a>
            </div>
        </div>
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>
@endpush
