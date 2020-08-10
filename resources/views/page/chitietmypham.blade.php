@extends('page.master')
@extends('page.header')
@extends('page.footer')
@extends('page.navigation')
@section('css')
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
@endsection
@section('noidung')
	<!-- BREADCRUMB -->
	
		<div id="breadcrumb">
			<div class="container">
				<ul class="breadcrumb">
				@foreach($loaimypham as $value)
					@foreach($chitietmypham as $value1)
					@if($value1->loaimypham_id==$value->id)
					<li><a href="#">Home</a></li>
					
						<li><a href="#">{{$value->tenloaimypham}}</a></li>
					
					
					<li class="active">{{$value1->tenmypham}}</li>
					@endif
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
				
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
					
						<div id="product-main-view">
						@foreach($chitietmypham as $value)
							<div class="product-view">
								<img src="{{ asset('public/upload/images/'.$value->hinhanh) }}" alt="">
							</div>
							@foreach($slide_mp as $slides)
							<div class="product-view">
								@if($slides->mypham_id==$value->id)
								<img src="{{ asset('public/upload/images/'.$slides->hinhanh) }}" alt="">
								@endif
							</div>
							@endforeach							
						@endforeach
						</div>
						<div id="product-view">
						@foreach($chitietmypham as $value)
							<div class="product-view">
								<img src="{{ asset('public/upload/images/'.$value->hinhanh) }}" alt="">
							</div>
							@foreach($slide_mp as $slides)
							<div class="product-view">
								@if($slides->mypham_id==$value->id)
								<img src="{{ asset('public/upload/images/'.$slides->hinhanh) }}" alt="">
								@endif
							</div>
							@endforeach
						@endforeach
						</div>
				
					</div>
			
					<div class="col-md-6">
					
						<div class="product-body">
						@foreach($chitietmypham as $value)
							<div class="product-label">
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
							</div>
							<h2 class="product-name">{{$value->tenmypham}}</h2>
							@if($value->giagiam!=0)
								<h3 class="product-price">{{number_format($value->giagiam)}}đ <del class="product-old-price">{{number_format($value->dongia)}}đ</del></h3>
							@else
								<h3 class="product-price">{{number_format($value->dongia)}}đ</h3>
							@endif
							<!--<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a>
							</div>	-->						
								<p><strong>Thương hiệu:</strong>
									{{$value->thuonghieu->tenthuonghieu}}
								</p>
							{!! $value->mota !!}
						@endforeach
							<div class="product-options">
								@foreach($size_mp as $value1)
								<ul class="size-option">
									@if($value1->mypham_id==$value->id)
									<li><span class="text-uppercase">Size:</span></li>
									
										<li class="active"><a href="#">{{$value1->size_mypham}}</a></li>
									@endif
								</ul>
								@endforeach
								@foreach($mau_mp as $value1)
								<ul class="color-option">
									@if($value1->mypham_id==$value->id)
										<li><span class="text-uppercase">Color:</span></li>
										@foreach($mau_mp as $value)
										
											<li class="active"><a href="#" style="background-color:{{$value->mamau}};"></a></li>
											
										@endforeach
									@endif
								</ul>
								@endforeach
							</div>

							<div class="product-btns">
							
								<div class="qty-input">
									<span class="text-uppercase">Số lượng: </span>
									<input class="input" type="number" value="1" >
								</div>
								@foreach($chitietmypham as $value)
								<button class="primary-btn add-to-cart"><a href="{{route('themvaogiohang',$value->id)}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></button>
								@endforeach
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="product-tab">
						@foreach($chitietmypham as $value)
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Thông tin sản phẩm</a></li>
								
								<li><a data-toggle="tab" href="#tab2">Reviews ({{count($comment1)}})</a></li>
										
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{!! $value->thongtinmypham !!}</p>
								</div>
								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												@foreach($comment as $cm)
													@if($cm->mypham_id==$value->id)
													<div class="single-review">
														<div class="review-heading">
															<div><a href="#"><i class="fa fa-user-o"></i> {{$cm->name}}</a></div>
															<div><a href="#"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cm->created_at)->format('d/m/Y H:i') }}</a></div>
															<!--<div class="review-rating pull-right">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>-->
														</div>
														<div class="review-body">
															<p>{{$cm->comment_content}}</p>
														</div>
													</div>
													@endif
												@endforeach
												<ul class="reviews-pages">
													<!--<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>-->
													<li> {{$comment->links()}}</li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Review của bạn</h4>
											<p>Email của bạn sẽ được giữ bí mật</p>
											@guest
												<p class="card-text">Vui lòng đăng nhập để bình luận.</p>
											@else
											<form class="review-form" action="{{ route('chitietmyphamreview') }}" method="post">
												@csrf
												<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
												<input type="hidden" name="mypham_id" value="{{ $chitietmypham1->id }}" />
												<div class="form-group">
													<textarea class="input" placeholder="Review của bạn" name="comment_content"></textarea>
												</div>
												<!--<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>-->
												<button class="primary-btn">Submit</button>
											</form>
											@endguest
										</div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->	
@endsection
