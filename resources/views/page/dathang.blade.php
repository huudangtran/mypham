@extends('page.master')

@extends('page.footer')

@section('css')
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<script type="text/javascript" >
	
	</script>
@endsection
@section('noidung')
		<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Checkout</li>
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
				<form id="checkout-form" class="clearfix" action="{{route('dathang')}}" method="post">
				@csrf
					<div class="col-md-6">
						<div class="billing-details">
							
							<div class="section-title">
								<h3 class="title">Thông tin khách hàng</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Họ tên">
								@error('name')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
							<div class="form-group">
								<div class="form-check form-check-inline">
								  <label>Giới tính: </label>
								  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="nam" checked="checked">
								  <label class="form-check-label" for="inlineRadio1">Nam</label>
								  
								  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="nữ">
								  <label class="form-check-label" for="inlineRadio2">Nữ</label>
								</div>								
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
								@error('email')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Địa chỉ">
								@error('address')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Điện thoại">
								@error('phone')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
							<div class="form-group">
								<textarea class="form-control"  name="note" placeholder="Ghi chú nếu có"></textarea>
							</div>
							<!--<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Create Account?</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
											<p>
												<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>-->
						</div>
					</div>

					<div class="col-md-6">
						@if(Session::has('cart'))
							
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Hình thức vận chuyển</h4>
							</div>
							@if(Session('cart')->totalPrice > 500000)
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" value="free ship" checked>
								<label for="shipping-1">Free Ship</label>
								<div class="caption">
									<p>Đối với đơn hàng từ 500.000 ngàn trở lên cửa hàng hỗ trợ phí ship mọi miền tổ quốc.
										<p>
								</div>
							</div>
							@else
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2" value="Hỗ trợ ship" checked>
								<label for="shipping-2">Hỗ trợ ship</label>
								<div class="caption">
									<p>&nbsp;&nbsp;&nbsp;&nbsp;Đối với đơn hàng từ 300.000đ đến dưới 500.000đ thì sẽ chịu một phí ship là 20.000đ<p>
									<p>&nbsp;&nbsp;&nbsp;&nbsp;Đối với đơn hàng dưới 300.000đ thì sẽ chịu một phí ship là 40.000đ<p>
								</div>
							</div>
							@endif
							
						</div>
						
						@endif
						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Phương thức thanh toán</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked value="Thanh toán khi nhận hàng">
								<label for="payments-1">Thanh toán khi nhận hàng</label>
								<div class="caption">
									<p>
										&nbsp;&nbsp;&nbsp;&nbsp;Khách hàng nhận hàng và kiểm tra đúng sản phẩm đặt hàng, rồi thanh toán.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2" value="Chuyển khoảng trực tiếp">
								<label for="payments-2">Chuyển khoảng trực tiếp</label>
								<div class="caption">
										<p>&nbsp;&nbsp;&nbsp;&nbsp;Số tài khoản: 0151001234567</p>
										<p>&nbsp;&nbsp;&nbsp;&nbsp;Tên: Phan Thị Khánh Huyền</p>
										<p>  &nbsp;&nbsp;&nbsp;&nbsp;Cấp: Tại vietcombank Long Xuyên, An Giang
										<p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Thông tin đặt hàng</h3>
							</div>
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
								@if(Session::has('cart'))
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
										<td class="qty text-center"><input class="input" type="number" value="{{$mypham['qty']}}" onchange="updateCart(this.value,'{{$mypham['item']['id']}}')"></td>
										
										<td class="total text-center"><strong class="primary-color">{{number_format( (($mypham['price'])*($mypham['qty']))/$mypham['qty'] )}}đ</strong></td>
										
										<td class="text-right">

											<button class="cancel-btn">
												<a href="{{route('xoagiohang1',$mypham['item']['id'])}}"><i class="fa fa-trash"></i></a>
											</button>
										</td>
										
										
										</br>				
									</tr>
									
									@endforeach
									<a href="{{route('xemgiohang')}}" type="button" class="primary-btn">Chỉnh sửa giỏ hàng</a>
								</tbody>
								<tfoot>
								@foreach($product_cart as $mypham)
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Tổng tiền sản phẩm</th>
										<th colspan="2" class="sub-total">{{number_format(Session('cart')->totalPrice)}}đ</th>
									</tr>
									@if(Session('cart')->totalPrice >=500000)
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Vận chuyển</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Tổng tiền</th>
										
											<th colspan="2" class="total">{{number_format(Session('cart')->totalPrice)}}đ</th>
										
									</tr>
									@else
										<tr>
										<th class="empty" colspan="3"></th>
										<th>Vận chuyển</th>
										@if(Session('cart')->totalPrice > 500000)
											<td colspan="2">Free ship</td>
										@else
											<td colspan="2">Hỗ trợ ship</td>
										@endif
									</tr>
									<tr>
										@if((Session('cart')->totalPrice > 300000)&&(Session('cart')->totalPrice < 500000))
										<th class="empty" colspan="3"></th>
										<th>Tổng tiền</th>										
											<th colspan="2" class="total">{{number_format(Session('cart')->totalPrice + 20000)}}đ</th>										
										@else
											
										<th class="empty" colspan="3"></th>
										<th>Tổng tiền</th>										
											<th colspan="2" class="total">{{number_format(Session('cart')->totalPrice + 40000)}}đ</th>										
										
										@endif

									</tr>
									@endif
									@break
								@endforeach
								</tfoot>
								@endif
							</table>
							<div class="pull-right">
								<button class="primary-btn" type="submit">Đặt hàng</button>
							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	

@endsection
