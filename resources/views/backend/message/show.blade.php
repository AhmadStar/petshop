@extends('backend.layouts.master')
@section('title','PettyShop')
@section('main-content')
<div class="card">
  <h5 class="card-header">Mesaj</h5>
  <div class="card-body">
    @if($message)
        @if($message->photo)
        <img src="{{$message->photo}}" class="rounded-circle " style="margin-left:44%;">
        @else 
        <img src="{{asset('backend/img/avatar.png')}}" class="rounded-circle " style="margin-left:44%;">
        @endif
        <div class="py-4">Kimden: <br>
           Ad :{{$message->name}}<br>
           Email :{{$message->email}}<br>
           Telefon No. :{{$message->phone}}
        </div>
        <hr/>
  <h5 class="text-center" style="text-decoration:underline"><strong>Konu :</strong> {{$message->subject}}</h5>
        <p class="py-5">{{$message->message}}</p>

    @endif

  </div>
</div>
@endsection