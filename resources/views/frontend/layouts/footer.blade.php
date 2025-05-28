<footer class="footer">
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="/">
                                <img src="http://127.0.0.1:8000/frontend/img/logo-2.webp" style="max-width: 200px" alt="#">
                            </a>
                        </div>
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <p class="text">
                            @foreach ($settings as $data)
                                {{ $data->short_des }}
                            @endforeach
                        </p>
                        <p class="call">Sorunuz mu var? 7/24 arayabilirsiniz.<span><a href="tel:+905380662698">
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </a></span></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <div class="single-footer links">
                        <h4>Bilgiler</h4>
                        <ul>
                        <li><a href="{{ route('contact') }}">Hakkımızda</a></li>
                            <p style="color: #fff">Kullanım Koşulları</p>
                            <li><a href="{{ route('contact') }}">İletişim</a></li>
                            <p style="color: #fff">Yardım</p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <div class="single-footer links">
                        <h4>Politikalarımız</h4>
                        <ul>
                        <p style="color: #fff">Ödeme Yöntemleri</p>
                        <p style="color: #fff">Para İade Garantisi</p>
                        <p style="color: #fff">İade&Değişim</p>
                        <p style="color: #fff">Kargo&Teslimat</p>
                        <p style="color: #fff">Gizlilik Politikası</p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer social">
                        <h4>İletişim Bilgileri</h4>
                        <div class="contact">
                            <p style="color: #fff">
                                Herhangi bir sorunuz varsa, lütfen bizimle iletişime geçin;
                            </p>
                            <a href="mailto:210911090@stu.istinye.edu.tr"style="color: #fff;">210911090@stu.istinye.edu.tr</a>  <a href="mailto:210701053@stu.istinye.edu.tr"style="color: #fff;">210701053@stu.istinye.edu.tr</a>>
                            <ul>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->address }}
                                    @endforeach
                                </li>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->email }}
                                    @endforeach
                                </li>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="sharethis-inline-follow-buttons"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row center-footer-logo">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>© {{ date('Y') }} Yaman Senkeri ve Mehmet Emre Bingöl tarafından geliştirildi. Tüm hakları saklıdır.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img class="university-logo" src="{{ asset('frontend/img/university.webp') }}"
                                alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/colors.js') }}"></script>
<script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
<script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/nicesellect.js') }}"></script>
<script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
<script src="{{ asset('frontend/js/scrollup.js') }}"></script>
<script src="{{ asset('frontend/js/onepage-nav.min.js') }}"></script>
{{-- Isotope --}}
<script src="{{ asset('frontend/js/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/easing.js') }}"></script>
<script src="{{ asset('frontend/js/active.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>


@stack('scripts')
<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 5000);
    $(function() {
        $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
            event.preventDefault();
            event.stopPropagation();

            $(this).siblings().toggleClass("show");


            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

        });
    });
</script>
