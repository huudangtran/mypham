@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Đơn hàng</div>
		<div class="card-body">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">STT</th>
						<th width="15%">Khách hàng</th>
						<th width="30%">Địa chỉ giao hàng</th>
						<th width="10%">Vận chuyển</th>
						<th width="10%">Thanh toán</th>
						<th width="10%">Tình trạng</th>
						<th width="10%">Created at</th>
						<th width="10%">Edit</th>
						
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					
					@foreach($dathang as $value)
						
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenkhachhang }}</td>
							<td>{{ $value->diachi_giaohang }}</td>
							<td>{{ $value->method_vanchuyen}}</td>
							<td>{{ $value->method_thanhtoan }}</td>
							<td>
								@if($value->tinhtrang == "0")
									<span class="badge badge-primary">Đặt hàng thành công</span>
								@else
									@if($value->tinhtrang == "dang_vanchuyen")
										<span class="badge badge-primary">Đang vận chuyển</span>
										@else
										<span class="badge badge-secondary">Đã nhận</span>
									@endif		
									
								@endif
							</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</td>
							<td class="text-center"><a href="{{ url('/admin/dathang/edit/' . $value->id) }}"><i class="fas fa-edit"></i></a></td>
							
						</tr>
						
					@endforeach
					
					<tr class="text-center">
						<td colspan="8">
							{{$dathang->links()}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection