@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Đặt hàng</div>
		<div class="card-body">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="text-center">
						<th width="5%">#</th>
						<th width="15%">Tên Khách hàng</th>
						<th width="30%">Địa chỉ giao hàng</th>
						<th width="10%">Vận chuyển</th>
						<th width="10%">Thanh toán</th>
						<th width="10%">Tình trạng</th>
						<th width="10%">Ngày đặt</th>
						<th width="10%">Xem chi tiết</th>
						
					</tr>
				</thead>
				<tbody>
					@php $count = 1; @endphp
					
					
						@foreach($donhang as $value)
							@if($value->user_id==Auth::user()->id)
						<tr class="text-center">
							<td>{{ $count++ }}</td>
							<td>{{ $value->tenkhachhang }}</td>
							<td>{{ $value->diachi_giaohang }}</td>
							<td>{{ $value->method_vanchuyen}}</td>
							<td>{{ $value->method_thanhtoan }}</td>
							<td>
								@if($value->tinhtrang == "dathang_thangcong")
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
							<td class="text-center"><a href="{{ route('chitiet', $value->id) }}"><i class="fas fa-info"></i></a></td>
							
						</tr>
						@endif
						@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
@endsection