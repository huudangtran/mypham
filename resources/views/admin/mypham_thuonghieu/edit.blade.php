@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa thông tin mỹ phẩm thương hiệu</div>
		<div class="card-body">
			<form action="{{ url('/admin/mypham_thuonghieu/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $mypham_thuonghieu->id }}" />
				<div class="form-group">
					<label for="thuonghieu_id">Thương Hiệu <span class="text-danger font-weight-bold">*</span></label>
					<select id="thuonghieu_id" class="form-control custom-select @error('v') is-invalid @enderror" name="thuonghieu_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($thuonghieu as $value)
							<option value="{{ $value->id }}" {{ ($mypham_thuonghieu->thuonghieu_id == $value->id) ? 'selected' : '' }}>{{ $value->tenthuonghieu }}</option>
						@endforeach
					</select>
					@error('thuonghieu_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="mypham_id">Mỹ Phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="mypham_id" class="form-control custom-select @error('v') is-invalid @enderror" name="mypham_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($mypham as $value)
							<option value="{{ $value->id }}" {{ ($mypham_thuonghieu->mypham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenmypham }}</option>
						@endforeach
					</select>
					@error('mypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
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
