@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm chủ đề mới</div>
		<div class="card-body">
			<form action="{{ url('/admin/chude/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="tenchude">Tên chủ đề <span class="text-danger font-weight-bold">*</span></label>
					<input id="tenchude" type="text" class="form-control @error('tenchude') is-invalid @enderror" name="tenchude" value="{{ old('tenchude') }}" required autocomplete="tenchude" autofocus />
					@error('tenchude')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> thêm chủ đề</button>
			</form>
		</div>
	</div>
@endsection