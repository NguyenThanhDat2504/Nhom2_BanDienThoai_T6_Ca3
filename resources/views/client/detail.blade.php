@extends('partials.layouts.client')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/single_responsive.css') }}">
  <style>
    .book-review_form_rating_item {
      position: relative;
      margin-right: 1.7rem;
    }

    .book-review_form_rating_item:hover i {

      color: #FAC451;
    }

    .book-review_form_rating_item input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
    }

    .book-review_form_rating_item label {
      position: absolute;
      top: 0;
      left: 0;
    }

    .book-review_form_rating_item i {
      font-size: 1.5rem;
      color: #6c757d;
      cursor: pointer;
    }
  </style>
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
                  <li><img src="{{ $product->cover }}" alt="" data-image="{{ $product->cover }}">
                  </li>
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
            <p>Số lượng: {{ $product->quantity }}</p>
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
            <div class="red_button add_to_cart_button w-100 text-white"
              style="opacity: 1; visibility: visible; cursor: pointer;"><a>Thêm vào giỏ hàng</a></div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="tabs_section_container">

    <div class="container">

      {{-- Tab --}}
      <div class="row">
        <div class="col">
          <div class="tabs_container">
            <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
              <li class="tab active" data-active-tab="tab_3"><span>Đánh giá ({{ count($product->reviews) }})</span></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">

          <!-- Tab Reviews -->

          <div id="tab_3" class="tab_container active">
            <div class="row">

              <!-- User Reviews -->

              <div class="col-lg-6 reviews_col">

                <div class="user_review_container d-flex flex-column">

                  @foreach ($product->reviews as $review)
                    <div class="review">
                      <div class="review_date">{{ date_format($review->created_at, 'd/m/Y') }}</div>
                      <div class="user_name mb-0">{{ $review->user->username }}</div>
                      <div class="user_rating">
                        <ul class="star_rating m-0 mb-2">
                          @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= (int) $review->rate)
                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            @else
                              <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            @endif
                          @endfor
                        </ul>
                      </div>
                      <p>{{ $review->content }}</p>
                    </div>
										<hr>
                  @endforeach

                </div>

              </div>

              <!-- Add Review -->

              <div class="col-lg-6 add_review_col">

                <div class="add_review m-0">

                  <form id="review_form" action="{{ route('reviews.store', ['product' => $product->id]) }}"
                    method="POST">
                    @csrf

                    <div class="my-2">
                      <textarea id="review_message" class="input_review" name="content" placeholder="Viết đánh giá" rows="4"></textarea>
                      @error('content')
                        <div style="color: red">{{ $message }}</div>
                      @enderror

                      <div class="my-2 book-review_form_rating d-flex">
                        <div class="book-review_form_rating_item">
                          <input id="reviewAddStar1" name="rate" value="1" type="radio">
                          <label for="reviewAddStar1"><i class="fa fa-star"></i></label>
                        </div>

                        <div class="book-review_form_rating_item">
                          <input id="reviewAddStar2" name="rate" value="2" type="radio">
                          <label for="reviewAddStar2"><i class="fa fa-star"></i></label>
                        </div>

                        <div class="book-review_form_rating_item">
                          <input id="reviewAddStar3" name="rate" value="3" type="radio">
                          <label for="reviewAddStar3"><i class="fa fa-star"></i></label>
                        </div>

                        <div class="book-review_form_rating_item">
                          <input id="reviewAddStar4" name="rate" value="4" type="radio">
                          <label for="reviewAddStar4"><i class="fa fa-star"></i></label>
                        </div>

                        <div class="book-review_form_rating_item">
                          <input id="reviewAddStar5" name="rate" value="5" type="radio">
                          <label for="reviewAddStar5"><i class="fa fa-star"></i></label>
                        </div>

                      </div>
                      @error('rate')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="text-left text-sm-right">
                      <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300">Đánh
                        giá</button>
                    </div>

                  </form>

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
          if (data.status) {
            alert("Thêm sản phẩm vào giỏ hàng thành công");
            window.location.href = '{{ route('client.detail', ['slug' => $product->slug]) }}'
          }
          else {
            alert("Số lượng sản phẩm không đủ");
            window.location.href = '{{ route('client.detail', ['slug' => $product->slug]) }}'
          }
        })


    })


    const createRatingInputs = document.querySelectorAll('.book-review_form_rating input[type=radio]')

    createRatingInputs.forEach(input => {
      input.addEventListener('change', () => {
        const value = input.value

        for (let i = 1; i <= createRatingInputs.length; i++) {
          const inputIcon = createRatingInputs[i - 1].nextElementSibling.firstChild;
          inputIcon.style.color = '#6c757d';
        }

        for (let i = 1; i <= value; i++) {
          const inputIcon = createRatingInputs[i - 1].nextElementSibling.firstChild;
          inputIcon.style.color = '#FAC451';
        }
      })
    })
  </script>
@endpush
