@extends('page.master')
@extends('page.header')
@extends('page.footer')
@extends('page.navigation')
@section('noidung')	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm tìm thấy</h2>
						<div class="">
							<h5 class="title">Tìm thấy {{count($timkiem_mypham)}} sản phẩm</h5>						
						</div>						
					</div>
					
				</div>
				<!-- section title -->

				<!-- Product Single -->
				
				@foreach($timkiem_mypham as $valua)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							@if($valua->sanphammoi==1)
								<div class="product-label">
										<span class="sale">NEW</span>
									</div>
							@else
								@if($valua->giagiam!=0)
									<div class="product-label">
										<span class="sale">-{{number_format(100-($valua->giagiam/$valua->dongia)*100)}}%</span>
									</div>
								@endif
							@endif
							<button class="main-btn quick-view"><a href="{{route('chitietmypham',$valua->id)}}"><i class="fa fa-search-plus"></i> Xem chi tiết</a></button>
							<img src="{{asset('public/upload/images/'.$valua->hinhanh)}}" alt="" width="200" height="250">
						</div>
						<div class="product-body">
							@if($valua->giagiam!=0)
								<h3 class="product-price">{{number_format($valua->giagiam)}}đ <del class="product-old-price">{{number_format($valua->dongia)}}đ</del></h3>
							@else
								<h3 class="product-price">{{number_format($valua->dongia)}}đ</h3>
							@endif
							<!--<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>-->
							<h2 class="product-name"><a href="{{route('chitietmypham',$valua->id)}}">{{$valua->tenmypham}}</a></h2>
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
			<div class="row">
			{{$timkiem_mypham->links()}}
			</div>
			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->  
	
@endsection
