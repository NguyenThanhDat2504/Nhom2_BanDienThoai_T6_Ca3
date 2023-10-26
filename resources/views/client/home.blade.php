@extends('partials.layouts.client')

@section('content')

<!-- Slider -->
<div class="main_slider" style="background-image:url({{asset('frontend/images/slider_1.jpg')}})">
  <div class="container fill_height">
    <div class="row align-items-center fill_height">
      <div class="col">
        <div class="main_slider_content">
          <h6>Spring / Summer Collection 2017</h6>
          <h1>Get up to 30% Off New Arrivals</h1>
          <div class="red_button shop_now_button"><a href="#">shop now</a></div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- New Arrivals -->
<div class="new_arrivals">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="section_title new_arrivals_title">
          <h2>New Arrivals</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col text-center">
        <div class="new_arrivals_sorting">
          <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
            @foreach ($categories as $category)
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".{{$category->title}}">{{ $category->title }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

          @foreach ($arrival_products as $product)
            <a href="{{ route('client.detail', ['slug' => $product->slug]) }}">
              <div class="product-item {{ $product->category->title }}">

                <div class="product discount product_filter">
                  <div class="product_image">
                    <img src="{{ $product->cover }}" alt="{{ $product->title }}">
                  </div>

                  @if ($product->is_sale)
                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center text-white">Sale</div>
                  @endif

                  @if ($product->is_hot)
                    <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>Hot</span></div>
                  @endif

                  <div class="product_info">
                    <h6 class="product_name"><a href="single.html">{{ $product->title }}</a></h6>
                    <div class="product_price">
                      @if($product->sale_price > 0) 
                        {{ number_format($product->sale_price) }}<span>{{ number_format($product->price) }}</span>
                      @else
                        {{ number_format($product->price) }}
                      @endif
                    </div>
                  </div>
                </div>
                <div class="red_button add_to_cart_button"><a href="#">Thêm vào giỏ hàng</a></div>
              </div>
            </a>
          @endforeach
         
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Best Sellers -->
<div class="best_sellers">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="section_title new_arrivals_title">
          <h2>Best Sellers</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="product_slider_container">
          <div class="owl-carousel owl-theme product_slider">

            @foreach ($arrival_products as $product)

              <div class="owl-item product_slider_item">
                <div class="product-item {{ $product->category->title }}">
                  <div class="product discount product_filter">
                    <div class="product_image">
                      <img src="{{ $product->cover }}" alt="{{ $product->title }}">
                    </div>
    
                    @if ($product->is_sale)
                      <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center text-white">Sale</div>
                    @endif
    
                    @if ($product->is_hot)
                      <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                    @endif
                    
                    <div class="product_info">
                      <h6 class="product_name"><a href="single.html">{{ $product->title }}</a></h6>
                      <div class="product_price">
                        @if($product->sale_price > 0) 
                          {{ number_format($product->sale_price) }}<span>{{ number_format($product->price) }}</span>
                        @else
                          {{ number_format($product->price) }}
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="red_button add_to_cart_button"><a href="#">Thêm vào giỏ hàng</a></div>
                </div>
              </div>

            @endforeach

          </div>

          <!-- Slider Navigation -->

          <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
          </div>
          <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
