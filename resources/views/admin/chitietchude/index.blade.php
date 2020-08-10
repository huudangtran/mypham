@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Chi tiết chủ đề</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/chitietchude/create') }}"><i class="fas fa-plus"></i> Thêm chi tiết chủ đề</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="35%">Chủ đề</th>
						<th width="40%">Tên Chi Tiết Chủ đề</th>
						<th width="10%">Created at</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($chitietchude as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenchude}}</td>
							<td>{{ $value->tenchitietchude }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/chitietchude/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/chitietchude/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
						<tr class="text-center">
							<td colspan="6">
								{{$chitietchude->links()}}
							</td>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
