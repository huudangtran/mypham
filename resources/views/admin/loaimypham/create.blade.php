@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm loại mỹ phẩm mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/loaimypham/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="chitietchude_id">Chi tiết chủ đề <span class="text-danger font-weight-bold">*</span></label>
					<select id="chitietchude_id" class="form-control custom-select @error('chitietchude_id') is-invalid @enderror" name="chitietchude_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($chitietchude as $value)
							<option value="{{ $value->id }}">{{ $value->tenchitietchude }}</option>
						@endforeach
					</select>
					@error('chitietchitietchude_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="tenloaimypham">Tên loại mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenloaimypham" type="text" class="form-control @error('tenloaimypham') is-invalid @enderror" name="tenloaimypham" value="{{ old('tenloaimypham') }}" required autocomplete="tenloaimypham" />
					@error('tenloaimypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm loại mỹ phẩm</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
