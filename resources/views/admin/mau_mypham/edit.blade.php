@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa màu mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/mau_mypham/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $mau_mypham->id }}" />
				<div class="form-group">
					<label for="mypham_id">Mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<select id="mypham_id" class="form-control custom-select @error('v') is-invalid @enderror" name="mypham_id" required autofocus>
						<option value="">-- Choose --</option>
						@foreach($mypham as $value)
							<option value="{{ $value->id }}" {{ ($mau_mypham->mypham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenmypham }}</option>
						@endforeach
					</select>
					@error('mypham_id')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="mau_mypham">Màu mỹ phẩm <span class="text-danger font-weight-bold">*</span></label>
					<input id="mau_mypham" type="text" class="form-control @error('mau_mypham') is-invalid @enderror" name="mau_mypham" value="{{ $mau_mypham->mau_mypham }}" required autocomplete="mau_mypham" />
					@error('mau_mypham')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="mamau">Mã màu <span class="text-danger font-weight-bold">*</span></label>
					<input id="mamau" type="text" class="form-control @error('mamau') is-invalid @enderror" name="mamau" value="{{ $mau_mypham->mamau }}" required autocomplete="mamau" />
					@error('mamau')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection

