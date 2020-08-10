@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Xóa chi tiết chủ đề</div>
		<div class="card-body">
			<form action="{{ url('/admin/chitietchude/delete') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $chitietchude->id }}" />
				<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Bạn có chắc chắn muốn xóa chi tiết chủ đề "{{ $chitietchude->tenchitietchude }}"?</p>
				<a class="btn btn-secondary" href="{{ url('/admin/chitietchude/user') }}"><i class="fas fa-times"></i> Cancel</a>
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
			</form>
		</div>
	</div>
@endsection