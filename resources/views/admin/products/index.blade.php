@extends('partials.layouts.admin')


@section('documentTitle')
  Quản lý sản phẩm
@endsection


@section('pageTitle')
  Quản lý sản phẩm
@endsection


@push('css')
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush


@section('content')

  <div class="card-body">

    <div>
      <a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">Tạo sản phẩm <i class="fa fa-plus"></i></a>
    </div>

    <hr>

    <table id="example1" class="table">
  
      <thead>
        <tr>
          <th>STT</th>
          <th>Mã SP</th>
          <th>Hình ảnh</th>
          <th>Tên SP</th>
          <th>Danh mục</th>
          <th>Giá</th>
          <th>Số lượng</th>
          <th>Home</th>
          <th>Sale</th>
          <th>Hot</th>
          <th>Active</th>
          <th>Lựa chọn</th>
        </tr>
      </thead>
  
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{ $product->id }}</td>
            <td>
              <img src="{{ $product->cover }}" alt="" height="50" width="50">
            </td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->category->title }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
              <i class="fa {{ $product->is_home ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
            </td>
            <td>
              <i class="fa {{ $product->is_sale ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
            </td>
            <td>
              <i class="fa {{ $product->is_hot ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
            </td>
            <td>
              <i class="fa {{ $product->is_stop ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
            </td>
            <td>
              <a type="button" class="btn btn-sm btn-success" href="{{ route('products.edit', ['product' => $product->id]) }}"><i class="fa fa-pen"></i></a>

              <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
              </form>
            </td>
          </tr>
            
        @endforeach
      </tbody>
      
      <tfoot>
        <tr>
          <th>STT</th>
          <th>Mã SP</th>
          <th>Hình ảnh</th>
          <th>Tên SP</th>
          <th>Danh mục</th>
          <th>Giá</th>
          <th>Số lượng</th>
          <th>Home</th>
          <th>Sale</th>
          <th>Hot</th>
          <th>Active</th>
          <th>Lựa chọn</th>
        </tr>
      </tfoot>

    </table>
  </div>

@endsection



@push('js')
  <script src=" {{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src=" {{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src=" {{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src=" {{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src=" {{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

  <script>
    $(function () {

      $("#example1").DataTable({
        "responsive": true, 
        "lengthChange": true, 
        "autoWidth": false,
        "language": {
          lengthMenu: "Hiện _MENU_ sản phẩm",
          search: "Tìm kiếm:",
          info: "",
          paginate: {
            previous: "<",
            next: ">"
          },
        },
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      
    });
  </script>
@endpush
