@extends('page.master')
@extends('page.header')
@extends('page.navigation')
@extends('page.footer')


@section('css')
		<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
@endsection
@section('noidung')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
			@foreach($loaimypham as $value)
				@foreach($mp_theoloai as $mptl)
					@if($value->id==$mptl->loaimypham_id)
						<li><a href="{{route('home')}}">Home</a></li>
						<li class="active">{{$value->tenloaimypham}}</li>
					@endif
					@break
				@endforeach
			@endforeach
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				
				<div id="aside" class="col-md-3">
					
					<!-- aside widget -->
					<!--<div class="aside">
						<h3 class="aside-title">Shop by:</h3>
						<ul class="filter-list">
							<li><span class="text-uppercase">color:</span></li>
							<li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
							<li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
							<li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
							<li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Size:</span></li>
							<li><a href="#">X</a></li>
							<li><a href="#">XL</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Price:</span></li>
							<li><a href="#">MIN: $20.00</a></li>
							<li><a href="#">MAX: $120.00</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Gender:</span></li>
							<li><a href="#">Men</a></li>
						</ul>

						<button class="primary-btn">Clear All</button>
					</div>-->
					<!-- /aside widget -->

					<!-- aside widget -->
					<!--<div class="aside">
						<h3 class="aside-title">Filter by Price</h3>
						<div id="price-slider"></div>
					</div>
					<!-- aside widget -->

					<!-- aside widget -->
					<!--<div class="aside">
						<h3 class="aside-title">Filter By Color:</h3>
						<ul class="color-option">
							<li><a href="#" style="background-color:#475984;"></a></li>
							<li><a href="#" style="background-color:#8A2454;"></a></li>
							<li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
							<li><a href="#" style="background-color:#9A54D8;"></a></li>
							<li><a href="#" style="background-color:#675F52;"></a></li>
							<li><a href="#" style="background-color:#050505;"></a></li>
							<li><a href="#" style="background-color:#D5B47B;"></a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<!--<div class="aside">
						<h3 class="aside-title">Filter By Size:</h3>
						<ul class="size-option">
							<li class="active"><a href="#">S</a></li>
							<li class="active"><a href="#">XL</a></li>
							<li><a href="#">SL</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<!--<div class="aside">
						<h3 class="aside-title">Filter by Brand</h3>
						<ul class="list-links">
							<li><a href="#">Nike</a></li>
							<li><a href="#">Adidas</a></li>
							<li><a href="#">Polo</a></li>
							<li><a href="#">Lacost</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<!--<div class="aside">
						<h3 class="aside-title">Filter by Gender</h3>
						<ul class="list-links">
							<li class="active"><a href="#">Men</a></li>
							<li><a href="#">Women</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Sản phẩm khuyến mãi</h3>
						<!-- widget product -->
						@foreach($myphamkp as $mpkp)
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="{{asset('public/upload/images/'.$mpkp->hinhanh)}}"" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="{{route('chitietmypham',$mpkp->id)}}">{{$mpkp->tenmypham}}</a></h2>
								<h3 class="product-price">{{number_format($mpkp->giagiam)}}đ <del class="product-old-price">{{number_format($mpkp->dongia)}}đ</del></h3>
								<!--<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>-->
							</div>
						</div>
						@endforeach
						<!-- /widget product -->

						<!-- widget product -->
						
						<!-- /widget product -->
					</div>
					<!-- /aside widget -->
					<div class="aside">
						<h3 class="aside-title">Sản phẩm mới</h3>
						<!-- widget product -->
						@foreach($myphammoi as $mpkp)
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="{{asset('public/upload/images/'.$mpkp->hinhanh)}}"" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="{{route('chitietmypham',$mpkp->id)}}">{{$mpkp->tenmypham}}</a></h2>
								<h3 class="product-price">{{number_format($mpkp->dongia)}}đ</h3>
								<!--<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>-->
							</div>
						</div>
						@endforeach
						<!-- /widget product -->

						<!-- widget product -->
						
						<!-- /widget product -->
					</div>
				
				</div>
				
				<!-- /ASIDE -->
				

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<!--<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>-->
								<li>{{$mp_theoloai->links()}}</li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							<div class="clearfix visible-md visible-lg"></div>
							<div class="clearfix visible-sm visible-xs"></div>
							<div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>
							@foreach($mp_theoloai as $value)
							<!-- Product Single -->
							
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										@if($value->sanphammoi==1)
											<div class="product-label">
												<span class="sale">NEW</span>
											</div>
										@else
											@if($value->giagiam!=0)
												<div class="product-label">
													<span class="sale">-{{number_format(100-($value->giagiam/$value->dongia)*100)}}%</span>
												</div>
											@endif
										@endif
										<button class="main-btn quick-view"><a href="{{route('chitietmypham',$value->id)}}"><i class="fa fa-search-plus"></i> Xem chi tiết</a></button>
										<img src="{{asset('public/upload/images/'.$value->hinhanh)}}" alt="">
									</div>
									<div class="product-body">
										@if($value->giagiam!=0)
											<h3 class="product-price">{{number_format($value->giagiam)}}đ <del class="product-old-price">{{number_format($value->dongia)}}đ</del></h3>
										@else
											<h3 class="product-price">{{number_format($value->dongia)}}đ</h3>
										@endif
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#">{{$value->tenmypham}}</a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<button class="primary-btn add-to-cart"><a href="{{route('themvaogiohang',$value->id)}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></button>
										</div>
									</div>
								</div>
							</div>
							
							@endforeach
							<div class="clearfix visible-md visible-lg"></div>
							<div class="clearfix visible-sm visible-xs"></div>
							<div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>
							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">{{$mp_theoloai->links()}}</li>
								
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection


