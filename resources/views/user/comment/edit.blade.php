@extends('user.layouts.master')
@section('title','PettyShop')

@section('main-content')
<div class="card">
  <h5 class="card-header">Yorum Düzenleme</h5>
  <div class="card-body">
    <form action="{{route('user.post-comment.update',$comment->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Kimden:</label>
        <input type="text" disabled class="form-control" value="{{$comment->user_info->name}}">
      </div>
      <div class="form-group">
        <label for="comment">Yorum</label>
      <textarea name="comment" id="" cols="20" rows="10" class="form-control">{{$comment->comment}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Statü :</label>
        <select name="status" id="" class="form-control">
          <option value="">--Statü Seç--</option>
          <option value="active" {{(($comment->status=='active')? 'selected' : '')}}>Aktif</option>
          <option value="inactive" {{(($comment->status=='inactive')? 'selected' : '')}}>Inaktif</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
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