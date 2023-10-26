@extends('partials.layouts.admin')

@section('documentTitle')
  Quản lý hạng khách hàng
@endsection

@section('pageTitle')
  Quản lý hạng khách hàng
@endsection

@section('content')
<div class="card-body">

  <div>
    <a class="btn btn-sm btn-primary" href="{{ route('levels.create') }}">Tạo hạng khách hàng <i class="fa fa-plus"></i></a>
  </div>

  <hr>

  <table id="example1" class="table">

    <thead>
      <tr>
        <th>STT</th>
        <th>Loại</th>
        <th>Điểm</th>
        <th>Giảm giá</th>
        <th>Lựa chọn</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($levels as $level)
        <tr>
          <td>{{ $loop->index + 1}}</td>
          <td>{{ $level->title }}</td>
          <td>{{ $level->target }}</td>
          <td>{{ $level->discount * 100 }} %</td>
          <td>
            <a type="button" class="btn btn-sm btn-success" href="{{ route('levels.edit', ['level' => $level->id]) }}"><i class="fa fa-pen"></i></a>
            <form action="{{ route('levels.destroy', ['level' => $level->id]) }}" method="POST" class="d-inline">
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
        <th>Loại</th>
        <th>Điểm</th>
        <th>Giảm giá</th>
        <th>Lựa chọn</th>
      </tr>
    </tfoot>

  </table>
</div>
@endsection