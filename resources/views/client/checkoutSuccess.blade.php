@extends('partials.layouts.client')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_responsive.css') }}">
@endpush

@section('content')
  <div class="container product_section_container">

    <div class="row" style="margin-top: 200px">
        <h1>Success</h1>
    </div>

  </div>
@endsection
