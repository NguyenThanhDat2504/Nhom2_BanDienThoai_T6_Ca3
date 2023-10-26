@extends('partials.layouts.admin')

@section('documentTitle')
  Sản phẩm - {{ $product->title }}
@endsection

@section('pageTitle')
  Sản phẩm - {{ $product->title }}
@endsection


@push('css')
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
  <form action="{{ route('products.update', ['product' => $product->id]) }}" id="productEditForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">

      {{-- Title --}}
      <div class="my-3 col-sm-6">
        <div class="form-group">
          <label for="productTitle">Tên sản phẩm</label>
          <input type="text" id="productTitle" class="form-control" name="title" value="{{ $product->title }}">
        </div>
      </div>

        {{-- Category --}}
        <div class="my-3 col-sm-6">
          <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" style="width: 100%;" name="category">
              @foreach ($categories as $category)
                @if ($product->category_id == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>

      {{-- Quantity --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="quantity">Số lượng</label>
        <input type="number" id="quantity" class="form-control" name="quantity" value="{{ $product->quantity }}">
      </div>
      
      {{-- Original Price --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="originalPrice">Giá gốc</label>
        <input type="text" id="originalPrice" class="form-control" name="original_price" value="{{ $product->original_price }}">
      </div>

      {{-- Price --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="price">Giá bán</label>
        <input type="text" id="price" class="form-control" name="price" value="{{ $product->price }}">
      </div>

      {{-- Sale Price --}}
      <div class="my-3 col-sm-6 col-md-3">
        <label for="salePrice">Giá khuyến mãi</label>
        <input type="text" id="salePrice" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
      </div>

      {{-- Status --}}
      <div class="my-3 col-sm-12">
        <label>Lựa chọn</label>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="home" name="is_home" {{ $product->is_home ? 'checked' : '' }}>
          <label class="custom-control-label" for="home">Hiện lên trang chủ</label>
        </div>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="sale" name="is_sale" {{ $product->is_sale ? 'checked' : '' }}>
          <label class="custom-control-label" for="sale">Khuyến mãi</label>
        </div>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="hot" name="is_hot" {{ $product->is_hot ? 'checked' : '' }}>
          <label class="custom-control-label" for="hot">Nổi bật</label>
        </div>

        <div class="custom-control custom-switch py-2">
          <input type="checkbox" class="custom-control-input" id="stop" name="is_stop" {{ $product->is_stop ? 'checked' : '' }}>
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
        <textarea id="description" class="form-control" name="description" rows="5">{{ $product->description }}</textarea>
      </div>

      <button type="submit" class="btn btn-success w-100">Cập nhật</button>
    </div>


  </form>
@endsection
