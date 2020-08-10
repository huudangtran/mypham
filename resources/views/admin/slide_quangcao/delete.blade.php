@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa thương hiệu</div>
		<div class="card-body">
			<form action="{{ url('/admin/thuonghieu/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $thuonghieu->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xóa thương hiệu "{{ $thuonghieu->tenthuonghieu }}"?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/thuonghieu') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</button>
			</form>
		</div>
	</div>
@endsection