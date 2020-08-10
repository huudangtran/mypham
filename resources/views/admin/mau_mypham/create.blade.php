@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm màu mỹ phẩm mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/mau_mypham/create') }}" method="post">
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
					<label for="mau_mypham">Màu mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<input id="mau_mypham" type="text" class="form-control @error('mau_mypham') is-invalid @enderror" name="mau_mypham" value="{{ old('mau_mypham') }}" required autocomplete="mau_mypham" />
					@error('mau_mypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="mamau">Mã màu <span class="text-danger font-weight-bold">*</span></label>
					<input id="mamau" type="text" class="form-control @error('mamau') is-invalid @enderror" name="mamau" value="{{ old('mamau') }}" required autocomplete="mamau" />
					@error('mamau')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm màu mỹ phẩm</button>
			</form>
		</div>
	</div>
@endsection
@section('javascript')
	<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
