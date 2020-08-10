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
	<style>
	p.black{
		color:#000000;
	}
	
	</style>
@endsection
@section('noidung')
<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('public/images/Untitled-1.jpg')}}" alt="">
						<div class="hover">
							
							<a class="main_btn" href="{{route('dangky')}}">Đăng ký tài khoản</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập</h3>
						<form class="row login_form" action="{{ route('dangnhap') }}" method="post" id="contactForm" novalidate="novalidate">
							@csrf
							@include('errors.baoloi')
							<div class="col-md-12 form-group">							
								<input type="text" class="form-control " id="email" name="email" placeholder="Email" required autocomplete="email" autofocus value="{{old('email')}}">
								@error('email')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control " id="password" name="password" placeholder="Password" required autocomplete="password">
								@error('password')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector" value="remember">
									<label for="f-option2">Giữ đăng nhập</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Đăng nhập</button>
								<a href="#">Quên mật khẩu</a>
							</div>
							{{csrf_field()}} 
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection