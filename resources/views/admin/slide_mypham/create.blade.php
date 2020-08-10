@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm slide mỹ phẩm mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/slide_mypham/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="mypham_id">Mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="mypham_id" class="form-control custom-select @error('mypham_id') is-invalid @enderror" name="mypham_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($mypham as $value)
							<option value="{{ $value->id }}">{{ $value->tenmypham }}</option>
						@endforeach
					</select>
					@error('mypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="hinhanh">Hình ảnh<span class="text-danger font-weight-bold">*</span></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="ChonHinh"><a href="#hinhanh" onclick="BrowseServer()" required autocomplete="hinhanh">Chọn hình</a></span>
						</div>
						<input type="text" class="form-control" id="hinhanh" name="hinhanh" placeholder="" />
					</div>
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm </button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection