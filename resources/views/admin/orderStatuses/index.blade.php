@extends('partials.layouts.admin')

@section('documentTitle')
  Quản lý trạng thái đơn hàng
@endsection

@section('pageTitle')
  Quản lý trạng thái đơn hàng
@endsection

@section('content')
<div class="card-body">

  <div>
    <a class="btn btn-sm btn-primary" href="{{ route('orderStatuses.create') }}">Tạo Trạng thái đơn hàng <i class="fa fa-plus"></i></a>
  </div>

  <hr>

  <table id="example1" class="table">

    <thead>
      <tr>
        <th>STT</th>
        <th>Mã trạng thái</th>
        <th>Tên trạng thái</th>
        <th>Lựa chọn</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($orderStatuses as $orderStatus)
        <tr>
          <td>{{ $loop->index + 1}}</td>
          <td>{{ $orderStatus->id }}</td>
          <td>{{ $orderStatus->title }}</td>
          <td>
            <a type="button" class="btn btn-sm btn-success" href="{{ route('orderStatuses.edit', ['orderStatus' => $orderStatus->id]) }}"><i class="fa fa-pen"></i></a>
            <form action="{{ route('orderStatuses.destroy', ['orderStatus' => $orderStatus->id]) }}" method="POST" class="d-inline">
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
        <th>Mã trạng thái</th>
        <th>Tên trạng thái</th>
        <th>Lựa chọn</th>
      </tr>
    </tfoot>

  </table>
</div>
@endsection