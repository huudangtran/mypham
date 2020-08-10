@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Loại mỹ phẩm</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/loaimypham/create') }}"><i class="fas fa-plus"></i> Thêm loại mỹ phẩm</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="35%">Chi tiết chủ Đề</th>
						<th width="40%">Tên Loại Mỹ Phẩm</th>
						<th width="10%">Created at</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($loaimypham as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenchitietchude}}</td>
							<td>{{ $value->tenloaimypham }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/loaimypham/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/loaimypham/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
					<tr class="text-center">
						<td colspan="6">
							{{$loaimypham->links()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
