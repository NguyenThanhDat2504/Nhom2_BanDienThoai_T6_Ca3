@extends('partials.layouts.admin')

@section('documentTitle')
Hạng khách hàng - {{ $level->title }}
@endsection

@section('pageTitle')
  Hạng khách hàng - {{ $level->title }}
@endsection

@section('content')
<form action="{{ route('levels.update', ['level' => $level->id]) }}" id="categoryAddForm" method="POST">
  @method('PUT')
  @csrf

  <div class="row">
    {{-- Title --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Loại</label>
        <input type="text" id="productTitle" class="form-control" name="title" value="{{ $level->title }}">
      </div>
    </div>

    {{-- target --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Điểm</label>
        <input type="number" id="productTitle" class="form-control" name="target" value="{{ $level->target }}">
      </div>
    </div>


    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Giảm giá (%)</label>
        <input type="number" id="productTitle" class="form-control" name="discount" value="{{ $level->discount * 100}}">
      </div>
    </div>

    <button type="submit" class="btn btn-success w-100">Cập nhật</button>
  </div>


</form>
@endsection