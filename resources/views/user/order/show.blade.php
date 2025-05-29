@extends('user.layouts.master')
@section('title','PettyShop')

@section('main-content')
<div class="card">
<h5 class="card-header">Sipariş       <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i>PDF oluştur</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover table-hover">
      <thead>
        <tr>
            <th>#</th>
            <th>Sipariş No.</th>
            <th>Ad</th>
            <th>Email</th>
            <th>Adet</th>
            <th>Ücret</th>
            <th>Toplam</th>
            <th>Statü</th>
            <th>Düzenle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->shipping->price}}TL</td>
            <td>{{number_format($order->total_amount,2)}}TL</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">YENİ</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">İŞLEMDE</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">TESLİM EDİLDİ</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="sil"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">SİPARİŞ BİLGİLERİ</h4>
              <table class="table">
                    <tr class="">
                        <td>Sipariş Numarası</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Sipariş Tarihi</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Adet</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Sipariş Durumu</td>
                        <td> : Yeni</td>
                    </tr>
                    <tr>
                        <td>Toplam Ödeme</td>
                        <td> :  {{number_format($order->total_amount,2)}}TL</td>
                    </tr>
                    <tr>
                      <td>Ödeme Yöntemi</td>
                      <td> : 
                            @if($order->payment_method == 'cod')
                                Kapıda Ödeme
                            @elseif($order->payment_method == 'paypal')
                                Paypal
                            @elseif($order->payment_method == 'cardpay')
                                Kartla Ödeme
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Ödeme Durumu</td>
                        <td> : 
                          @if($order->payment_status == 'paid')
                              <span class="badge badge-success">Ödendi</span>
                          @elseif($order->payment_status == 'unpaid')
                              <span class="badge badge-danger">Ödenmedi</span>
                          @else
                              {{$order->payment_status}}
                          @endif
                      </td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">KARGO BİLGİLERİ</h4>
              <table class="table">
                    <tr class="">
                        <td>Ad Soyad</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Telefon Numarası</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Adres</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Ülke</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Posta Kodu</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
