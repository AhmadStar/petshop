@extends('backend.layouts.master')
@section('main-content')
@section('title','PettyShop')
<div class="card">
  <div class="row">
    <div class="col-md-12">
       @include('backend.layouts.notification')
    </div>
  </div>
  <h5 class="card-header">Mesaj</h5>
  <div class="card-body">
    @if(count($messages)>0)
    <table class="table message-table" id="message-dataTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Ad</th>
          <th scope="col">Konu</th>
          <th scope="col">Tarih</th>
          <th scope="col">Düzenle</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $messages as $message)

        <tr class="@if($message->read_at) border-left-success @else bg-light border-left-warning @endif">
          <td scope="row">{{$loop->index +1}}</td>
          <td>{{$message->name}} {{$message->read_at}}</td>
          <td>{{$message->subject}}</td>
          <td>{{$message->created_at->format('F d, Y h:i A')}}</td>
          <td>
            <a href="{{route('message.show',$message->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="görüntüle" data-placement="bottom"><i class="fas fa-eye"></i></a>
            <form method="POST" action="{{route('message.destroy',[$message->id])}}">
              @csrf 
              @method('delete')
                  <button class="btn btn-danger btn-sm dltBtn" data-id={{$message->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="sil"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
    <nav class="blog-pagination justify-content-center d-flex">
      {{$messages->links()}}
    </nav>
    @else
      <h2>Mesajlar Boş!</h2>
    @endif
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
      .zoom {
        transition: transform .2s;
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush
@push('scripts')
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#message-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[4]
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