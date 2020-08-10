@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Mỹ phẩm thương hiệu</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/mypham_thuonghieu/create') }}"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>	
						<th width="30%">Thương hiệu</th>
						<th width="35%">Mỹ phẩm</th>
						<th width="10%">Created at</th>
						<th width="10%">Sửa</th>
						<th width="10%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($mypham_thuonghieu as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenthuonghieu }}</td>
							<td>{{ $value->tenmypham }}</td>							
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/mypham_thuonghieu/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/mypham_thuonghieu/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection