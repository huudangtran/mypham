<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="shortcut icon" href="{{ asset('public/images/premium.png') }}" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
	<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/css/fontawesome.css') }}" rel="stylesheet" />
	@yield('css')
	<link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm" style="background-color:#009900;">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('public/images/logo2.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="" />
				{{ config('app.name', 'Laravel') }}
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav mr-auto">

				</ul>
				<ul class="navbar-nav ml-auto">
					@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
						</li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Đăng Ký</a>
							</li>
						@endif
					@else
						@if(Auth::user()->privilege == "admin")
							<li class="nav-item dropdown">
								<a id="navbarDropdownManager" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<i class="fas fa-cog"></i> Admin CP <span class="caret"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownManager">
									<a class="dropdown-item" href="{{ url('/admin/thuonghieu') }}"><i class="fas fa-fw fa-list"></i> Thương Hiệu</a>
									<a class="dropdown-item" href="{{ url('/admin/chude') }}"><i class="fas fa-fw fa-newspaper"></i> Chủ Đề</a>
									<a class="dropdown-item" href="{{ url('/admin/chitietchude') }}"><i class="fas fa-fw fa-newspaper"></i> Chi Tiết Chủ Đề</a>
									<a class="dropdown-item" href="{{ url('/admin/loaimypham') }}"><i class="fas fa-fw fa-newspaper"></i> Loại Mỹ Phẩm</a>
									<a class="dropdown-item" href="{{ url('/admin/mypham') }}"><i class="fas fa-fw fa-newspaper"></i> Mỹ Phẩm</a>
									<a class="dropdown-item" href="{{ url('/admin/size_mypham') }}"><i class="fas fa-fw fa-newspaper"></i> Size Mỹ Phẩm</a>
									<a class="dropdown-item" href="{{ url('/admin/mau_mypham') }}"><i class="fas fa-fw fa-newspaper"></i> Màu Mỹ Phẩm</a>
									<a class="dropdown-item" href="{{ url('/admin/dathang') }}"><i class="fas fa-fw fa-newspaper"></i> Đơn Hàng</a>
									<a class="dropdown-item" href="{{ url('/admin/comments') }}"><i class="fas fa-fw fa-comments"></i> Bình Luận</a>
									<a class="dropdown-item" href="{{ url('/admin/users') }}"><i class="fas fa-fw fa-users"></i> Người Dùng</a>									
									<a class="dropdown-item" href="{{ url('/admin/slide_mypham') }}"><i class="fas fa-fw fa-comments"></i> Slide mỹ phẫm</a>									
								</div>
							</li>
						@endif
						<li class="nav-item dropdown">
							<a id="navbarDropdownUser" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<i class="fas fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
							</a>
							
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
							<form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>
						</li>
					@endguest
				</ul>
			</div>
		</nav>
		<main class="mt-3">
			@yield('content')
		</main>
		<hr class="shadow-sm" />
		<footer >Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bản quyền thuộc Phan Thị Khánh Huyền</footer>
	</div>
	<script src="{{ asset('public/js/jquery-3.3.1.slim.min.js') }}"></script>
	<script src="{{ asset('public/js/popper.min.js') }}"></script>
	<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
	
	
		<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>		
		<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
		<script type="text/javascript">
			function BrowseServer()
			{
				var finder = new CKFinder();
				finder.basePath ='/';
				finder.selectActionFunction = function(fileUrl) {
					document.getElementById('hinhanh').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
				};
				finder.popup();
			}
		</script>
		<script type="text/javascript">
			function BrowseServer1()
			{
				var finder = new CKFinder();
				finder.basePath ='/';
				finder.selectActionFunction = function(fileUrl) {
					document.getElementById('hinhmau').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
				};
				finder.popup();
			}
		</script>
		
	@yield('javascript')
</body>
</html>
