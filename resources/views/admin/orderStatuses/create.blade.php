@extends('partials.layouts.admin')

@section('documentTitle')
  Tạo trạng thái đơn hàng
@endsection

@section('pageTitle')
  Tạo trạng thái đơn hàng
@endsection

@section('content')
<form action="{{ route('orderStatuses.store') }}" id="categoryAddForm" method="POST">
  @csrf

  <div class="row">
    {{-- Title --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Tên trạng thái đơn hàng</label>
        <input type="text" id="productTitle" class="form-control" name="title">
      </div>
    </div>

    <button type="submit" class="btn btn-success w-100">Tạo</button>
  </div>


</form>
@endsection