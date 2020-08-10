@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm mỹ phẩm mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/mypham/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="loaimypham_id">Loại mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="loaimypham_id" class="form-control custom-select @error('loaimypham_id') is-invalid @enderror" name="loaimypham_id" required autofocus>
						<option value="">Chọn loại mỹ phẩm</option>
						@foreach($loaimypham as $value)
							<option value="{{ $value->id }}">{{ $value->tenloaimypham }}</option>
						@endforeach
					</select>
					@error('loaimypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="thuonghieu_id">Thương hiệu <span class="text-danger font-weight-bold">*</span></label>
					<select id="thuonghieu_id" class="form-control custom-select @error('thuonghieu_id') is-invalid @enderror" name="thuonghieu_id" required autofocus>
						<option value="">Chọn thương hiệu</option>
						@foreach($thuonghieu as $value)
							<option value="{{ $value->id }}">{{ $value->tenthuonghieu }}</option>
						@endforeach
					</select>
					@error('thuonghieu_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="tenmypham">Tên mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenmypham" type="text" class="form-control @error('tenmypham') is-invalid @enderror" name="tenmypham" value="{{ old('tenmypham') }}" required autocomplete="tenmypham" />
					@error('tenmypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="sanphammoi" name="sanphammoi" {{ old('sanphammoi') ? 'checked' : '' }} />
					<label class="form-check-label" for="sanphammoi">Là sản phẩm mới</label>
				</div>
				<div class="form-group">
					<label for="dongia">Đơn Giá<span class="text-danger font-weight-bold">*</span></label>
					<input id="dongia" type="text" class="form-control @error('dongia') is-invalid @enderror" name="dongia" value="{{ old('dongia') }}" required autocomplete="dongia" />
					@error('dongia')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="giagiam">Giá giảm<span class="text-danger font-weight-bold"></span></label>
					<input id="giagiam" type="text" class="form-control @error('giagiam') is-invalid @enderror" name="giagiam" value="{{ old('giagiam') }}"  autocomplete="giagiam" />
					@error('giagiam')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="soluong">Số Lượng<span class="text-danger font-weight-bold">*</span></label>
					<input id="soluong" type="text" class="form-control @error('soluong') is-invalid @enderror" name="soluong" value="{{ old('soluong') }}" required autocomplete="soluong" />
					@error('soluong')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hinhanh">Hình ảnh<span class="text-danger font-weight-bold">*</span></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="ChonHinh"><a href="#hinhanh" onclick="BrowseServer()" >Chọn hình</a></span>
						</div>
						<input type="text" class="form-control @error('soluong') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" placeholder="" required autocomplete="hinhanh" />
						@error('hinhanh')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
					</div>
				</div>
				<div class="form-group">
					<label for="mota">Mô tả <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="mota" class="form-control ckeditor @error('mota') is-invalid @enderror" name="mota" required>{{ old('mota') }}</textarea>
					@error('mota')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="mota">Thông tin sản phẩm <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="thongtinmypham" class="form-control ckeditor @error('mota') is-invalid @enderror" name="thongtinmypham" required>{{ old('thongtinmypham') }}</textarea>
					@error('thongtinmypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="comment_status" name="comment_status" {{ old('comment_status') ? 'checked' : '' }} />
					<label class="form-check-label" for="comment_status">Cho bình luận</label>
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm mỹ phẩm</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
