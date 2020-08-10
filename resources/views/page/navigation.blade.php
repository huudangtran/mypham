
@section('navigation')
	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				
				<!-- /category nav --> 

				<!-- menu nav -->				
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-list"></i></a>
							<ul class="custom-menu">
								<li><a href="{{route('home')}}"><i class="fa fa-home"></i>&ensp;Home</a></li>
								<li><a href=""><i class="fa fa-info"></i>&ensp;Về chúng tôi</a></li>
								<li><a href=""><i class="fa fa-cog"></i>&ensp;Hỗ trợ</a></li>
								<li><a href=""><i class="fa fa-address-book"></i>&ensp;Liên hệ</a></li>
								<li><a href=""><i class="fa fa-pagelines"></i>&ensp;Fanpage</a></li>
							</ul>
						</li>
						
						@foreach($chude_trangdiem as $value)
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">							
								<div class="row">
								@foreach($chitietchude as $value1)
									<div class="col-md-4">
										<ul class="list-links">
											<li>
											@if($value1->chude_id==$value->id)
												<h3 class="list-links-title">{{$value1->tenchitietchude}}</h3></li>
											@endif
											@foreach($loaimypham as $lmp) 
												@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
													<li><a href="{{route('loaimypham',$lmp->id)}}">{{$lmp->tenloaimypham}}</a></li>
												@endif
											@endforeach
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>									
								@endforeach
								</div>
								
							</div>
						</li>
						@endforeach
						@foreach($chude_chamsocda as $value)
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">							
								<div class="row">
								@foreach($chitietchude as $value1)
									<div class="col-md-4">
										<ul class="list-links">
											<li>
											@if($value1->chude_id==$value->id)
												<h3 class="list-links-title">{{$value1->tenchitietchude}}</h3></li>
											@endif
											@foreach($loaimypham as $lmp) 
												@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
													<li><a href="{{route('loaimypham',$lmp->id)}}">{{$lmp->tenloaimypham}}</a></li>
												@endif
											@endforeach
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									
									@endforeach
								</div>
								
							</div>
						</li>
						@endforeach
						@foreach($chude_chamsoctoanthan as $value)
						<li class="dropdown mega-dropdown full-width">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									@foreach($chitietchude_chamsoctoanthan as $value1)
										@foreach($loaimypham as $lmp)	
										<div class="col-md-4">											
											<ul class="list-links">
												@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
													<li><a href="{{route('loaimypham',$lmp->id)}}">{{$lmp->tenloaimypham}}</a></li>
												@endif
											</ul>											
											<hr class="hidden-md hidden-lg">
										</div>
										@endforeach
									@endforeach
								</div>								
							</div>
						</li>
						@endforeach
						@foreach($chude_chamsoctoc as $value)
						<li class="dropdown mega-dropdown full-width">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									@foreach($chitietchude_chamsoctoc as $value1)
										@foreach($loaimypham as $lmp)	
										<div class="col-md-4">											
											<ul class="list-links">
												@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
													<li><a href="{{route('loaimypham',$lmp->id)}}">{{$lmp->tenloaimypham}}</a></li>
												@endif
											</ul>											
											<hr class="hidden-md hidden-lg">
										</div>
										@endforeach
									@endforeach
								</div>								
							</div>
						</li>
						@endforeach
						<!--@foreach($chude_nuochoa as $value)
						<li class="dropdown mega-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									@foreach($chitietchude_nuochoa as $value1)
										@foreach($loaimypham as $lmp)	
										<div class="col-md-12">											
											<ul class="list-links">
												@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
													<li><a href="#">{{$lmp->tenloaimypham}}</a></li>
												@endif
											</ul>											
											<hr class="hidden-md hidden-lg">
										</div>
										@endforeach
									@endforeach
								</div>								
							</div>
						</li>
						@endforeach-->
						@foreach($chude_nuochoa as $value)
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							@foreach($chitietchude_nuochoa as $value1)
								
							<ul class="custom-menu">
								@foreach($loaimypham as $lmp)
									@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
										<li><a href="{{route('loaimypham',$lmp->id)}}">{{$lmp->tenloaimypham}}</a></li>
									@endif
								@endforeach	
							</ul>
								
							@endforeach
						</li>
						@endforeach
						<!--@foreach($chude_phukien as $value)
						<li class="dropdown mega-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									@foreach($chitietchude_phukien as $value1)
										@foreach($loaimypham as $lmp)	
										<div class="col-md-1">											
											<ul class="list-links">
												@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
													<li><a href="#">{{$lmp->tenloaimypham}}</a></li>
												@endif
											</ul>											
											<hr class="hidden-md hidden-lg">
										</div>
										@endforeach
									@endforeach
								</div>								
							</div>
						</li>
						@endforeach-->
						@foreach($chude_phukien as $value)
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$value->tenchude}} <i class="fa fa-caret-down"></i></a>
							@foreach($chitietchude_phukien as $value1)
								
							<ul class="custom-menu">
								@foreach($loaimypham as $lmp)
									@if(($lmp->chitietchude_id == $value1->id)&& ($value1->chude_id==$value->id))
										<li><a href="{{route('loaimypham',$lmp->id)}}">{{$lmp->tenloaimypham}}</a></li>
									@endif
								@endforeach	
							</ul>
								
							@endforeach
						</li>
						@endforeach
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">THƯƠNG HIỆU <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
								@foreach($thuonghieu as $value)
									<div class="col-md-3">
										
										<ul class="list-links">
											
											<li><a href="{{route('thuonghieu',$value->id)}}">{{$value->tenthuonghieu}}</a></li>
											
										</ul>
									</div>
									@endforeach
										
								</div>
							</div>
						</li>
						<!--<li class="dropdown mega-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Thương Hiệu <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									@foreach($thuonghieu as $value)
									<div class="col-md-8">
										<ul class="list-links">
											<li><a href="#">{{$value->tenthuonghieu}}</a></li>											
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>	
									@endforeach
								</div>								
							</div>
						</li>-->
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
@endsection