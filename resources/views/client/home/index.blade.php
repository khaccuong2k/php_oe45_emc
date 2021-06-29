@extends('client.layouts.master')

@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Hero Section -->
    <div class="position-relative">
        <!-- Main Slider -->
        <div id="heroSlider" class="js-slick-carousel slick slick-equal-height bg-light"
            data-hs-slick-carousel-options='{
            "prevArrow": "<span class=\"fas fa-arrow-left slick-arrow slick-arrow-left slick-arrow-centered-y d-none d-sm-inline-flex shadow-soft rounded-circle ml-sm-2 ml-xl-4\"></span>",
            "nextArrow": "<span class=\"fas fa-arrow-right slick-arrow slick-arrow-right slick-arrow-centered-y d-none d-sm-inline-flex shadow-soft rounded-circle mr-sm-2 mr-xl-4\"></span>",
            "fade": true,
            "infinite": true,
            "autoplaySpeed": 7000,
            "asNavFor": "#heroSliderNav"
            }'>
            @foreach($bestSellerProducts as $bestSellerProduct)
            <!-- Slide -->      
            <div class="js-slide">
                <div class="container space-top-2 space-bottom-3">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="mb-6">
                                <h1 class="display-4 mb-4">{{ $bestSellerProduct->name }}</h1>
                                <p>{{ $bestSellerProduct->short_description }}</p>
                            </div>
                            <a class="btn btn-primary btn-pill transition-3d-hover px-5 mr-2 btn-add-to-cart" data-id="{{ $bestSellerProduct->id }}" href="javascript:">{{ $bestSellerProduct->price }} - {{ trans('message.add_to_cart') }}</a>
                            <a class="btn btn-icon btn-outline-primary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Save for later">
                            <i class="fas fa-heart"></i>
                            </a>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="w-85 mx-auto">
                                <img class="img-fluid" src="{{ asset($bestSellerProduct->thumbnail) }}" alt="{{ $bestSellerProduct->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slide -->
            @endforeach
        </div>
        <!-- End Main Slider -->
        <!-- Slider Nav -->
        <div class="position-absolute bottom-0 w-100">
            <div class="container space-bottom-1">
                <div id="heroSliderNav" class="js-slick-carousel slick slick-transform-off max-w-27rem mx-auto"
                    data-hs-slick-carousel-options='{
                    "infinite": true,
                    "autoplaySpeed": 7000,
                    "slidesToShow": 3,
                    "isThumbs": true,
                    "isThumbsProgressCircle": true,
                    "thumbsProgressOptions": {
                    "color": "#377dff",
                    "width": 8
                    },
                    "thumbsProgressContainer": ".js-slick-thumb-progress",
                    "asNavFor": "#heroSlider"
                    }'>
                    @foreach($bestSellerProducts as $bestSellerProduct)
                    <div class="js-slide p-1">
                        <a class="js-slick-thumb-progress d-block avatar avatar-circle border p-1" href="javascript:;">
                        <img class="avatar-img" src="{{ asset($bestSellerProduct->thumbnail) }}" alt="{{ $bestSellerProduct->name }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Slider Nav -->
    </div>
    <!-- End Hero Section -->

    <!-- Products Section -->
    <div class="container space-2 space-lg-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-5 mb-md-9">
            <h2>{{ trans('message.trending_products') }}</h2>
        </div>
        <!-- End Title -->
        <!-- Products -->
        <div class="row mx-n2 mx-sm-n3 mb-3">
            @foreach($hotTrendProducts as $hotTrendProduct)
            <div class="col-sm-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                <!-- Product -->
                <div class="card border shadow-none text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ asset($hotTrendProduct->thumbnail) }}" alt="Image Description">
                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                            <span class="badge badge-success badge-pill">{{ trans('message.new_arrival') }}</span>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-xs btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                            <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            @foreach($hotTrendProduct->categories as $category)
                            <a class="d-inline-block text-body small font-weight-bold mb-1" href="#">{{ $category->name }}</a>
                            @endforeach
                            <span class="d-block font-size-1">
                            <a class="text-inherit" href="{{ route('client.product.show', $hotTrendProduct->id)}}">{{ $hotTrendProduct->name }}</a>
                            </span>
                            <div class="d-block">
                                <span class="text-dark font-weight-bold">{{ $hotTrendProduct->price }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    {!! resolveStarsVote($hotTrendProduct->number_of_vote_submissions, $hotTrendProduct->total_vote) !!}
                                </div>
                                <span>{!! roundStar($hotTrendProduct->number_of_vote_submissions, $hotTrendProduct->total_vote) !!}</span>
                            </a>
                        </div>
                        <button type="button" data-id="{{ $hotTrendProduct->id }}" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover btn-add-to-cart">{{ trans('message.add_to_cart') }}</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>
            @endforeach
        </div>
        <!-- End Products -->
        <div class="text-center">
            <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="#">{{ trans('message.view_all') }}</a>
        </div>
    </div>
    <!-- End Products Section -->

    @if(count($recentlyViewedProducts) > 0)
    <div class="container space-2 space-lg-3">
      <!-- Title -->
      <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-5 mb-md-9">
          <h2>{{ trans('message.recently_viewed_products') }}</h2>
      </div>
      <!-- End Title -->
      <div class="row mx-n2 mx-sm-n3 mb-3">
          @foreach($recentlyViewedProducts as $recentlyViewedProduct)
          <div class="col-sm-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
              <!-- Product -->
              <div class="card border shadow-none text-center h-100">
                  <div class="position-relative">
                      <img class="card-img-top" src="{{ asset($recentlyViewedProduct->thumbnail) }}" alt="Image Description">
                      <div class="position-absolute top-0 left-0 pt-3 pl-3">
                          <span class="badge badge-success badge-pill">{{ trans('message.new_arrival') }}</span>
                      </div>
                      <div class="position-absolute top-0 right-0 pt-3 pr-3">
                          <button type="button" class="btn btn-xs btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                          <i class="fas fa-heart"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body pt-4 px-4 pb-0">
                      <div class="mb-2">
                          @foreach($recentlyViewedProduct->categories as $category)
                          <a class="d-inline-block text-body small font-weight-bold mb-1" href="#">{{ $category->name }}</a>
                          @endforeach
                          <span class="d-block font-size-1">
                          <a class="text-inherit" href="{{ route('client.product.show', $recentlyViewedProduct->id)}}">{{ $recentlyViewedProduct->name }}</a>
                          </span>
                          <div class="d-block">
                              <span class="text-dark font-weight-bold">{{ $recentlyViewedProduct->price }}</span>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer border-0 pt-0 pb-4 px-4">
                      <div class="mb-3">
                          <a class="d-inline-flex align-items-center small" href="#">
                              <div class="text-warning mr-2">
                                {!! resolveStarsVote($recentlyViewedProduct->number_of_vote_submissions, $recentlyViewedProduct->total_vote) !!}
                              </div>
                              <span>{!! roundStar($recentlyViewedProduct->number_of_vote_submissions, $recentlyViewedProduct->total_vote) !!}</span>
                          </a>
                      </div>
                      <button type="button" data-id="{{ $recentlyViewedProduct->id }}" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover btn-add-to-cart">{{ trans('message.add_to_cart') }}</button>
                  </div>
              </div>
              <!-- End Product -->
          </div>
          @endforeach
      </div>
      <!-- End Products -->
  </div>
  @endif
  <!-- End Products Section -->
    <!-- Subscribe Section -->
    <div class="bg-light">
        <div class="container space-2">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <!-- Title -->
                    <div class="text-center mb-4">
                        <h2 class="h1">{{ trans('message.search_form') }}</h2>
                        <p>{{ trans('message.search_desc') }}</p>
                    </div>
                    <!-- End Title -->
                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message w-lg-85 mx-lg-auto">
                        <label class="sr-only" for="subscribeSrEmail">{{ trans('message.email_address') }}</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control" name="email" id="subscribeSrEmail" placeholder="{{ trans('message.email_address') }}" aria-label="{{ trans('message.email_address') }}" aria-describedby="subscribeButton" required
                                data-msg="{{ trans('message.enter_valid_email') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary px-6" id="subscribeButton">{{ trans('message.join') }}</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Section -->
    <!-- Clients Section -->
    <div class="container space-2">
        <div class="row justify-content-between text-center">
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-3">
                    <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/hollister.svg') }}" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-3">
                    <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/levis.svg') }}" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-3">
                    <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/new-balance.svg') }}" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-3">
                    <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/puma.svg') }}" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-3">
                    <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/nike.svg') }}" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-3">
                    <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/tnf.svg') }}" alt="Image Description">
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Section -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
