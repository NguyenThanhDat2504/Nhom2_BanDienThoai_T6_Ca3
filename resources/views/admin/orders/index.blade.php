@extends('partials.layouts.admin')

@section('documentTitle')
    Quản lý đơn hàng
@endsection

@section('pageTitle')
    Quản lý đơn hàng
@endsection

@section('content')
	<div class="card-body">
			<table class="table">
					<thead>
							<tr>
									<th>STT</th>
									<th>Mã đơn hàng</th>
									<th>Tên Khách hàng</th>
									<th>SĐT</th>
									<th>Tổng tiền</th>
									<th>Trạng thái</th>
									<th>Ngày tạo</th>
									<th>Lựa chọn</th>
							</tr>
					</thead>

					<tbody>
						@foreach ($orders as $order)
							<tr>
								<form action="{{ route('orders.update', ['order' => $order->id]) }}"  method="POST">
									@method('PUT')
									@csrf

									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $order->code }}</td>
									<td>{{ $order->name }}</td>
									<td>{{ $order->phone }}</td>
									<td>{{ number_format($order->total) }} đ</td>
									<td>
										<select class="form-control" name="status">
											@foreach ($orderStatuses as $status)
													@if ($order->order_status_id == $status->id)
														<option value="{{ $status->id }}" selected>{{ $status->title }}</option>
													@else
														<option value="{{ $status->id }}" >{{ $status->title }}</option>
													@endif
											@endforeach
										</select>
									</td>
									<td>{{ date_format($order->created_at, 'd/m/Y')}}</td>
									<td>
										<button class="btn btn-sm btn-success">Cập nhật</button>
										<a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-sm btn-primary">Chi tiết</a>
									</td>
								</form>
							</tr>
						@endforeach
					</tbody>
			</table>

	</div>

	
@endsection
