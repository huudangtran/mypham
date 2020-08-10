@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Bình luận</div>
		<div class="card-body">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="15%">Mỹ phẩm</th>
						<th width="15%">User</th>
						<th width="45%">Nội dung</th>
						<th width="10%">Created at</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					
					@foreach($comments as $value)
						
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenmypham }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->comment_content }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/comments/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/comments/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
					<tr class="text-center">
						<td colspan="7">
							{{$comments->links()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection