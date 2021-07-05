@extends('client.layouts.master')

@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    @if (Session::has('cart-item-number'))
    <!-- Cart Section -->
    <div class="container space-1 space-md-2">
        <div class="row">
            <div class="col-lg-8 mb-7 mb-lg-0">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-7">
                    <h1 class="h3 mb-0">{{ trans('message.shopping_cart') }}</h1>
                    <span>{{$productsCart->count()}} {{ trans('message.items') }}</span>
                </div>
                <!-- End Title -->
                <form>
                    @foreach($productsCart as $product)
                    <!-- Product Content -->
                    <div class="border-bottom pb-5 mb-5">
                        <div class="media">
                            <div class="max-w-15rem w-100 mr-3">
                                <img class="img-fluid" src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-md-7 mb-3 mb-md-0">
                                        <a class="h5 d-block" href="#">{{ $product->name }}</a>
                                        <div class="d-block d-md-none">
                                            <span class="h5 d-block mb-1">{{ $product->price }}</span>
                                        </div>
                                        @foreach($product->categories as $category)
                                        <div class="text-body font-size-1 mb-1">
                                            <span>{{ $category->name }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-auto">
                                                <select class="custom-select custom-select-sm w-auto mb-3">
                                                    <option value="quantity1">1</option>
                                                    <option value="quantity2">2</option>
                                                    <option value="quantity3">3</option>
                                                    <option value="quantity4">4</option>
                                                    <option value="quantity5">5</option>
                                                    <option value="quantity6">6</option>
                                                    <option value="quantity7">7</option>
                                                    <option value="quantity8">8</option>
                                                    <option value="quantity9">9</option>
                                                    <option value="quantity10">10</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <a class="d-block text-body font-size-1 mb-1" href="javascript:;">
                                                <i class="far fa-trash-alt text-hover-primary mr-1"></i>
                                                <span class="font-size-1 text-hover-primary">{{ trans('message.remove') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 d-none d-md-inline-block text-right">
                                        <span class="h5 d-block mb-1">{{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Content -->
                    @endforeach
                    <div class="d-sm-flex justify-content-end">
                        <a class="font-weight-bold" href="classic.html">
                        <i class="fas fa-angle-left fa-xs mr-1"></i>
                        {{ trans('message.continue_shopping') }}
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="pl-lg-4">
                    <!-- Order Summary -->
                    <div class="card shadow-soft p-4 mb-4">
                        <!-- Title -->
                        <div class="border-bottom pb-4 mb-4">
                            <h2 class="h3 mb-0">{{ trans('message.order_summary') }}</h2>
                        </div>
                        <!-- End Title -->
                        <div class="border-bottom pb-4 mb-4">
                            <div class="media align-items-center mb-3">
                                <span class="d-block font-size-1 mr-3">{{ trans('message.item_subtotal') }}</span>
                                <div class="media-body text-right">
                                    <span class="text-dark font-weight-bold">$73.98</span>
                                </div>
                            </div>
                            <div class="media align-items-center mb-3">
                                <span class="d-block font-size-1 mr-3">{{ trans('message.delivery') }}</span>
                                <div class="media-body text-right">
                                    <span class="text-dark font-weight-bold">{{ trans('message.free') }}</span>
                                </div>
                            </div>
                            <!-- Checkbox -->
                            <div class="card shadow-none mb-3">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio d-flex align-items-center small">
                                        <input type="radio" class="custom-control-input" id="deliveryRadio1" name="deliveryRadio" checked>
                                        <label class="custom-control-label ml-1" for="deliveryRadio1">
                                        <span class="d-block font-size-1 font-weight-bold mb-1">{{ trans('message.free_standard_delivery') }}</span>
                                        <span class="d-block text-muted">{{ trans('message.free_desc') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox -->
                        </div>
                        <div class="media align-items-center mb-3">
                            <span class="d-block font-size-1 mr-3">{{ trans('message.estimated_tax') }}</span>
                            <div class="media-body text-right">
                                <span class="text-dark font-weight-bold">--</span>
                            </div>
                        </div>
                        <div class="media align-items-center mb-3">
                            <span class="d-block font-size-1 mr-3">{{ trans('message.total') }}</span>
                            <div class="media-body text-right">
                                <span class="text-dark font-weight-bold">$73.98</span>
                            </div>
                        </div>
                        <div class="row mx-1">
                            <div class="col px-1 my-1">
                                <a class="btn btn-primary btn-block btn-pill transition-3d-hover btn-sm" href="checkout.html">{{ trans('message.checkout') }}</a>
                            </div>
                            <div class="col px-1 my-1">
                                <button type="submit" class="btn btn-soft-warning btn-block btn-pill transition-3d-hover">
                                <img src="{{ asset('customers/assets/img/logos/paypal.png') }}" width="70" alt="PayPal logo">
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Order Summary -->
                    <!-- Accordion -->
                    <div id="shopCartAccordion" class="accordion card shadow-soft mb-4">
                        <!-- Card -->
                        <div class="card rounded">
                            <div class="card-header card-collapse" id="shopCartHeadingOne">
                                <h3 class="mb-0">
                                    <a class="btn btn-link btn-block card-btn font-weight-bold collapsed" href="javascript:;" role="button"
                                        data-toggle="collapse"
                                        data-target="#shopCartOne"
                                        aria-expanded="false"
                                        aria-controls="shopCartOne">
                                    {{ trans('message.promo_code') }}
                                    <i class="far fa-question-circle text-body ml-1" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" title="Promo code" data-content="Valid on full priced items only. Some products maybe excluded."></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="shopCartOne" class="collapse" aria-labelledby="shopCartHeadingOne" data-parent="#shopCartAccordion">
                                <form class="js-validate p-4">
                                    <div class="input-group input-group-pill mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="{{ trans('message.promo_code') }}" aria-label="{{ trans('message.promo_code') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-block btn-primary btn-pill">{{ trans('message.apply') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Accordion -->
                    <!-- Help Link -->
                    <div class="media align-items-center">
                        <figure class="w-100 max-w-6rem mr-2">
                            <img class="img-fluid" src="{{ asset('customers/assets/svg/icons/icon-4.svg') }}" alt="SVG">
                        </figure>
                        <div class="media-body text-body small">
                            <span class="font-weight-bold mr-1">{{ trans('message.need_help') }}</span>
                            <a class="link-underline" href="#">{{ trans('message.chat_now') }}</a>
                        </div>
                    </div>
                    <!-- End Help Link -->
                </div>
            </div>
        </div>
    </div>
    @else
    @include('client.carts.emptyCart')                                               
    @endif
    <!-- End Cart Section -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
