@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm chi tiết chủ đề mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/chitietchude/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="chude_id">Chủ đề <span class="text-danger font-weight-bold">*</span></label>
					<select id="chude_id" class="form-control custom-select @error('chude_id') is-invalid @enderror" name="chude_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($chude as $value)
							<option value="{{ $value->id }}">{{ $value->tenchude }}</option>
						@endforeach
					</select>
					@error('chude_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="tenchitietchude">Tên chi tiết chủ đề <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenchitietchude" type="text" class="form-control @error('tenchitietchude') is-invalid @enderror" name="tenchitietchude" value="{{ old('tenchitietchude') }}" required autocomplete="tenchitietchude" />
					@error('tenchitietchude')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm chi tiết chủ đề</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
