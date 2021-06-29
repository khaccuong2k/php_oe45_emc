@extends('client.layouts.master') @section('content')

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
                    <a class="link-underline" href="#reviewSection">Read all 287 reviews</a>
                </div>
                <!-- End Rating -->

                <!-- Title -->
                <div class="mb-5">
                    <h1 class="h2">{{ $productData->name }}</h1>
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
                                                <span class="d-block font-size-1 font-weight-bold">Free shipping</span>
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
                                <p class="small mb-0">We offer free shipping anywhere in the U.S. A skilled delivery team will bring the boxes into your office.</p>
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
                                                <span class="d-block font-size-1 font-weight-bold">30 Days return</span>
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
                                <p class="small mb-0">If you're not satisfied, return it for a full refund. We'll take care of disassembly and return shipping.</p>
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
                        <span class="font-weight-bold mr-1">Need Help?</span>
                        <a class="link-underline" href="#">Chat now</a>
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
                    <h4>Product Description</h4>
                    <p>{{ $productData->content }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Description Section -->

    <!-- Related Products Section -->
    <div class="container space-2 space-lg-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-5 mb-md-9">
            <h2>Just for you</h2>
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
                            <span class="display-4">4.7</span>
                            <div class="ml-3">
                                <div class="small">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span><span class="font-weight-bold">287</span> reviews</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Overall Rating Stats -->
                </div>

                <span class="d-block display-4 text-dark">77%</span>
                <p class="small">of customers recommend this product</p>
            </div>

            <div class="col-lg-8">
                <div class="pl-lg-4">
                    <!-- Title -->
                    <div class="border-bottom pb-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-body mb-0">Reviewer</h4>
                        </div>
                    </div>
                    <!-- End Title -->

                    <!-- Review -->
                    <div class="border-bottom pb-4 mb-4">
                        <!-- Review Rating -->
                        <div class="d-flex justify-content-between align-items-center text-body font-size-1 mb-3">
                            <h5 class="text-uppercase">Hailey</h5>
                            <span>April 3, 2019</span>
                        </div>
                        <!-- End Review Rating -->
                        <p>I bought this hat for my boyfriend, but then i found out he cheated on me so I kept it and I love it!! I wear it all the time and there is no problem with the fit even though its a “mens” hat.</p>
                        <!-- End Helpful -->
                    </div>
                    <!-- End Review -->

                    <div class="d-sm-flex justify-content-sm-end">
                        <button type="button" class="btn btn-primary btn-pill w-100 w-sm-auto transition-3d-hover px-5 mb-2">Write a Review</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Review Section -->
</main>
<input type="hidden" name="AjaxAddToCartMultiple" value="{{ route('client.ajax.addMultiple') }}" />
<!-- ========== END MAIN CONTENT ========== -->

@endsection
