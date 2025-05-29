<header class="header shop">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="top-left">
                        <ul class="list-main">
                            @php
                                $settings = DB::table('settings')->get();

                            @endphp
                            <li><i class="ti-headphone-alt"></i>
                                @foreach ($settings as $data)
                                    {{ $data->phone }}
                                @endforeach
                            </li>
                            <li><i class="ti-email"></i>
                                @foreach ($settings as $data)
                                    {{ $data->email }}
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="right-content">
                        <ul class="list-main">
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <li><i class="fa fa-truck"></i> <a href="{{ route('order.track') }}">Sipariş Takibi</a>
                                    </li>
                                    <li><i class="ti-user"></i> <a href="{{ route('admin') }}" target="_blank">Yönetim
                                            Paneli</a></li>
                                @else
                                    <li><i class="fa fa-truck"></i> <a href="{{ route('order.track') }}">Sipariş Takibi</a>
                                    </li>
                                    <li><i class="ti-user"></i> <a href="{{ route('user') }}" target="_blank">Hesabım</a>
                                    </li>
                                @endif
                                <li><i class="ti-power-off"></i> <a href="{{ route('user.logout') }}">Çıkış Yap</a></li>
                            @else
                                <li><i class="fa fa-sign-in"></i><a href="{{ route('login.form') }}">Giriş Yap /</a> <a
                                        href="{{ route('register.form') }}">Kayıt Ol</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="logo">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <a href="{{ route('home') }}"><img
                                src="@foreach ($settings as $data) {{ $data->logo }} @endforeach" alt="logo"></a>
                    </div>
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Burada ara..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option>Tüm Kategoriler</option>
                                @foreach (Helper::getAllCategory() as $cat)
                                    <option>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{ route('product.search') }}">
                                @csrf
                                <input name="search" placeholder="Ürünleri burada ara..." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <div class="sinlge-bar shopping">
                            @php
                                $total_prod = 0;
                                $total_amount = 0;
                            @endphp
                            @auth
                                <div class="shopping-item">
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Toplam</span>
                                        </div>
                                        <a href="{{ route('cart') }}" class="btn animate">Sepet</a>
                                    </div>
                                </div>
                            @endauth
                        </div>

                        <div class="sinlge-bar shopping">
                            <a href="{{ route('cart') }}" class="single-icon"><i class="ti-bag"></i> <span
                                    class="total-count">{{ Helper::cartCount() }}</span></a>
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ count(Helper::getAllProductFromCart()) }} Ürün</span>
                                        <a href="{{ route('cart') }}">Sepeti Görüntüle</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                        @foreach (Helper::getAllProductFromCart() as $data)
                                            @php
                                                $photo = explode(',', $data->product['photo']);
                                            @endphp
                                            <li>
                                                <a href="{{ route('cart-delete', $data->id) }}" class="remove"
                                                    title="Remove this item"><i class="fa fa-remove"></i></a>
                                                <a class="cart-img" href="#"><img src="{{ $photo[0] }}"
                                                        alt="{{ $photo[0] }}"></a>
                                                <h4><a href="{{ route('product-detail', $data->product['slug']) }}"
                                                        target="_blank">{{ $data->product['title'] }}</a></h4>
                                                <p class="quantity">{{ $data->quantity }} x - <span
                                                        class="amount">TL{{ number_format($data->price, 2) }}</span></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Toplam</span>
                                            <span
                                                class="total-amount">{{ number_format(Helper::totalCartPrice(), 2) }}TL</span>
                                        </div>
                                        <a href="{{ route('checkout') }}" class="btn animate">Ödemeye Geç</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::path() == 'home' ? 'active' : '' }}"><a
                                                    href="{{ route('home') }}">Ana Sayfa</a></li>
                                            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}"><a
                                                    href="{{ route('about-us') }}">Hakkımızda</a></li>
                                            <li class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif"><a
                                                    href="{{ route('product-grids') }}">Ürünler</a></li>
                                            <li class="{{ Request::path() == 'contact' ? 'active' : '' }}"><a
                                                    href="{{ route('contact') }}">İletişim</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
