@extends('partials.layouts.admin')

@section('documentTitle')
  Tạo danh mục
@endsection

@section('pageTitle')
  Tạo danh mục
@endsection

@section('content')
<form action="{{ route('categories.store') }}" id="categoryAddForm" method="POST">
  @csrf

  <div class="row">
    {{-- Title --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Tên danh mục</label>
        <input type="text" id="productTitle" class="form-control" name="title">
      </div>
    </div>

    <button type="submit" class="btn btn-success w-100">Tạo</button>
  </div>


</form>
@endsection