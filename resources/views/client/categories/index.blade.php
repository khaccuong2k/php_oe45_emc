@extends('client.layouts.master')

@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Title Section -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row align-items-sm-center">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h1 class="h4 mb-0 category-title" data-id="{{ $category->id }}">{{ $category->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter justify-content-sm-end mb-0">
                            <li class="breadcrumb-item"><a href="#">{{ trans('message.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('client.category.show', $category->id) }}">{{ $category->name }}</a></li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Title Section -->
    <!-- Products & Filters Section -->
    <div class="container space-top-1 space-top-md-2 space-bottom-2 space-bottom-lg-3">
        <div class="row">
            <div class="col-lg-9">
                <!-- Sorting -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <span class="font-size-1 ml-1">{{ count($products) }} {{ trans('message.products') }}</span>
                    </div>
                    <div class="col-lg-6 align-self-lg-end text-lg-right">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <!-- Select -->
                                <select class="js-custom-select" id="filter-select"
                                    data-hs-select2-options='{
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "btn btn-xs btn-white dropdown-toggle",
                                    "dropdownAutoWidth": true,
                                    "width": "auto"
                                    }'>
                                    <option value="name_a_z" selected>{{ trans('message.a_z') }}</option>
                                    <option value="name_z_a">{{ trans('message.z_a') }}</option>
                                    <option value="newest">{{ trans('message.newest_first') }}</option>
                                    <option value="oldest">{{ trans('message.older') }}</option>
                                    <option value="price_desc">{{ trans('message.price_high_low') }}</option>
                                    <option value="price_asc">{{ trans('message.price_low_high') }}</option>

                                </select>
                                <!-- End Select -->
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Sorting -->
                <!-- Products -->
                <div class="row mx-n2 mb-5 show-product">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4 px-2 px-sm-3 mb-3 mb-sm-5">
                        <!-- Product -->
                        <div class="card border shadow-none text-center h-100">
                            <div class="position-relative">
                                <img class="card-img-top" src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}">
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
                                    @foreach($product->categories as $category)
                                    <a class="d-inline-block text-body small font-weight-bold mb-1" href="{{ route('client.category.show', $category->id) }}">{{ $category->name }}</a>
                                    @endforeach
                                    <span class="d-block font-size-1">
                                    <a class="text-inherit" href="single-product.html">{{ $product->name }}</a>
                                    </span>
                                    <div class="d-block">
                                        <span class="text-dark font-weight-bold">{{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 pb-4 px-4">
                                <div class="mb-3">
                                    <a class="d-inline-flex align-items-center small" href="#">
                                        <div class="text-warning mr-2">
                                            {!! resolveStarsVote($product->number_of_vote_submissions, $product->total_vote) !!}
                                        </div>
                                        <span>{!! roundStar($product->number_of_vote_submissions, $product->total_vote) !!}</span>
                                    </a>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover">{{ trans('message.add_to_cart') }}</button>
                            </div>
                        </div>
                        <!-- End Product -->
                    </div>
                    @endforeach
                </div>
                <!-- End Products -->
                <!-- Pagination -->
                {!! $products->links() !!}
                <!-- End Pagination -->
                <!-- Divider -->
                <div class="d-lg-none">
                    <hr class="my-7 my-sm-11">
                </div>
                <!-- End Divider -->
            </div>
            <!-- Filters -->
            <div class="col-lg-3">
                <form>
                    <input type="hidden" name="ajaxFilterUrl" value="{{ route('client.ajax.filter_product') }}" />
                    <div class="border-bottom pb-4 mb-4">
                        <h4>{{ trans('message.cateogory') }}</h4>
                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="categoryTshirt" checked>
                                <label class="custom-control-label text-lh-lg" for="categoryTshirt">T-shirt</label>
                            </div>
                            <small>73</small>
                        </div>
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseCategory">
                            <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                    <label class="custom-control-label" for="categoryShorts">Shorts</label>
                                </div>
                                <small>5</small>
                            </div>
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
                        <span class="link-collapse-default">{{ trans('message.view_more') }}</span>
                        <span class="link-collapse-active">{{ trans('message.view_less') }}</span>
                        <span class="link-icon ml-1">+</span>
                        </a>
                        <!-- End Link -->
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4>{{ trans('message.rating') }}</h4>
                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="filter-star" class="custom-control-input filter-stars" id="rating0">
                                <label class="custom-control-label" for="rating0">
                                <span class="d-block text-warning">
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                </span>
                                </label>
                            </div>
                            <small>3</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="filter-star" class="custom-control-input filter-stars" id="rating1">
                                <label class="custom-control-label" for="rating1">
                                <span class="d-block text-warning">
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                </span>
                                </label>
                            </div>
                            <small>3</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="filter-star" class="custom-control-input filter-stars" id="rating2">
                                <label class="custom-control-label" for="rating2">
                                <span class="d-block text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                </span>
                                </label>
                            </div>
                            <small>10</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="filter-star" class="custom-control-input filter-stars" id="rating3">
                                <label class="custom-control-label" for="rating3">
                                <span class="d-block text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-muted"></i>
                                <i class="far fa-star text-muted"></i>
                                </span>
                                </label>
                            </div>
                            <small>34</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="filter-star" class="custom-control-input filter-stars" id="rating4">
                                <label class="custom-control-label" for="rating4">
                                <span class="d-block text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-muted"></i>
                                </span>
                                </label>
                            </div>
                            <small>86</small>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="filter-star" class="custom-control-input filter-stars" id="rating5">
                                <label class="custom-control-label" for="rating5">
                                <span class="d-block text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                </span>
                                </label>
                            </div>
                            <small>102</small>
                        </div>
                        <!-- End Checkboxes -->
                    </div>
                    <button type="button" class="btn btn-sm btn-block btn-soft-secondary transition-3d-hover">{{ trans('message.clear_all') }}</button>
                </form>
            </div>
            <!-- End Filters -->
        </div>
    </div>
    <!-- End Products & Filters Section -->
    <!-- Subscribe Section -->
    <div class="bg-light">
        <div class="container space-2">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <!-- Title -->
                    <div class="text-center mb-4">
                        <h2 class="h1">{{ trans('message.stay_in_the_now') }}</h2>
                        <p>{{ trans('message.desc_search') }}</p>
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
