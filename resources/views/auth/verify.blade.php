@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Adresini Onayla') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('E-posta adresinize yeni bir doğrulama bağlantısı gönderildi.') }}
                        </div>
                    @endif

                    {{ __('Devam etmeden önce lütfen doğrulama bağlantısı için e-postanızı kontrol edin.') }}
                    {{ __('Eğer mail gelmediyse;') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('yeni bir mail için tıklayınız') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
