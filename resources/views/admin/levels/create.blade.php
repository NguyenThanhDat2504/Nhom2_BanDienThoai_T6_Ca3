@extends('partials.layouts.admin')

@section('documentTitle')
  Tạo hạng khách hàng
@endsection

@section('pageTitle')
  Tạo hạng khách hàng
@endsection

@section('content')
<form action="{{ route('levels.store') }}" id="categoryAddForm" method="POST">
  @csrf

  <div class="row">
    {{-- Title --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Loại</label>
        <input type="text" id="productTitle" class="form-control" name="title">
      </div>
    </div>

    {{-- target --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Điểm</label>
        <input type="number" id="productTitle" class="form-control" name="target">
      </div>
    </div>


    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Giảm giá</label>
        <input type="number" id="productTitle" class="form-control" name="discount">
      </div>
    </div>

    <button type="submit" class="btn btn-success w-100">Tạo</button>
  </div>


</form>
@endsection