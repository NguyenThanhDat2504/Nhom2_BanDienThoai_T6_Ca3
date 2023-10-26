@extends('partials.layouts.client')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/categories_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/categories_responsive.css') }}">
@endpush

@section('content')

  <div class="container product_section_container">
    <div class="row">
      <div class="col product_section clearfix">

        <!-- Breadcrumbs -->

        <div class="d-flex flex-row align-items-center mb-5">
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="sidebar_section">
            <div class="sidebar_title">
              <h5>Danh mục</h5>
            </div>
            <ul class="sidebar_categories">
              @foreach ($categories as $category)
                <li><a href="#">{{ $category->title }}</a></li>
              @endforeach
            </ul>
          </div>

        </div>

        <!-- Main Content -->

        <div class="main_content">

          <!-- Products -->
          <div class="products_iso">

            <div class="row">
              <div class="col">

                <!-- Product Sorting -->

                <div class="product_sorting_container product_sorting_container_top">
                  <ul class="product_sorting">
                    <li>
                      <span class="type_sorting_text">Sắp xếp</span>
                      <i class="fa fa-angle-down"></i>
                      <ul class="sorting_type">
                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Mặc định</span></li>
                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Giá</span></li>
                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Tên sản phẩm</span></li>
                      </ul>
                    </li>
                    <li>
                      <span>Hiện</span>
                      <span class="num_sorting_text">6</span>
                      <i class="fa fa-angle-down"></i>
                      <ul class="sorting_num">
                        <li class="num_sorting_btn"><span>6</span></li>
                        <li class="num_sorting_btn"><span>12</span></li>
                        <li class="num_sorting_btn"><span>24</span></li>
                      </ul>
                    </li>
                  </ul>
                  <div class="pages d-flex flex-row align-items-center">
                    <div class="page_current">
                      <span>1</span>
                      <ul class="page_selection">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                      </ul>
                    </div>
                    <div class="page_total"><span>of</span> 3</div>
                    <div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                  </div>

                </div>

                <!-- Product Grid -->

                <div class="product-grid">

                  @foreach ($products as $product)
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
                    </a>
                  @endforeach

                </div>

                <!-- Product Sorting -->

                <div class="product_sorting_container product_sorting_container_bottom clearfix">
                 
                  <div class="pages d-flex flex-row align-items-center">
                    <div class="page_current">
                      <span>1</span>
                      <ul class="page_selection">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                      </ul>
                    </div>
                    <div class="page_total"><span>of</span> 3</div>
                    <div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                  </div>

                </div>

              </div>
              
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection

@push('js')
  <script src="{{ asset('frontend/js/categories_custom.js') }}"></script>
@endpush
