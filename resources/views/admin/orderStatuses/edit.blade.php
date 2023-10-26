@extends('partials.layouts.admin')

@section('documentTitle')
  Trạng thái đợn thái
@endsection

@section('pageTitle')
  Trạng thái - {{ $orderStatus->title }}
@endsection

@section('content')
<form action="{{ route('orderStatuses.update', ['orderStatus' => $orderStatus->id]) }}" id="orderStatusEditForm" method="POST">
  <div class="row">

  @csrf
  @method('PUT')

    {{-- Title --}}
    <div class="my-3 col-sm-12">
      <div class="form-group">
        <label for="productTitle">Tên Trạng thái</label>
        <input type="text" id="productTitle" class="form-control" name="title" value="{{ $orderStatus->title }}">
      </div>
    </div>


    <button type="submit" class="btn btn-success w-100">Tạo</button>

  </div>


</form>
@endsection