@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Cập nhật thông tin đơn hàng</div>
		<div class="card-body">
			<form action="{{ url('/admin/dathang/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $dathang->id }}" />	
				<div class="form-group">
					<label for="tinhtrang">Trạng thái <span class="text-danger font-weight-bold">*</span></label>
					<select class="custom-select form-control @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" required>
						<option value="">-- Choose --</option>
						<option value="dathang_thangcong">Đặt hàng thành công</option>
						<option value="dang_vanchuyen" selected="selected">Đang vận chuyển</option>
						<option value="da_nhan" selected="selected">Đã nhận</option>
					</select>
					@error('tinhtrang')
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
