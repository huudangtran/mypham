@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa mỹ phẩm thương hiệu</div>
		<div class="card-body">
			<form action="{{ url('/admin/mypham_thuonghieu/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $mypham_thuonghieu->id }}" />
				@foreach($mypham as $value)
					<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xóa mỹ phẩm "{{ $value->tenmypham }}"?</p>
				@endforeach
				<a class="btn btn-secondary" href="{{ url('/admin/mypham_thuonghieu/user') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection