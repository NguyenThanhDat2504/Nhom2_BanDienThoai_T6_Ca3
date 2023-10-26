@extends('partials.layouts.client')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_responsive.css') }}">
@endpush

@section('content')

  <div class="container single_product_container">

    <div class="row">
      <div class="col">

        <div class="breadcrumbs d-flex flex-row align-items-center">
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-7">
        <div class="single_product_pics">
          <div class="row">
            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
              <div class="single_product_thumbnails">
                <ul>
                  <li><img src="{{  $product->cover }}" alt="" data-image="{{ $product->cover }}"></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-9 image_col order-lg-2 order-1">
              <div class="single_product_image">
                <div class="single_product_image_background" style="background-image:url({{ $product->cover }})"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
          <div class="product_details">
            <div class="product_details_title">
              <h2>{{ $product->title }}</h2>
              <p>{{ $product->description }}</p>
            </div>
            <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
              <span class="ti-truck"></span><span>Miễn phí ship</span>
            </div>
            @if ($product->sale_price > 0)
              <div class="original_price">{{ number_format($product->price) }}</div>
              <div class="product_price">{{ number_format($product->sale_price) }} VND</div>
            @else
              <div class="product_price mt-5">{{ number_format($product->price) }} VND</div>
            @endif
  
          
            <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
              {{-- <span class="w-50">Số lượng:</span> --}}
              <div class="quantity_selector">
                <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                <span id="quantity_value">1</span>
                <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
              <span id="product_id" style="display: none">{{ $product->id }}</span>
              <div class="red_button add_to_cart_button w-100 text-white" style="opacity: 1; visibility: visible; cursor: pointer;"><a>Thêm vào giỏ hàng</a></div>
            </div>
          </div>
      </div>

    </div>

  </div>

@endsection

@push('js')
  <script src="{{ asset('frontend/js/single_custom.js') }}"></script>
  <script>

    
    const addToCartBtn = document.querySelector('.add_to_cart_button')

    addToCartBtn.addEventListener('click', () => {
      const quantity = document.querySelector('#quantity_value').innerHTML
      const product = document.querySelector('#product_id').innerHTML

      const url = '{{ route('cart.addToCart') }}?product=' + product + '&quantity=' + quantity

      fetch(url)
      .then(res => res.json())
      .then(data => {
        if(data.status) {
          alert("Thêm sản phẩm vào giỏ hàng thành công");
          window.location.href = '{{ route('client.detail', ['slug' => $product->slug]) }}'
        }
      })


    })

  </script>
@endpush