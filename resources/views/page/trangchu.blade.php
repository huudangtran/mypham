@extends('page.master')
@extends('page.header')
@extends('page.footer')
@extends('page.navigation')
@extends('page.home')


@section('noidung')
	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="public/images/left_img_w.png" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color"></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="public/images/left_img.png" alt="" >
						<div class="banner-caption text-center">
							<h5 class="white-color"></h5>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1" href="#">
						<img src="public/images/center_img_for.png" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color"></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm khuyến mãi</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="public/shop/img/banner14.jpg" alt="">
						<!--<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>-->
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							@foreach($myphamkp as $mpkp)
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span class="sale">-{{number_format(100-($mpkp->giagiam/$mpkp->dongia)*100)}}%</span>
									</div>
									<!--<ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul>-->
									<button class="main-btn quick-view"><a href="{{route('chitietmypham',$mpkp->id)}}"><i class="fa fa-search-plus"></i> Xem chi tiết</a></button>
									<img src="{{asset('public/upload/images/'.$mpkp->hinhanh)}}" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">{{number_format($mpkp->giagiam)}}đ <del class="product-old-price">{{number_format($mpkp->dongia)}}đ</del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h5 class="product-name"><a href="{{route('chitietmypham',$mpkp->id)}}">{{$mpkp->tenmypham}}</a></h5>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><a href="{{route('themvaogiohang',$mpkp->id)}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></button>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm mới</h2>						
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($myphammoi as $valua)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button class="main-btn quick-view"><a href="{{route('chitietmypham',$valua->id)}}"><i class="fa fa-search-plus"></i> Xem chi tiết</a></button>
							<img src="{{asset('public/upload/images/'.$valua->hinhanh)}}" alt="" >
						</div>
						<div class="product-body">
						
							<h3 class="product-price">{{number_format($valua->dongia)}}đ</h3>
							<!--<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>-->
							<h3 class="product-name"><a href="{{route('chitietmypham',$valua->id)}}">{{$valua->tenmypham}}</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><a href="{{route('themvaogiohang',$valua->id)}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></button>
							</div>
							
						</div>
					</div>
				</div>
				@endforeach
								
			</div>
			<!-- /row -->

			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->	 
	
	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-12">
					<div class="banner banner-1">
						<img src="public/images/banner-min.jpg" alt="">
						<div class="banner-caption text-center">
							
						</div>
					</div>
				</div>
				<!-- /banner -->		
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
		
	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-12">
					<div class="banner banner-1">
						<img src="public/images/store-2.png" alt="">
						<div class="banner-caption text-center">
							
						</div>
					</div>
				</div>
				<!-- /banner -->		
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
		<!-- /section -->
	
	  	
@endsection

