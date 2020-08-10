@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa size mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/size_mypham/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $size_mypham->id }}" />
				<div class="form-group">
					<label for="mypham_id">Mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="mypham_id" class="form-control custom-select @error('v') is-invalid @enderror" name="mypham_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($mypham as $value)
							<option value="{{ $value->id }}" {{ ($size_mypham->mypham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenmypham }}</option>
						@endforeach
					</select>
					@error('mypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="size_mypham">Size mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<input id="size_mypham" type="text" class="form-control @error('size_mypham') is-invalid @enderror" name="size_mypham" value="{{ $size_mypham->size_mypham }}" required autocomplete="size_mypham" />
					@error('size_mypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="gia">Giá <span class="text-danger font-weight-bold">*</span></label>
					<input id="gia" type="text" class="form-control @error('gia') is-invalid @enderror" name="gia" value="{{ $size_mypham->gia }}" required autocomplete="gia" />
					@error('gia')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection

