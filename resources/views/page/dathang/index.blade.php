@extends('page.master')
@extends('page.header')
@extends('page.footer')
@section('css')
	 <style>
       
       p{
           font-size:15px;
		   color: black;
		   font:bold:
       }
	   
    </style>
@endsection
@section('noidung')
	<div class="card">
		<div class="card-header text-center"style="color:black;font-size:25px;">Đơn đặt hàng</div>
		<div class="card-body">
			<table class="table table-bordered table-hover table-sm">
				<thead>					
					<tr class="text-center">
						<th width="5%" class="text-center">#</th>
						<th width="15%" class="text-center">Tên Khách hàng</th>
						<th width="40%" class="text-center">Địa chỉ giao hàng</th>
						<th width="10%" class="text-center">Vận chuyển</th>
						<th width="10%" class="text-center">Thanh toán</th>
						<th width="10%" class="text-center">Tình trạng</th>
						<th width="10%" class="text-center">Ngày đặt</th>						
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
							
						</tr>
							<tr class="text-center">
								
									<td colspan="7"><h3>Chi tiết đơn hàng</h3>
									<p>Loại mỹ phẩm: {{$value->tenloaimypham}} </p>
									<p>Thương hiệu: {{$value->tenthuonghieu}} </p>
									<p>Tên mỹ phẩm: {{$value->tenmypham}} </p>
									<p> <img src="{{url('public/upload/images',$value->hinhanh)}}" style="width:200px;" /> </p>
										<p>Số lượng: {{ $value->soluong }}</p>
										<p>Đơn Giá: 
											@if($value->giagiam!=0)
												{{number_format($value->dongia)}}đ
											@else
												{{number_format($value->dongia)}}đ
											@endif
										</p>
										<p>Thành tiền: {{number_format($value->tongtien)}}đ </p>
										
									<td>
								
							</tr>
							
						@endif
						@endforeach
							<tr class="text-center">
								<td colspan="7">
									{{$donhang->links()}}
								</td>
							</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection