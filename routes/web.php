<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	Route::get('/v', function() {
		$laravel = app();
		return "Version: Laravel " . $laravel::VERSION;
	});

	Route::get('/clear/cache', function() {
		Artisan::call('cache:clear');
		return "Cache is cleared.";
	});

	Route::get('/clear/view', function() {
		Artisan::call('view:clear');
		return "Views are cleared.";
	});

	Auth::routes();


	Route::get('/', 'HomeController@getIndex');
	Route::get('/home', 'HomeController@getIndex')->name('home');
	//Route::get('/{title}', 'HomeController@getPostDetails');

	Route::get('/admin/index', 'AdminController@getIndex')->name('admin');

	Route::get('/admin/users', 'UserController@getIndex');
	
	Route::get('/admin/users/create', 'UserController@getCreate');
	Route::post('/admin/users/create', 'UserController@postCreate');
	Route::get('/admin/users/edit/{id}', 'UserController@getEdit');
	Route::post('/admin/users/edit', 'UserController@postEdit');
	Route::get('/admin/users/delete/{id}', 'UserController@getDelete');
	Route::post('/admin/users/delete', 'UserController@postDelete');

	Route::get('/page/users/edit/{id}', 'UserController@getEdit');
	Route::post('/page/users/edit', 'UserController@postEdit');

	Route::get('/admin/thuonghieu', 'ThuongHieuController@getIndex');
	Route::get('/admin/thuonghieu/create', 'ThuongHieuController@getCreate');
	Route::post('/admin/thuonghieu/create', 'ThuongHieuController@postCreate');
	Route::get('/admin/thuonghieu/edit/{id}', 'ThuongHieuController@getEdit');
	Route::post('/admin/thuonghieu/edit', 'ThuongHieuController@postEdit');
	Route::get('/admin/thuonghieu/delete/{id}', 'ThuongHieuController@getDelete');
	Route::post('/admin/thuonghieu/delete', 'ThuongHieuController@postDelete');

	Route::get('/admin/chude', 'ChuDeController@getIndex');
	Route::get('/admin/chude/create', 'ChuDeController@getCreate');
	Route::post('/admin/chude/create', 'ChuDeController@postCreate');
	Route::get('/admin/chude/edit/{id}', 'ChuDeController@getEdit');
	Route::post('/admin/chude/edit', 'ChuDeController@postEdit');
	Route::get('/admin/chude/delete/{id}', 'ChuDeController@getDelete');
	Route::post('/admin/chude/delete', 'ChuDeController@postDelete');

	Route::get('/admin/chitietchude', 'ChiTietChuDeController@getIndex');
	Route::get('/admin/chitietchude/create', 'ChiTietChuDeController@getCreate');
	Route::post('/admin/chitietchude/create', 'ChiTietChuDeController@postCreate');
	Route::get('/admin/chitietchude/edit/{id}', 'ChiTietChuDeController@getEdit');
	Route::post('/admin/chitietchude/edit', 'ChiTietChuDeController@postEdit');
	Route::get('/admin/chitietchude/delete/{id}', 'ChiTietChuDeController@getDelete');
	Route::post('/admin/chitietchude/delete', 'ChiTietChuDeController@postDelete');

	Route::get('/admin/loaimypham', 'LoaiMyPhamController@getIndex');
	Route::get('/admin/loaimypham/create', 'LoaiMyPhamController@getCreate');
	Route::post('/admin/loaimypham/create', 'LoaiMyPhamController@postCreate');
	Route::get('/admin/loaimypham/edit/{id}', 'LoaiMyPhamController@getEdit');
	Route::post('/admin/loaimypham/edit', 'LoaiMyPhamController@postEdit');
	Route::get('/admin/loaimypham/delete/{id}', 'LoaiMyPhamController@getDelete');
	Route::post('/admin/loaimypham/delete', 'LoaiMyPhamController@postDelete');

	//Route::get('/loaimypham', 'HomeController@getLoaiSanPham')->name('loaimypham');
	Route::get('/loaimypham/{loai}', 'HomeController@getLoaiSanPham')->name('loaimypham');
	Route::get('/thuonghieu/{th}', 'HomeController@getThuongHieu')->name('thuonghieu');

	Route::get('/admin/mypham', 'MyPhamController@getIndex');
	Route::get('/admin/mypham/create', 'MyPhamController@getCreate');
	Route::post('/admin/mypham/create', 'MyPhamController@postCreate');
	Route::get('/admin/mypham/edit/{id}', 'MyPhamController@getEdit');
	Route::post('/admin/mypham/edit', 'MyPhamController@postEdit');
	Route::get('/admin/mypham/delete/{id}', 'MyPhamController@getDelete');
	Route::post('/admin/mypham/delete', 'MyPhamController@postDelete');

	Route::get('chitietmypham/{id}', 'HomeController@getChiTietMyPham')->name('chitietmypham');
	Route::post('chitietmypham_review', 'HomeController@postChiTietMyPhamReview')->name('chitietmyphamreview');

	

	Route::get('/admin/size_mypham', 'Size_MyPhamController@getIndex');
	Route::get('/admin/size_mypham/create', 'Size_MyPhamController@getCreate');
	Route::post('/admin/size_mypham/create', 'Size_MyPhamController@postCreate');
	Route::get('/admin/size_mypham/edit/{id}', 'Size_MyPhamController@getEdit');
	Route::post('/admin/size_mypham/edit', 'Size_MyPhamController@postEdit');
	Route::get('/admin/size_mypham/delete/{id}', 'Size_MyPhamController@getDelete');
	Route::post('/admin/size_mypham/delete', 'Size_MyPhamController@postDelete');

	Route::get('/admin/mau_mypham', 'Mau_MyPhamController@getIndex');
	Route::get('/admin/mau_mypham/create', 'Mau_MyPhamController@getCreate');
	Route::post('/admin/mau_mypham/create', 'Mau_MyPhamController@postCreate');
	Route::get('/admin/mau_mypham/edit/{id}', 'Mau_MyPhamController@getEdit');
	Route::post('/admin/mau_mypham/edit', 'Mau_MyPhamController@postEdit');
	Route::get('/admin/mau_mypham/delete/{id}', 'Mau_MyPhamController@getDelete');
	Route::post('/admin/mau_mypham/delete', 'Mau_MyPhamController@postDelete');

	Route::get('/admin/slide_mypham', 'Slide_MyPhamController@getIndex');
	Route::get('/admin/slide_mypham/create', 'Slide_MyPhamController@getCreate');
	Route::post('/admin/slide_mypham/create', 'Slide_MyPhamController@postCreate');
	Route::get('/admin/slide_mypham/edit/{id}', 'Slide_MyPhamController@getEdit');
	Route::post('/admin/slide_mypham/edit', 'Slide_MyPhamController@postEdit');
	
	Route::get('/admin/dathang', 'DatHangController@getIndex')->name('thongtindonhang');
	Route::get('/admin/dathang/edit/{id}', 'DatHangController@getEdit');
	Route::post('/admin/dathang/edit', 'DatHangController@postEdit');
	Route::get('/admin/dathang/delete/{id}', 'DatHangController@getDelete');
	Route::post('/admin/dathang/delete', 'DatHangController@postDelete');
	
	Route::get('/admin/comments', 'CommentController@getIndex');
	//Route::get('/admin/comments/create', 'CommentController@getCreate');
	//Route::post('/admin/comments/create', 'CommentController@postCreate');
	Route::get('/admin/comments/edit/{id}', 'CommentController@getEdit');
	Route::post('/admin/comments/edit', 'CommentController@postEdit');
	Route::get('/admin/comments/delete/{id}', 'CommentController@getDelete');
	Route::post('/admin/comments/delete', 'CommentController@postDelete');
	Route::get('/admin/comments/status/{id}', 'CommentController@getCommentStatus');



	Route::get('add-to-cart/{id}', 'HomeController@getThemGioHang')->name('themvaogiohang');
	Route::get('/view-cart', 'HomeController@getXemGioHang')->name('xemgiohang');
	Route::get('/view-cart/dathang', 'HomeController@getCheckout')->name('dendathang');
	Route::post('view-cart/capnhat', 'HomeController@postCapnhatsoluong')->name('dendathang');
	Route::get('/del-cart/{id}', 'HomeController@getXoaGioHang')->name('xoagiohang');
	Route::get('dathang/del-cart1/{id}', 'HomeController@getXoaGioHang1')->name('xoagiohang1');
	 Route::post('update_cart','HomeController@postUpdateQuantityCart')->name('update_cart');
	Route::post('/dathang/capnhat','HomeController@postCapnhatsoluong')->name('capnhatsoluong');
	
	Route::get('/timkiem', 'HomeController@getTimKiem')->name('timkiem');

	Route::get('/dathang', 'HomeController@getCheckout')->name('dathang');
	
	Route::post('/dathang', 'HomeController@postCheckout')->name('dathang');
	
	
	Route::get('dangky', 'HomeController@getDangKy')->name('dangky');
	Route::post('dangky', 'HomeController@postDangKy')->name('dangky');
	
	Route::get('dangnhap', 'HomeController@getDangNhap');
	Route::post('dangnhap', 'HomeController@postDangNhap')->name('dangnhap');
	Route::get('dangxuat','HomeController@postDangXuat')->name('dangxuat');
	
	Route::get('/taikhoan', 'AccountController@getIndexClient')->name('taikhoan');
	Route::get('taikhoan/edit/{id}', 'AccountController@getEdit');
	Route::post('taikhoan/edit', 'AccountController@postEdit');
	
	Route::get('/donhang', 'DonHangController@getIndex')->name('donhang');
	Route::get('/chitiet/{id}', 'DonHangController@getIndexDetail')->name('chitiet');
	