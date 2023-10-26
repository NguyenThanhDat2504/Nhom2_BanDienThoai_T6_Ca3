@extends('partials.layouts.admin')

@section('documentTitle')
  Đơn hàng  {{ $order->code }}
@endsection

@section('pageTitle')
Đơn hàng {{ $order->code }}
@endsection

@section('content')
<div class="card-body">

  <div class="row">

      <div class="col-md-6">
        <div class="form-group">
          <label>Mã đơn hàng</label>
          <p class="form-control">{{ $order->code }}</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Họ tên khách</label>
          <p class="form-control">{{ $order->name }}</p>
        </div>
      </div>

  </div>

  <div class="row">

      <div class="col-md-6">
          <div class="form-group">
              <label>Tổng tiền</label>
              <p class="form-control">{{ number_format($order->total) }} đ</p>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label>Số điện thoại</label>
              <p class="form-control">{{ $order->phone }}</p>
          </div>
      </div>

  </div>

  <div class="row">

      <div class="col-md-6">
          <div class="form-group">
              <label>Ngày tạo</label>
              <p class="form-control">{{ date_format($order->created_at, 'd/m/Y h:m:s') }}</p>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label>Địa chỉ</label>
              <p class="form-control">{{ $order->address }}</p>
          </div>
      </div>
      
  </div>

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label>Trạng thái</label>
              <p class="form-control">{{ $order->orderStatus->title }}</p>
          </div>
      </div>
      <div class="col-md-6">

      </div>
  </div>

  <hr>

  <div class="row">
    <h5><b>Danh sách sản phẩm</b></h5>

      <div class="col-12 mt-3">
        <table class="table table-bordered">
          <thead>

            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($order->products as $product)
              <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td><img src="{{ $product->cover }}" alt="{{ $product->title}}" height="50" width="50"></td>
                  <td>{{ $product->title }}</td>
                  
                  <td>{{ 
                    $product->sale_price > 0 
                      ? number_format($product->sale_price * $product->pivot->quantity) 
                      : number_format($product->price * $product->pivot->quantity)  }} đ</td>

                  <td>{{ $product->pivot->quantity }}</td>
                  <td>{{ number_format($product->sale_price > 0 ? $product->sale_price * $product->pivot->quantity :  $product->price * $product->pivot->quantity  ) }}</td>
              </tr>
                
            @endforeach
          </tbody>
      </table>
      </div>
  </div>
</div>
@endsection
