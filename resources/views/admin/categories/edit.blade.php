@extends('partials.layouts.admin')

@section('documentTitle')
  danh mục
@endsection

@section('pageTitle')
  danh mục - {{ $category->title }}
@endsection

@section('content')
<form action="{{ route('categories.update', ['category' => $category->id]) }}" id="categoryEditForm" method="POST">
  <div class="row">

  @csrf
  @method('PUT')

    {{-- Title --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Tên danh mục</label>
        <input type="text" id="productTitle" class="form-control" name="title" value="{{ $category->title }}">
      </div>
    </div>


    <button type="submit" class="btn btn-success w-100">Tạo</button>

  </div>


</form>
@endsection