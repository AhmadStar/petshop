@extends('backend.layouts.master')
@section('title','PettyShop')
@section('main-content')

<div class="card">
    <h5 class="card-header">Ürünleri Düzenle</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.update',$product->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Başlık gir"  value="{{$product->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Özet <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{$product->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Açıklama</label>
          <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>



        <div class="form-group">
          <label for="cat_id">Kategori <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Kategori Seç--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}' {{(($product->cat_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>
        @php
          $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->get();
        // dd($sub_cat_info);

        @endphp
        {{-- {{$product->child_cat_id}} --}}
        <div class="form-group {{(($product->child_cat_id)? '' : 'd-none')}}" id="child_cat_div">
          <label for="child_cat_id">Alt Kategori</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Alt Kategori Seç--</option>

          </select>
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">Fiyat <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Fiyat girin"  value="{{$product->price}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="stock">Adet <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Adet girin"  value="{{$product->stock}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Fotoğraf <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                  <i class="fas fa-image"></i> Seç
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Statü <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($product->status=='active')? 'selected' : '')}}>Aktif</option>
            <option value="inactive" {{(($product->status=='inactive')? 'selected' : '')}}>Inaktif</option>
        </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Güncelle</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Kısa açıklama yazın.....",
        tabsize: 2,
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Kısa açıklama yazın.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  var  child_cat_id='{{$product->child_cat_id}}';
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Select any one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
                            }
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
            else{

            }

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
@endpush
