@section('title','PettyShop')

@extends('backend.layouts.master')

@section('main-content')
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Sipariş Listesi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders)>0)
        <table class="table table-bordered table-hover" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Sipariş No.</th>
              <th>Ad</th>
              <th>Email</th>
              <th>Miktar</th>
              <th>Toplam</th>
              <th>Statü</th>
              <th>Hareket Durumu</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            @php
                $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
            @endphp
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{number_format($order->sub_total,2)}}TL</td>
                    @php
                        // dd($order);
                    @endphp
                    <td>
                        @if($order->status=='new')
                          <span class="badge badge-primary">YENİ</span>
                        @elseif($order->status=='process')
                          <span class="badge badge-warning">DEVAM EDİYOR</span>
                        @elseif($order->status=='delivered')
                          <span class="badge badge-success">TESLİM EDİLMİŞ</span>
                        @else
                          <span class="badge badge-danger">{{$order->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('order.show',$order->id)}}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="görüntüle" data-placement="bottom"><i class="fas fa-eye"></i></a>
                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="düzenle" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="sil"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$orders->links()}}</span>
        @else
          <h6 class="text-center">Sipariş Bulunamadı!!!</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8]
                }
            ]
        } );


        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              e.preventDefault();
              swal({
                    title: "Emin misin?",
                    text: "Bir kez silindiğinde bu verileri kurtaramazsınız!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Verileriniz güvende!");
                    }
                });
          })
      })
  </script>
@endpush
