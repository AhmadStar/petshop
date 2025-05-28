<!DOCTYPE html>
<html lang="en">

<head>

  @include('backend.layouts.head')

</head>

<body>

  <div class="container-fluid">

    <div class="row" style="margin-top:10%">
        <!-- 404 Hatası -->
      <div class="col-md-12">
        <div class="text-center">
          <div class="error mx-auto" data-text="404">404</div>
<p class="lead text-gray-800 mb-5">Sayfa Bulunamadı</p>
<p class="text-gray-500 mb-0">Bir hatayla karşılaşmış gibisiniz...</p>
<a href="{{route('home')}}">&larr; Ana Sayfaya Dön</a>
        </div>
      </div>
    </div>

    </div>


    @include('backend.layouts.footer')

</body>

</html>
