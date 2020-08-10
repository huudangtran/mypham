@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa size mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/slide_mypham/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $slide_mypham->id }}" />
				<div class="form-group">
					<label for="mypham_id">Mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="mypham_id" class="form-control custom-select @error('v') is-invalid @enderror" name="mypham_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($mypham as $value)
							<option value="{{ $value->id }}" {{ ($slide_mypham->mypham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenmypham }}</option>
						@endforeach
					</select>
					@error('mypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hinhanh">Hình ảnh</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="ChonHinh"><a href="#hinhanh" onclick="BrowseServer()" >Chọn hình</a></span>
						</div>
						<input type="text"  id="hinhanh" class="form-control @error('hinhanh') is-invalid @enderror" name="hinhanh" value="{{ $slide_mypham->hinhanh }}" required autocomplete="hinhanh" />
					</div>
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
