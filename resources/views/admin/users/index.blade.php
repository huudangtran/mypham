@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Người dùng</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/users/create') }}"><i class="fas fa-plus"></i>Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="20%">Tên</th>
						<th width="15%">Tên đăng nhập</th>
						<th width="20%">Email</th>
						<th width="10%">Quyền</th>
						<th width="15%">Created at</th>
						<th width="5%">Status</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($users as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->username }}</td>
							<td>{{ $value->email }}</td>
							<td>
								@if($value->privilege == "admin")
									<span class="badge badge-primary">Administrator</span>
								@else
									<span class="badge badge-secondary">User</span>
								@endif
							</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center">
								@if($value->user_status == 1)
									<a href="{{ url('/admin/users/status/' . $value->id) }}"><i class="fas fa-check"></i></a>
								@else
									<a href="{{ url('/admin/users/status/' . $value->id) }}"><i class="fas fa-ban text-danger"></i></a>
								@endif
							</td>
							<td class="text-center"><a href="{{ url('/admin/users/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/users/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
					<tr class="text-center">
						<td colspan="9">
							{{$users->links()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection