@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thông tin tài khoản</div>
		<div class="card-body">
			
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">#</th>
						<th width="20%">Name</th>
						<th width="20%">Username</th>
						<th width="20%">Email</th>						
						<th width="5%">Created at</th>						
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ Auth::user()->name }}</td>
							<td>{{ Auth::user()->username }}</td>
							<td>{{Auth::user()->email }}</td>
							
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('d/m/Y H:i:s') }}</td>
							
							<td class="text-center"><a href="{{ url('/taikhoan/edit/' . Auth::user()->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/taikhoan/delete/' . Auth::user()->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					
					
				</tbody>
			</table>
		</div>
	</div>
@endsection