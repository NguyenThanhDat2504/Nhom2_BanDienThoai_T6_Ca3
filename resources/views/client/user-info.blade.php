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

          <form action="{{ route('client.updateUserInfo') }}" method="POST">
            @csrf

            <h3 class="mb-4">Thông tin tài khoản</h3>
  
            <div class="form-group">
              <label>Họ tên khách hàng</label>
              <input type="text" name="name" class="form-control" autocomplete="off" value="{{ $user->username }}" />
              @error('name')
                <div style="color: red">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" name="phone" class="form-control" autocomplete="off" value="{{ $user->phone }}" />
              @error('phone')
                <div style="color: red">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" name="address" class="form-control" autocomplete="off" value="{{ $user->address }}" />
              @error('address')
                <div style="color: red">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" autocomplete="off" value="{{ $user->email }}" readonly style="background: #fff" />
            </div>
            
            <div class="form-group mt-4">
              <button type="submit" class="btn btn-block btn-success" style="cursor: pointer;">Cập nhật</button>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>

@endsection

@push('js')
  <script src="{{ asset('frontend/js/categories_custom.js') }}"></script>
@endpush
