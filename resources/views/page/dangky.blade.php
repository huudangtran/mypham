@extends('page.master')
@extends('page.header')
@extends('page.footer')
@extends('page.navigation')

@section('css')
	<link rel="stylesheet" href="{{asset('public/fashiop/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/vendors/jquery-ui/jquery-ui.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('public/fashiop/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/fashiop/css/responsive.css')}}">
@endsection
@section('noidung')
<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('public/images/login-logout.jpg')}}" alt="">
						<div class="hover">						
							
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Tạo tài khoản</h3>
						<form class="row login_form" action="{{route('dangky')}}" method="post" id="contactForm" novalidate="novalidate">
							@csrf
							@if(count($errors)>0)
								<div class="alert alert-danger">
									@foreach($errors->all() as $err)
										{{$err}}
									@endforeach
								</div>
							@endif
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Họ tên">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="username" placeholder="Tên đăng nhập">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ Email">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Nhập lại password">
							</div>
							<!--<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>-->
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Đăng ký</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection