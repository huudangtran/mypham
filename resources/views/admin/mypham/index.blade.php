@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Mỹ phẩm</div>
		<div class="card-body">
			<p><a class="btn btn-primary" href="{{ url('/admin/mypham/create') }}"><i class="fas fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="3%">STT</th>	
						<th width="10%">Loại mỹ phẩm</th>
						<th width="10%">Thương hiệu</th>
						<th width="20%">Tên mỹ phẩm</th>
						<th width="5%">Sản phẩm mới</th>
						<th width="7%">Đơn giá</th>
						<th width="7%">Giá giảm</th>
						<th width="5%">Số lượng</th>
						<th width="10%">Hình ảnh</th>						
						<th width="5%" title="Comment status">CS</th>
						<th width="10%">Created at</th>
						<th width="4%">Sửa</th>
						<th width="4%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					@foreach($mypham as $value)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenloaimypham }}</td>
							<td>{{ $value->tenthuonghieu }}</td>
							<td>{{ $value->tenmypham }}</td>
							<td class="text-center">
								@if($value->sanphammoi == 1)
									<i class="fas fa-check"></i>
								@else
									<i class="fas fa-ban text-danger"></i>
								@endif
							</td>
							<td>{{ $value->dongia}}</td>
							<td>{{ $value->giagiam}}</td>
							<td>{{ $value->soluong}}</td>
							<td><img src="{{url('public/upload/images',$value->hinhanh)}}" style="width:100px;" /></td>							
							
							<td class="text-center">
								@if($value->comment_status == 1)
									<a href="{{ url('/admin/comments/status/' . $value->id) }}"><i class="fas fa-check"></i></a>
								@else
									<a href="{{ url('/admin/comments/status/' . $value->id) }}"><i class="fas fa-ban text-danger"></i></a>
								@endif
							</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/mypham/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ url('/admin/mypham/delete/' . $value->id) }}" ><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
					<tr class="text-center">
						<td colspan="13">
							{{$mypham->links()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection