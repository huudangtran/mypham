@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa loại mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/loaimypham/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $loaimypham->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xóa loại mỹ phẩm "{{ $loaimypham->tenloaimypham }}"?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/loaimypham/user') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection