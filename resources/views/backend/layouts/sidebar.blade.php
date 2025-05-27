<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
  <img src="" alt="">
  <div class="sidebar-brand-text mx-3">Yönetici</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
  <a class="nav-link" href="{{route('admin')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Gösterge Paneli</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Banner
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-image"></i>
    <span>Bannerlar</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Banner Seçenekleri:</h6>
      <a class="collapse-item" href="{{route('banner.index')}}">Bannerlar</a>
      <a class="collapse-item" href="{{route('banner.create')}}">Banner Ekle</a>
    </div>
  </div>
</li>
    <hr class="sidebar-divider">
<div class="sidebar-heading">
    Mağaza
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
      <i class="fas fa-sitemap"></i>
      <span>Kategoriler</span>
    </a>
    <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kategori Seçenekleri:</h6>
        <a class="collapse-item" href="{{route('category.index')}}">Kategoriler</a>
        <a class="collapse-item" href="{{route('category.create')}}">Kategori Ekle</a>
      </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
      <i class="fas fa-cubes"></i>
      <span>Ürünler</span>
    </a>
    <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Ürün Seçenekleri:</h6>
        <a class="collapse-item" href="{{route('product.index')}}">Ürünler</a>
        <a class="collapse-item" href="{{route('product.create')}}">Ürün Ekle</a>
      </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
      <i class="fas fa-table"></i>
      <span>Markalar</span>
    </a>
    <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Marka Seçenekleri:</h6>
        <a class="collapse-item" href="{{route('brand.index')}}">Markalar</a>
        <a class="collapse-item" href="{{route('brand.create')}}">Marka Ekle</a>
      </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">
      <i class="fas fa-truck"></i>
      <span>Kargo</span>
    </a>
    <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kargo Seçenekleri:</h6>
        <a class="collapse-item" href="{{route('shipping.index')}}">Kargolar</a>
        <a class="collapse-item" href="{{route('shipping.create')}}">Kargo Ekle</a>
      </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('order.index')}}">
        <i class="fas fa-cart-plus"></i>
        <span>Siparişler</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('review.index')}}">
        <i class="fas fa-comments"></i>
        <span>Yorumlar</span></a>
</li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
    Genel Ayarlar
</div>
<!-- Kullanıcılar -->
<li class="nav-item">
    <a class="nav-link" href="{{route('users.index')}}">
        <i class="fas fa-users"></i>
        <span>Kullanıcılar</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('settings')}}">
        <i class="fas fa-cog"></i>
        <span>Ayarlar</span></a>
</li>

    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
