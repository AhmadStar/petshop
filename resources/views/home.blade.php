@extends('layouts.app')
@section('title','PettyShop')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kontrol Paneli') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Giriş yaptınız!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
