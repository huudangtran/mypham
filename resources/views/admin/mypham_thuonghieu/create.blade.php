@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/mypham_thuonghieu/create') }}" method="post">
				@csrf				
				<div class="form-group">
					<label for="thuonghieu_id">Thương hiệu <span class="text-danger font-weight-bold">*</span></label>
					<select id="thuonghieu_id" class="form-control custom-select @error('thuonghieu_id') is-invalid @enderror" name="thuonghieu_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($thuonghieu as $value)
							<option value="{{ $value->id }}">{{ $value->tenthuonghieu }}</option>
						@endforeach
					</select>
					@error('thuonghieu_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
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
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm </button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
