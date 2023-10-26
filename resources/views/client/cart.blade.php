@extends('partials.layouts.client')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_responsive.css') }}">
@endpush

@section('content')
  <div class="container product_section_container">
    <div class="row" style="margin-top: 200px">

      @if (count($cart) > 0)

        <div class="col product_section clearfix">

            <div class="row">
              <table class="table">
                <thead class="text-center">
                    <th>STT</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
            
                    <th style="width:100px;">Số lượng</th>
                    <th>Thành tiền</th>
                    <th style="width:200px;">Lựa chọn</th>
                </thead>
                <tbody>
                  @foreach ($cart as $item)
                    <tr class="text-center">
                      <form action="{{ route('cart.updateCartItem', ['cartItem' => $item->id]) }}" method="POST">
                        @csrf

                        <td>{{ $loop->index + 1 }}</td>
                        <td><img src="{{ $item->product->cover }}" alt="" height="50" width="50"></td>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->product->category->title }}</td>
                        <td>{{ $item->product->sale_price > 0 ? number_format($item->product->sale_price) :  number_format($item->product->price)  }}</td>
                        <td><input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}"/></td>
                        <td>{{ number_format($item->product->sale_price > 0 ? $item->product->sale_price * $item->quantity :  $item->product->price * $item->quantity  ) }}</td>
                        <td>
                          <button type="submit" class="btn btn-sm btn-success btnUpdate">Cập nhật</button>
                          <a href="{{ route('cart.deleteCartItem', ['cartItem' => $item->id]) }}" class="btn btn-sm btn-danger btnDelete">Xóa</a>
                        </td>
                      </form>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <a class="btn red_button w-100 text-white mt-3" href="{{ route('client.checkout') }}">Thanh toán</a>
              
            </div>

        </div>

      @else

        <h1>Không có sản phẩm nào</h1>

      @endif
    </div>
  </div>
@endsection
