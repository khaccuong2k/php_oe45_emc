@extends('client.layouts.master') 

@section('meta-data')
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:type" content="{{ "website" }}" />
<meta property="og:title" content="{{$productData->name}}" />
<meta property="og:description" content="{{$productData->short_description}}" />
<meta property="og:image" content="{{ asset($productData->thumbnail) }}" />
@endsection

@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Hero Section -->
    <div class="container space-top-1 space-top-sm-2">
        <div class="row">
            <div class="col-lg-7 mb-7 mb-lg-0">
                <div class="pr-lg-4">
                    <div class="position-relative">
                        <!-- Main Slider -->
                        <div
                            id="heroSlider"
                            class="js-slick-carousel slick border rounded"
                            data-hs-slick-carousel-options='{
                     "prevArrow": "<span class=\"fas fa-arrow-left slick-arrow slick-arrow-primary-white slick-arrow-left slick-arrow-centered-y shadow-soft rounded-circle ml-n3 ml-sm-2 ml-xl-4\"></span>",
                     "nextArrow": "<span class=\"fas fa-arrow-right slick-arrow slick-arrow-primary-white slick-arrow-right slick-arrow-centered-y shadow-soft rounded-circle mr-n3 mr-sm-2 mr-xl-4\"></span>",
                     "fade": true,
                     "infinite": true,
                     "autoplay": true,
                     "autoplaySpeed": 7000,
                     "asNavFor": "#heroSliderNav"
                   }'
                        >
                            <div class="js-slide">
                                <img class="img-fluid w-100 rounded" src="{{ asset($productData->thumbnail) }}" alt="{{ $productData->name }}" />
                            </div>
                        </div>
                        <!-- End Main Slider -->

                        <!-- Slider Nav -->
                        <div class="position-absolute bottom-0 right-0 left-0 px-4 py-3">
                            <div
                                id="heroSliderNav"
                                class="js-slick-carousel slick slick-gutters-1 slick-transform-off max-w-27rem mx-auto"
                                data-hs-slick-carousel-options='{
                       "infinite": true,
                       "autoplaySpeed": 7000,
                       "slidesToShow": 3,
                       "isThumbs": true,
                       "isThumbsProgress": true,
                       "thumbsProgressOptions": {
                         "color": "#377dff",
                         "width": 8
                       },
                       "thumbsProgressContainer": ".js-slick-thumb-progress",
                       "asNavFor": "#heroSlider"
                     }'
                            >
                                <div class="js-slide p-1">
                                    <a class="js-slick-thumb-progress d-block avatar avatar-circle border p-1" href="javascript:;">
                                        <img class="avatar-img" src="{{ asset($productData->thumbnail) }}" alt="{{ $productData->name }}" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Slider Nav -->
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="col-lg-5">
                <!-- Rating -->
                <div class="d-flex align-items-center small mb-2">
                    <div class="text-warning mr-2">
                        {!! resolveStarsVote($productData->number_of_vote_submissions, $productData->total_vote) !!}
                    </div>
                    <a class="link-underline" href="#reviewSection">{{ trans('message.read_all_review') }}</a>
                </div>
                <!-- End Rating -->

                <!-- Title -->
                <div class="mb-5">
                    <h1 class="h2 info-product" data-id="{{ $productData->id }}">{{ $productData->name }}</h1>
                    <p>{{ $productData->short_description }}</p>
                </div>
                <!-- End Title -->

                <!-- Price -->
                <div class="mb-5">
                    <h2 class="font-size-1 text-body mb-0">Total price:</h2>
                    <span class="text-dark font-size-2 font-weight-bold">{{ $productData->price }} {{ trans('message.currency') }}</span>
                </div>
                <!-- End Price -->

                <!-- Quantity -->
                <div class="border rounded py-2 px-3 mb-3">
                    <div class="js-quantity-counter row align-items-center">
                        <div class="col-7">
                            <small class="d-block text-body font-weight-bold">Select quantity</small>
                            <input class="js-result form-control h-auto border-0 rounded p-0 value-product" type="text" value="1" />
                        </div>
                        <div class="col-5 text-right">
                            <a class="btn btn-xs btn-icon btn-outline-secondary rounded-circle cart-minus-product" href="javascript:;">
                                <i class="fas fa-minus"></i>
                            </a>
                            <a class="btn btn-xs btn-icon btn-outline-secondary rounded-circle cart-plus-product" href="javascript:;">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Quantity -->

                <!-- Accordion -->
                <div id="shopCartAccordion" class="accordion mb-5">
                    <!-- Card -->
                    <div class="card border shadow-none">
                        <div class="card-body card-collapse" id="shopCardHeadingOne">
                            <a class="btn btn-link btn-block card-btn collapsed" href="javascript:;" role="button" data-toggle="collapse" data-target="#shopCardOne" aria-expanded="false" aria-controls="shopCardOne">
                                <span class="row align-items-center">
                                    <span class="col-9">
                                        <span class="media align-items-center">
                                            <span class="w-100 max-w-6rem mr-3">
                                                <img class="img-fluid" src="{{ asset('customers/assets/svg/icons/icon-65.svg') }}" alt="SVG" />
                                            </span>
                                            <span class="media-body">
                                                <span class="d-block font-size-1 font-weight-bold">{{ trans('message.free_shipping') }}</span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="col-3 text-right">
                                        <span class="card-btn-toggle">
                                            <span class="card-btn-toggle-default">&plus;</span>
                                            <span class="card-btn-toggle-active">&minus;</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div id="shopCardOne" class="collapse" aria-labelledby="shopCardHeadingOne" data-parent="#shopCartAccordion">
                            <div class="card-body">
                                <p class="small mb-0">{{ trans('message.free_shipping_desc') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card border shadow-none">
                        <div class="card-body card-collapse" id="shopCardHeadingTwo">
                            <a class="btn btn-link btn-block card-btn collapsed" href="javascript:;" role="button" data-toggle="collapse" data-target="#shopCardTwo" aria-expanded="false" aria-controls="shopCardTwo">
                                <span class="row align-items-center">
                                    <span class="col-9">
                                        <span class="media align-items-center">
                                            <span class="w-100 max-w-6rem mr-3">
                                                <img class="img-fluid" src="{{ asset('customers/assets/svg/icons/icon-64.svg') }}" alt="SVG" />
                                            </span>
                                            <span class="media-body">
                                                <span class="d-block font-size-1 font-weight-bold">{{ trans('message.30_return') }}</span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="col-3 text-right">
                                        <span class="card-btn-toggle">
                                            <span class="card-btn-toggle-default">&plus;</span>
                                            <span class="card-btn-toggle-active">&minus;</span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div id="shopCardTwo" class="collapse" aria-labelledby="shopCardHeadingTwo" data-parent="#shopCartAccordion">
                            <div class="card-body">
                                <p class="small mb-0">{{ trans('message.30_return_desc') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Accordion -->

                <div class="mb-4">
                    <button type="button" class="btn btn-block btn-primary btn-pill transition-3d-hover add-cart-product" data-id="{{ $productData->id }}">Add to Cart</button>
                </div>

                <!-- Help Link -->
                <div class="media align-items-center">
                    <span class="w-100 max-w-6rem mr-2">
                        <img class="img-fluid" src="{{ asset('customers/assets/svg/icons/icon-4.svg') }}" alt="SVG" />
                    </span>
                    <div class="media-body text-body small">
                        <span class="font-weight-bold mr-1">{{ trans('message.need_help') }}</span>
                        <a class="link-underline" href="#">{{ trans('message.chat_now') }}</a>
                    </div>
                </div>
                <!-- End Help Link -->
            </div>
            <!-- End Product Description -->
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Product Description Section -->
    <div class="container space-top-2 space-lg-3">
        <div class="row">
            <div class="col-md-12 mb-5 mb-md-0">
                <div class="pr-lg-4">
                    <h4>Share</h4>
                    <p><div class="fb-share-button"
                        data-href="{{ URL::current() }}"
                        data-layout="button_count"
                        data-size="small"
                        data-mobile-iframe="true">
                     <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">Share</a>
                   </div></p>
                </div>
                <div class="pr-lg-4">
                    <h4>Product Description</h4>
                    <p>{{ $productData->content }}</p>
                </div>
                <div class="pr-lg-4">
                  <h4>Rating Product</h4>
                  <div id="your-rate">
                      @if(Session::get('product.rating'))
                          <div class="text-warning mr-2" id="product-rating">
                            @foreach(Session::get('product.rating') as $ratingProduct)
                                @if($ratingProduct == $productData->id)
                                    {!! resolveStarsVote($productData->number_of_vote_submissions, $productData->total_vote) !!} 
                                    ({{ $productData->total_vote }} {{ trans('message.rating') }})
                                @endif
                            @endforeach
                          </div>
                      @else
                          <div class="text-warning mr-2 unrating" id="product-rating">
                              <i class="far fa-star text-muted" id="one-star" data-star="1"></i>
                              <i class="far fa-star text-muted" id="two-star" data-star="2"></i>
                              <i class="far fa-star text-muted" id="three-star" data-star="3"></i>
                              <i class="far fa-star text-muted" id="four-star" data-star="4"></i>
                              <i class="far fa-star text-muted" id="five-star" data-star="5"></i>
                          </div>
                      @endif
                  </div>
              </div>
            </div>
        </div>
    </div>
    <!-- End Product Description Section -->

    <!-- Related Products Section -->
    <div class="container space-2 space-lg-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-5 mb-md-9">
            <h2>{{ trans('message.related_product') }}</h2>
        </div>
        <!-- End Title -->

        <div
            class="js-slick-carousel slick slick-gutters-3 slick-equal-height"
            data-hs-slick-carousel-options='{
             "slidesToShow": 4,
             "slidesToScroll": 3,
             "infinite": true,
             "responsive": [{
               "breakpoint": 1200,
               "settings": {
                 "slidesToShow": 4
               }
             }, {
               "breakpoint": 992,
               "settings": {
                 "slidesToShow": 3
               }
             }, {
               "breakpoint": 768,
               "settings": {
                 "slidesToShow": 2
               }
             }, {
               "breakpoint": 480,
               "settings": {
                 "slidesToShow": 1
               }
             }]
           }'
        >
            <div class="js-slide">
                <!-- Product -->
                <div class="card border shadow-none text-center w-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('customers/assets/img/300x180/img3.jpg') }}" alt="Image Description" />

                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                            <span class="badge badge-success badge-pill">New arrival</span>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-xs btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-body small font-weight-bold mb-1" href="#">Accessories</a>
                            <span class="d-block font-size-1">
                                <a class="text-body" href="single-product.html">Herschel backpack in dark blue</a>
                            </span>
                            <div class="d-block font-size-1">
                                <span class="text-dark font-weight-bold">$56.99</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <i class="far fa-star text-muted"></i>
                                    <i class="far fa-star text-muted"></i>
                                    <i class="far fa-star text-muted"></i>
                                    <i class="far fa-star text-muted"></i>
                                    <i class="far fa-star text-muted"></i>
                                </div>
                                <span>0</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="js-slide">
                <!-- Product -->
                <div class="card border shadow-none text-center w-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('customers/assets/img/300x180/img1.jpg') }}" alt="Image Description" />
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-xs btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-body small font-weight-bold mb-1" href="#">Clothing</a>
                            <span class="d-block font-size-1">
                                <a class="text-body" href="single-product.html">Front hoodie</a>
                            </span>
                            <div class="d-block">
                                <span class="text-dark font-weight-bold">$91.88</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star text-muted"></i>
                                </div>
                                <span>40</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="js-slide">
                <!-- Product -->
                <div class="card border shadow-none text-center w-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('customers/assets/img/300x180/img4.jpg') }}" alt="Image Description" />

                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                            <span class="badge badge-danger badge-pill">Sold out</span>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-xs btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-body small font-weight-bold mb-1" href="#">Accessories</a>
                            <span class="d-block font-size-1">
                                <a class="text-body" href="single-product.html">Herschel backpack in gray</a>
                            </span>
                            <div class="d-block font-size-1">
                                <span class="text-dark font-weight-bold">$29.99</span>
                                <span class="text-body ml-1"><del>$33.99</del></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star text-muted"></i>
                                    <i class="far fa-star text-muted"></i>
                                </div>
                                <span>125</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="js-slide">
                <!-- Product -->
                <div class="card border shadow-none text-center w-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset('customers/assets/img/300x180/img6.jpg') }}" alt="Image Description" />

                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-xs btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-body small font-weight-bold mb-1" href="#">Clothing</a>
                            <span class="d-block font-size-1">
                                <a class="text-body" href="single-product.html">Front Originals adicolor t-shirt with trefoil logo</a>
                            </span>
                            <div class="d-block">
                                <span class="text-dark font-weight-bold">$38.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span>9</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>
        </div>
    </div>
    <!-- End Related Products Section -->

    <!-- Review Section -->
    <div id="reviewSection" class="container space-bottom-2 space-bottom-lg-3">
        <div class="row">
            <div class="col-lg-4 mb-7 mb-lg-0">
                <div class="border-bottom pb-4 mb-4">
                    <!-- Overall Rating Stats -->
                    <div class="card bg-primary text-white p-4 mb-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="display-4">{{ roundStar($productData->number_of_vote_submissions, $productData->total_vote) }}</span>
                            <div class="ml-3">
                                <div class="small">
                                    {!! resolveStarsVote($productData->number_of_vote_submissions, $productData->total_vote) !!}
                                </div>
                                <span><span class="font-weight-bold">{{ $productData->total_vote }}</span> {{ trans('message.reviews') }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Overall Rating Stats -->
                </div>
            </div>

            <div class="col-lg-8">
              <div class="pt-2 mb-11">
                <div class="mb-4">
                  <h3>{{ count($productData->comments) }} Comments</h3>
                </div>
                @if(count($productData->comments) > 0)
                <ul class="list-unstyled">
                  <!-- Comment -->
                  @foreach($productData->comments as $comments)
                  @if($comments->comment_parent_id === NULL)
                  <li class="mb-5">
                    <div class="media align-items-center mb-2">
                      <div class="avatar avatar-circle mr-3">
                        <img class="avatar-img" src="{{ asset('customers/assets/img/100x100/img3.jpg') }}" alt="Image Description">
                      </div>
                      <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="h5 mb-0">{{ $comments->user->fullname }}</span>
                          <small class="text-muted">{{ $comments->create_at }}</small>
                        </div>
                      </div>
                    </div>
                    <p>{{ $comments->content }}</p>
      
                    <a class="font-weight-bold replyBtn" href="javascript:;" data-id="{{ $comments->id }}" data-user="{{ $comments->user->fullname }}">{{ trans('message.reply') }}</a>
                    @if(count($comments->reply) > 0)
                    <ul class="list-unstyled mt-5">
                    @foreach($comments->reply as $replies)
                        @if($comments->id === $replies->comment_parent_id)
                        @include('client.comments.reply', ['replies' => $replies])
                        @endif
                    @endforeach
                    </ul>
                    @endif
                  </li>
                  @endif
                  @endforeach
                  <!-- End Comment -->
                </ul>
                @else
                <p>{{ trans('message.no_comment') }}</p>
                @endif
              </div>

              @if(Auth::check())
              <div class="mb-5">
                <h3>{{ trans('message.post_review') }}</h3>
              </div>
      
              <!-- Form -->
              <form class="js-validate" action={{ route('client.comment.post', $productData->id) }} method="POST">
                @csrf
                <div class="form-row">
                  <div class="col-12 mb-sm-3">
                    <div class="js-form-message form-group">
                      <a class="font-weight-bold backComment" href="javascript:;">{{ trans('message.back_comment') }}</a>
                      <label class="input-label title-comment" data-mess="{{ trans('message.reply_to') }}">{{ trans('message.comment') }}</label>
                      <input type="hidden" name="comment_parent_id" value="" />
                      <textarea class="form-control" rows="3" placeholder="{{ trans('message.comment') }}" name="content" required></textarea>
                    </div>
                  </div>
                </div>
      
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-wide transition-3d-hover">{{ trans('message.submit') }}</button>
                </div>
              </form>
              <!-- End Form -->
              @endif
            </div>
          </div>
            </div>
        </div>
    </div>
    <!-- End Review Section -->
</main>
<input type="hidden" name="AjaxAddToCartMultiple" value="{{ route('client.ajax.addMultiple') }}" />
<input type="hidden" name="AjaxRating" value="{{ route('client.ajax.rating') }}" />
<!-- ========== END MAIN CONTENT ========== -->

@endsection
