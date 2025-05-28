@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{('home')}}">Ana Sayfa<i class="ti-arrow-right"></i></a></li>
<li class="active"><a href="">Sepet</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>ÜRÜN</th>
<th>AD</th>
<th class="text-center">BİRİM FİYAT</th>
<th class="text-center">ADET</th>
<th class="text-center">TOPLAM</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr>
											@php
											$photo=explode(',',$cart->product['photo']);
											@endphp
											<td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
											<td class="product-des" data-title="Description">
												<p class="product-name"><a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank">{{$cart->product['title']}}</a></p>
												<p class="product-des">{!!($cart['summary']) !!}</p>
											</td>
											<td class="price" data-title="Price"><span>${{number_format($cart['amount'],2)}}</span></td>
											<td class="qty" data-title="Qty">
												<div class="input-group">
													<div class="button minus">
														<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$key}}]">
															<i class="ti-minus"></i>
														</button>
													</div>
													<input type="text" name="quant[{{$key}}]" class="input-number"  data-min="1" data-max="100" value="{{$cart->quantity}}">
													<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
													<div class="button plus">
														<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$key}}]">
															<i class="ti-plus"></i>
														</button>
													</div>
												</div>
											</td>
											<td class="total-amount cart_single_price" data-title="Total"><span class="money">${{$cart['price']}}</span></td>

											<td class="action" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
									@endforeach
									<track>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="float-right">
                                            <button class="btn float-right" type="submit">Güncelle</button>
										</td>
									</track>
								@else
										<tr>
											<td class="text-center">
Sepetinizde ürün bulunmamaktadır. <a href="{{route('product-grids')}}" style="color:blue;">Alışverişe devam et</a>
											</td>
										</tr>
								@endif

							</form>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="total-amount">
    <div class="row">
        <div class="col-lg-8 col-md-5 col-12">
            <div class="left">
            </div>
        </div>
        <div class="col-lg-4 col-md-7 col-12">
            <div class="right">
                <ul>
                    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Ara Toplam<span>${{number_format(Helper::totalCartPrice(),2)}}</span></li>

                    @php
                        $total_amount=Helper::totalCartPrice();
                        if(session()->has('coupon')){
                            $total_amount=$total_amount-Session::get('coupon')['value'];
                        }
                    @endphp
                    @if(session()->has('coupon'))
                        <li class="last" id="order_total_price">Ödenecek Tutar<span>${{number_format($total_amount,2)}}</span></li>
                    @else
                        <li class="last" id="order_total_price">Ödenecek Tutar<span>${{number_format($total_amount,2)}}</span></li>
                    @endif
                </ul>
                <div class="button5">
                    <a href="{{route('checkout')}}" class="btn">Ödemeye Geç</a>
                    <a href="{{route('product-grids')}}" class="btn">Alışverişe Devam Et</a>
                </div>
            </div>
        </div>
    </div>
</div>

				</div>
			</div>
		</div>
	</div>
	<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Ücretsiz Kargo</h4>
                    <p>2000₺ üzeri siparişler</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Ücretsiz İade</h4>
                    <p>30 gün içinde iade</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Güvenli Ödeme</h4>
                    <p>%100 güvenli ödeme</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>En Uygun Fiyat</h4>
                    <p>Garantili fiyat</p>
                </div>
            </div>
        </div>
    </div>
</section>
	@include('frontend.layouts.newsletter')
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush
