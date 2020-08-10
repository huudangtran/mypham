@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa thương hiệu</div>
		<div class="card-body">
			<form action="{{ url('/admin/thuonghieu/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $thuonghieu->id }}" />
				<div class="form-group">
					<label for="tenthuonghieu">Tên thuong hiệu <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenthuonghieu" type="text" class="form-control @error('tenthuonghieu') is-invalid @enderror" name="tenthuonghieu" value="{{ $thuonghieu->tenthuonghieu }}" required autocomplete="tenthuonghieu" autofocus />
					@error('tenthuonghieu')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hinhanh">Hình ảnh</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="ChonHinh"><a href="#hinhanh" onclick="BrowseServer()" >Chọn hình</a></span>
						</div>
						<input type="text"  id="hinhanh" class="form-control @error('hinhanh') is-invalid @enderror" name="hinhanh" value="{{ $thuonghieu->hinhanh }}"  autocomplete="hinhanh" />
					</div>
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
			</form>
		</div>
	</div>
@endsection
@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection