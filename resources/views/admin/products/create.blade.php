@extends('partials.layouts.admin')

@section('documentTitle')
  Tạo sản phẩm
@endsection

@section('pageTitle')
  Tạo sản phẩm
@endsection


@push('css')
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
  <form action="{{ route('products.store') }}" id="productAddForm" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="row">
      
      {{-- Title --}}
      <div class="my-3 col-sm-6">
        <div class="form-group">
          <label for="productTitle">Tên sản phẩm</label>
          <input type="text" id="productTitle" class="form-control" name="title">
        </div>
      </div>

      {{-- Category --}}
      <div class="my-3 col-sm-6">
        <div class="form-group">
          <label>Danh mục</label>
          <select class="form-control" style="width: 100%;" name="category">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
        </div>
      </div>


      {{-- Quantity --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="quantity">Số lượng</label>
        <input type="number" id="quantity" class="form-control" name="quantity" value="1">
      </div>
      

      {{-- Original Price --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="originalPrice">Giá gốc</label>
        <input type="text" id="originalPrice" class="form-control" name="original_price">
      </div>


      {{-- Price --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="price">Giá bán</label>
        <input type="text" id="price" class="form-control" name="price">
      </div>


      {{-- Sale Price --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="salePrice">Giá khuyến mãi</label>
        <input type="text" id="salePrice" class="form-control" name="sale_price">
      </div>


      {{-- Status --}}
      <div class="my-3 col-sm-12">
        <label>Lựa chọn</label>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="home" name="is_home">
          <label class="custom-control-label" for="home">Hiện lên trang chủ</label>
        </div>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="sale" name="is_sale">
          <label class="custom-control-label" for="sale">Khuyến mãi</label>
        </div>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="hot" name="is_hot">
          <label class="custom-control-label" for="hot">Nổi bật</label>
        </div>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="stop" name="is_stop">
          <label class="custom-control-label" for="stop">Ngừng kinh doanh</label>
        </div>

      </div>


      {{-- image --}}
      <div class="my-3 col-sm-12">
        <label for="">Hình ảnh</label>
        <input type="file" class="form-control" name="cover">
      </div>


      {{-- Description --}}
      <div class="my-3 col-sm-12">
        <label for="description">Mô tả</label>
        <textarea id="description" class="form-control" name="description" rows="5"></textarea>
      </div>


      <button type="submit" class="btn btn-success w-100">Tạo</button>
    </div>


  </form>
 
@endsection

@push('js')
@endpush
