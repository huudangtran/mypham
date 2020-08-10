@extends('page.master')

@extends('page.footer')

@section('css')
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<script type="text/javascript" >
	function updateCart(quantity_new,id){
		$.get(
		'{{asset('cart/update')}}'
		)
	}
	
	</script>
@endsection
@section('noidung')
		<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Xem giỏ hàng</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row text-center"><h3 class="text">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</h3></div>
			<div class="row">
				
				@csrf
					
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Thông tin giỏ hàng</h3>
							</div>
							@if(Session::has('cart'))
								<form action="{{ url('/view-cart/capnhat') }}" method="post">
								@csrf
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Sản phẩm</th>
										<th></th>
										<th class="text-center">Tiền</th>
										<th class="text-center">Số lượng</th>
										<th class="text-center">Thành tiền</th>										
										<th class="text-center"></th>
										
									</tr>
									
								</thead>
								<tbody>
								
									@foreach($product_cart as $mypham)								
									<tr>								
										<td class="thumb"><img src="{{asset('public/upload/images/'.$mypham['item']['hinhanh'])}}" alt=""></td>
										<td class="details">
											<a href="#">{{$mypham['item']['tenmypham']}}</a>
											<!--<ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul>-->
										</td>
										<td class="price text-center">
											@if($mypham['item']['giagiam']!=0)
											<strong>{{number_format($mypham['item']['giagiam'])}}đ</strong><br>
											<del class="font-weak"><small>{{number_format($mypham['item']['dongia'])}}đ</small>
											</del>
											@else
												<strong>{{number_format($mypham['item']['dongia'])}}đ</strong>
											@endif
										</td>
										<td class="qty text-center"><input class="input" type="number" name="so_luong_san_pham[{{ $mypham['item']['id']  }}]" min="1" max="10" value="{{$mypham['qty']}}" ></td>
										
										<td class="total text-center"><strong class="primary-color">{{number_format( (($mypham['price'])*($mypham['qty']))/$mypham['qty'] )}}đ</strong></td>
										
										<td class="text-right"><button class="cancel-btn"><a href="{{route('xoagiohang',$mypham['item']['id'])}}"><i class="fa fa-trash"></i></a></button></td>
										
										</br>				
									</tr>
									
									@endforeach
								<button type="submit" style="text-align: right;" class="btn btn-primary " style="text-decoration: none; font-weight: bold;">Cập Nhật Giỏ Hàng</button>
									
								
								</tbody>
								<tfoot>
								@foreach($product_cart as $mypham)
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Tổng tiền sản phẩm</th>
										<th colspan="2" class="sub-total">{{number_format(Session('cart')->totalPrice)}}đ</th>
									</tr>
									
				
									@break
								@endforeach
								</tfoot>
								@endif
							</table>
							</form>
							<div class="pull-right">
								<a href="{{route('dathang')}}"><button class="primary-btn">Đặt hàng <i class="fa fa-arrow-circle-right"></i></button></a>
							</div>
						</div>

					</div>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	

@endsection
