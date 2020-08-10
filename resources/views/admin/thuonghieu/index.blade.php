@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thương hiệu</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/thuonghieu/create') }}"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="60%">Thương hiệu</th>
						<th width="10%">Hình ảnh</th>
						<th width="15%">Created at</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($thuonghieu as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenthuonghieu }}</td>
							<td><img src="{{url('public/upload/images',$value->hinhanh)}}" style="width:100px;" /></td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/thuonghieu/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/thuonghieu/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
				<tr class="text-center">
						<td colspan="6">
							{{$thuonghieu->links()}}
						</td>
					</tr>
			</table>
		</div>
	</div>
@endsection