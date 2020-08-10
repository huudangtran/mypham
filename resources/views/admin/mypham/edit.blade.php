@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa thông tin mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/mypham/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $mypham->id }}" />	
				<div class="form-group">
					<label for="loaimypham_id">Loại mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="loaimypham_id" class="form-control custom-select @error('v') is-invalid @enderror" name="loaimypham_id" required autofocus>
						<option value="">Chọn loại mỹ phẩm</option>
						@foreach($loaimypham as $value)
							<option value="{{ $value->id }}" {{ ($mypham->loaimypham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenloaimypham }}</option>
						@endforeach
					</select>
					@error('loaimypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="thuonghieu_id">Thương hiệu <span class="text-danger font-weight-bold">*</span></label>
					<select id="thuonghieu_id" class="form-control custom-select @error('v') is-invalid @enderror" name="thuonghieu_id" required autofocus>
						<option value="">Chọn thương hiệu</option>
						@foreach($thuonghieu as $value)
							<option value="{{ $value->id }}" {{ ($mypham->thuonghieu_id == $value->id) ? 'selected' : '' }}>{{ $value->tenthuonghieu }}</option>
						@endforeach
					</select>
					@error('thuonghieu_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="tenmypham">Tên Mỹ Phẫm <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenmypham" type="text" class="form-control @error('tenmypham') is-invalid @enderror" name="tenmypham" value="{{ $mypham->tenmypham }}" required autocomplete="tenmypham" />
					@error('tenmypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="sanphammoi" name="sanphammoi" {{ ($mypham->sanphammoi) ? 'checked' : '' }} />
					<label class="form-check-label" for="sanphammoi">Là sản phẩm mới</label>
				</div>
				<div class="form-group">
					<label for="dongia">Đơn Giá <span class="text-danger font-weight-bold">*</span></label>
					<input id="dongia" type="text" class="form-control @error('dongia') is-invalid @enderror" name="dongia" value="{{ $mypham->dongia }}" required autocomplete="dongia" />
					@error('dongia')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="giagiam">Giá giảm<span class="text-danger font-weight-bold"></span></label>
					<input id="giagiam" type="text" class="form-control @error('giagiam') is-invalid @enderror" name="giagiam" value="{{ $mypham->giagiam }}"  autocomplete="giagiam" />
					@error('giagiam')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="soluong">Số Lượng <span class="text-danger font-weight-bold">*</span></label>
					<input id="soluong" type="text" class="form-control @error('soluong') is-invalid @enderror" name="soluong" value="{{ $mypham->soluong }}" required autocomplete="soluong" />
					@error('soluong')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hinhanh">Hình ảnh</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="ChonHinh"><a href="#hinhanh" onclick="BrowseServer()" >Chọn hình</a></span>
						</div>
						<input type="text"  id="hinhanh" class="form-control @error('hinhanh') is-invalid @enderror" name="hinhanh" value="{{ $mypham->hinhanh }}" required autocomplete="hinhanh" />
					</div>
				</div>
				<div class="form-group">
					<label for="mota">Mô tả <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="mota" class="form-control ckeditor @error('mota') is-invalid @enderror" name="mota" required>{{ $mypham->mota }}</textarea>
					@error('mota')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="thongtinmypham">Thông tin mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<textarea id="thongtinmypham" class="form-control ckeditor @error('thongtinmypham') is-invalid @enderror" name="thongtinmypham" required>{{ $mypham->thongtinmypham }}</textarea>
					@error('thongtinmypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" id="comment_status" name="comment_status" {{ ($mypham->comment_status) ? 'checked' : '' }} />
					<label class="form-check-label" for="comment_status">Cho bình luận</label>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
