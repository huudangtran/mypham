@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa chủ đề</div>
		<div class="card-body">
			<form action="{{ url('/admin/chude/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $chude->id }}" />
				<div class="form-group">
					<label for="tenchude">Tên chủ đề <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenchude" type="text" class="form-control @error('tenchude') is-invalid @enderror" name="tenchude" value="{{ $chude->tenchude }}" required autocomplete="tenchude" autofocus />
					@error('tenchude')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> cập nhật</button>
			</form>
		</div>
	</div>
@endsection
