@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Slide mỹ phẩm</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/slide_mypham/create') }}"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="45%">Mỹ phẩm</th>
						<th width="30%">Hình</th>
						<th width="10%">Created at</th>
						<th width="5%">Edit</th>
						<th width="5%">Delete</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($slide_mypham as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenmypham}}</td>
							<td><img src="{{url('public/upload/images',$value->hinhanh)}}" style="width:100px;" /></td>
							
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/slide_mypham/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/slide_mypham/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
					<tr class="text-center">
						<td colspan="6">
							{{$slide_mypham->links()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
