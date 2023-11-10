@extends('partials.layouts.client')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/categories_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/categories_responsive.css') }}">
@endpush

@section('content')

  <div class="container product_section_container">
    <div class="row">
      <div class="col product_section clearfix">

        <div class="d-flex flex-row align-items-center mb-5">
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="sidebar_section">
            <div class="sidebar_title">
              <h5>Lựa chọn</h5>
            </div>
            <ul class="sidebar_categories">
                <li class="my-2"><a href="{{ route('client.userInfo') }}">Thông tin tài khoản</a></li>
                <li class="my-2"><a href="{{ route('client.getChangePassword') }}">Đổi mật khẩu</a></li>
                <li class="my-2"><a href="{{ route('client.orderList') }}">Đơn hàng</a></li>
            </ul>
          </div>

        </div>


        <!-- Main Content -->
        <div class="main_content">
          <h3 class="mb-4">Đơn hàng</h3>
          
          @foreach ($orders as $order)

            <div class="accordion mb-5" id="accordionExample">
              <div class="card">

                <div class="card-header" id="headingOne">
                  <div class="d-flex justify-content-between align-items-center">

                    <div>
                      <div style="font-size: 1.1rem; font-weight: bold">{{ $order->code }}</div>
                      <div style="font-size: 0.8rem">{{ date_format($order->created_at, 'd/m/Y - H:i:s') }}</div>
                    </div>

                    <div>{{ $order->orderStatus->title }}</div>

                  </div>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    @foreach ($order->products as $product)

                      <div class="d-flex justify-content-between mb-4">

                        <div class="d-flex">
                          <img src="{{ $product->cover }}" alt="" height="60" width="60" class="mr-2">
                          <div>
                            <b>
                              <a href="{{ route('client.detail', ['slug' => $product->slug]) }}" class="text-dark">{{ $product->title }}</a>
                            </b> 
                            X {{ $product->pivot->quantity }}<br>
                            <span>{{ $product->category->title }}</span><br>
                          </div>
                        </div>

                        <div>
                          <b class="mt-3">{{ 
                            $product->sale_price > 0 
                              ? number_format($product->sale_price * $product->pivot->quantity) 
                              : number_format($product->price * $product->pivot->quantity)  }} đ</b>
                        </div>

                      </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between">
                      <b>Tổng tiền</b>
                      <b>{{ number_format($order->total)  }} đ</b>
                    </div>

                  </div>


                </div>
              </div>
            
            </div>

          @endforeach

        </div>

      </div>
    </div>
  </div>

@endsection

@push('js')
  <script src="{{ asset('frontend/js/categories_custom.js') }}"></script>
@endpush
