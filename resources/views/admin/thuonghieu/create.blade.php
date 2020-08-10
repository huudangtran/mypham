@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm thương hiệu mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/thuonghieu/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="tenthuonghieu">Tên thương hiệu <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenthuonghieu" type="text" class="form-control @error('tenthuonghieu') is-invalid @enderror" name="tenthuonghieu" value="{{ old('tenthuonghieu') }}" required autocomplete="tenthuonghieu" autofocus />
					@error('tenthuonghieu')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hinhanh">Hình ảnh</span></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="ChonHinh"><a href="#hinhanh" onclick="BrowseServer()"  autocomplete="soluong">Chọn hình</a></span>
						</div>
						<input type="text" class="form-control" id="hinhanh" name="hinhanh" placeholder="" />
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> thêm thương hiệu</button>
			</form>
		</div>
	</div>
@endsection
@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection