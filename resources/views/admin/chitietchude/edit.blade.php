@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Edit post</div>
		<div class="card-body">
			<form action="{{ url('/admin/chitietchude/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $chitietchude->id }}" />
				<div class="form-group">
					<label for="chude_id">Chủ Đề <span class="text-danger font-weight-bold">*</span></label>
					<select id="chude_id" class="form-control custom-select @error('v') is-invalid @enderror" name="chude_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($chude as $value)
							<option value="{{ $value->id }}" {{ ($chitietchude->chude_id == $value->id) ? 'selected' : '' }}>{{ $value->tenchude }}</option>
						@endforeach
					</select>
					@error('chude_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="tenchitietchude">Tên chủ đề chi tiết <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenchitietchude" type="text" class="form-control @error('tenchitietchude') is-invalid @enderror" name="tenchitietchude" value="{{ $chitietchude->tenchitietchude }}" required autocomplete="tenchitietchude" />
					@error('tenchitietchude')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
