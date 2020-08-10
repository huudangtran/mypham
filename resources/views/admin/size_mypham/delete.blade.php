@extends('layouts.app')

@section('content')
	<div class="card" >
		<div class="card-header">Xóa size mỹ phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/size_mypham/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $size_mypham->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xóa size mỹ phẩm "{{ $size_mypham->size_mypham }}"?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/size_mypham') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection