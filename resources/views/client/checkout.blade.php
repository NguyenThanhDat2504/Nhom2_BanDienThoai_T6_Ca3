@extends('partials.layouts.client')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_responsive.css') }}">
@endpush

@section('content')
  <div class="container product_section_container">

    <div class="row" style="margin-top: 200px">

      <div class="col product_section clearfix">

        <form action="{{ route('checkout.store') }}" method="POST">
          @csrf

          <div class="row">

            <div class="col-md-8">
              <h3>Thông tin khách hàng</h3>

              <div class="form-group">
                <label>Họ tên khách hàng</label>
                <input type="text" name="name" class="form-control" autocomplete="off" value="{{ $user->username }}"
                  readonly style="background: #fff" />
              </div>

              <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" class="form-control" autocomplete="off"
                  value="{{ $user->phone }}" />
                @error('phone')
                  <div style="color: red">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" autocomplete="off"
                  value="{{ $user->address }}" />
                @error('address')
                  <div style="color: red">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" autocomplete="off" value="{{ $user->email }}"
                  readonly style="background: #fff" />
              </div>

              <div class="form-group mt-4">
                <button type="submit" class="btn btn-block btn-success" style="cursor: pointer;">Đặt hàng</button>
              </div>

            </div>


            <div class="col-md-4">

              <h3>Giỏ hàng</h3>

              <div style="border:1px solid #808080;">
                <table class="table">
                  @foreach ($cart as $item)
                    <tr>
                      <td><b>{{ $item->product->title }}</b> x {{ $item->quantity }}</td>
                      <td class="text-right">
                        {{ number_format($item->product->sale_price > 0 ? $item->product->sale_price * $item->quantity : $item->product->price * $item->quantity) }}
                      </td>
                    </tr>
                  @endforeach

                  <tr>
                    <td><b>Giảm giá</b></td>
                    <td class="text-right">{{ $userLevel ? $userLevel->discount * 100 : 0 }}%</td>
                  </tr>
                  <tr>
                    <td><b>Tổng tiền</b></td>
                    <td class="text-right">{{ number_format($totalPrice) }}</td>
                  </tr>
                </table>
              </div>

            </div>


          </div>

        </form>

      </div>
    </div>

  </div>
@endsection
