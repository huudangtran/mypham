@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/dathang/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $dathang->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xóa đơn hàng ?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/dathang') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection