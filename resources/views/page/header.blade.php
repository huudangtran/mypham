

@section('header')
<!-- HEADER -->
	<header>
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{route('home')}}">
							<img src="{{asset('public/images/logo.jpg')}}" alt="" >
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="{{route('timkiem')}}" method="get">
							<input class="input search-input full-width" type="text" name='key' placeholder="Enter your keyword" autocomplete="key" autofocus>
							<select class="input search-categories">
								<option value="0">Tìm theo</option>
								<option value="1">Mỹ phầm</option>
								<option value="1">Loại mỹ phẩm</option>
								<option value="1">Thương hiệu</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
						
						@guest
								<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
									<div class="header-btns-icon">
										<i class="fa fa-user-o"></i>
									</div>
									<strong class="text-uppercase">My account <i class="fa fa-caret-down"></i></strong>
								</div>
							<a href="{{route('dangnhap')}}" class="text-uppercase">Login</a> /@if(Route::has('dangky')) <a href="{{route('dangky')}}" class="text-uppercase">Join</a>@endif
							@else
								@if(Auth::user()->privilege == "admin")
								<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
									<div class="header-btns-icon">
										<i class="fa fa-user-o"></i>
									</div>
									<strong class="text-uppercase">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></strong>
								</div>
								
								<a href="{{asset('dangxuat')}}" class="text-uppercase">Đăng Xuất</a> / <a href="{{route('thongtindonhang')}}" class="text-uppercase">Đơn hàng</a>
								
										<ul class="custom-menu">
											<li><a href="{{route('admin')}}"><i class="fa fa-user-o"></i> Quản lý web</a></li>
											
										</ul>
								@else
									<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
										<div class="header-btns-icon">
											<i class="fa fa-user-o"></i>
										</div>
										<strong class="text-uppercase">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></strong>
									</div>
								
								<a href="{{asset('dangxuat')}}" class="text-uppercase">Đăng Xuất</a>
								
										<ul class="custom-menu">
											<li><a href="{{route('taikhoan')}}"><i class="fa fa-user-o"></i> Tài khoản</a></li>
											<li><a href="{{route('donhang')}}"><i class="fa fa-shopping-cart"></i> Xem đơn hàng</a></li>
										</ul>								
								@endif
							@endguest
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
						@if(Session::has('cart'))							
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							@foreach($product_cart as $mypham)
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">
									@if(Session::has('cart'))
										{{Session('cart')->totalQty}}
									@else
										Trống
									@endif
									</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span class="product-price">{{number_format(Session('cart')->totalPrice)}}đ</span>
								@break
								@endforeach
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
								@foreach($product_cart as $mypham)
									<div class="shopping-cart-list">
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{asset('public/upload/images/'.$mypham['item']['hinhanh'])}}" alt="">
											</div>
											<div class="product-body">
											
												<h3 class="product-price">
												@if($mypham['item']['giagiam']!=0)
													{{number_format($mypham['item']['giagiam'])}}đ
												@else
													{{number_format($mypham['item']['dongia'])}}đ
												@endif
													<span class="qty">x{{$mypham['qty']}}</span>
												</h3>
												<h2 class="product-name"><a href="#">{{$mypham['item']['tenmypham']}}</a></h2>
											</div>
											<button class="cancel-btn"><a href="{{route('xoagiohang',$mypham['item']['id'])}}"><i class="fa fa-trash"></i></a></button>
										</div>
									</div>
									@endforeach
									<div class="shopping-cart-btns">
										<a href="{{route('xemgiohang')}}"><button class="main-btn">Xem giỏ hàng</button></a>
										<a href="{{route('dathang')}}"><button class="primary-btn">Đặt hàng <i class="fa fa-arrow-circle-right"></i></button></a>
									</div>
								</div>
							</div>
							@else
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">									
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								Trống
								<span class="product-price"></span>
							</a>
						@endif
						</li>
						<!-- /Cart -->
						
						
						
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
@endsection
