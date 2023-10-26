@extends('partials.layouts.admin')

@section('documentTitle')
  Quản lý danh mục
@endsection

@section('pageTitle')
  Quản lý danh mục
@endsection

@section('content')
<div class="card-body">

  <div>
    <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}">Tạo danh mục <i class="fa fa-plus"></i></a>
  </div>

  <hr>

  <table id="example1" class="table">

    <thead>
      <tr>
        <th>STT</th>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Số lượng sản phẩm</th>
        <th>Lựa chọn</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->index + 1}}</td>
          <td>{{ $category->id }}</td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->products->count() }}</td>
          <td>
            <a type="button" class="btn btn-sm btn-success" href="{{ route('categories.edit', ['category' => $category->id]) }}"><i class="fa fa-pen"></i></a>
            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
    
    <tfoot>
      <tr>
        <th>STT</th>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Số lượng sản phẩm</th>
        <th>Lựa chọn</th>
      </tr>
    </tfoot>

  </table>
</div>
@endsection