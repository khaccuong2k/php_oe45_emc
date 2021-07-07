@extends('client.layouts.master')

@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    @if (Session::has('cart-item-number') && isset($productsCart))
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
                    <div class="border-bottom pb-5 mb-5 single-cart item-{{ $product->id }}">
                        <div class="media">
                            <div class="max-w-15rem w-100 mr-3">
                                <img class="img-fluid" src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="media-body info-item">
                                <div class="row">
                                    <div class="col-md-7 mb-3 mb-md-0">
                                        <a class="h5 d-block" href="{{ route('client.product.show', $product->id) }}">{{ $product->name }}</a>
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
                                            <!-- Quantity -->
                                            <div class="border rounded py-2 px-3 mb-3">
                                                <div class="row align-items-center">
                                                <div class="col-7 item-quantity">
                                                    <input class="js-result form-control h-auto border-0 rounded p-0 quantity-value" name="itemQuantity" type="text" 
                                                    value="@foreach($brokenProductAndQuantity as $id => $quantity)@if($product->id == $id){{ $quantity }}@endif @endforeach">
                                                </div>
                                                <div class="col-5 text-right inde">
                                                    <a class="btn btn-xs btn-icon btn-outline-secondary rounded-circle cart-minus" data-id="{{ $product->id }}" href="javascript:;">
                                                    <i class="fas fa-minus"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-icon btn-outline-secondary rounded-circle cart-plus" data-id="{{ $product->id }}" href="javascript:;">
                                                    <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- End Quantity -->
                                            <div class="col-auto">
                                                <a class="d-block text-body font-size-1 mb-1 remove-item-cart" data-id="item-{{ $product->id }}" href="javascript:;">
                                                <i class="far fa-trash-alt text-hover-primary mr-1"></i>
                                                <span class="font-size-1 text-hover-primary">{{ trans('message.remove') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 d-none d-md-inline-block text-right price">
                                        <span class="h5 d-block mb-1 item-price">{{ $product->price }}</span>
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
                                    <span class="text-dark font-weight-bold space-price"></span>
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
                                <span class="text-dark font-weight-bold total-price"></span>
                            </div>
                        </div>
                        <div class="row mx-1">
                            <div class="col px-1 my-1">
                                <a class="btn btn-primary btn-block btn-pill transition-3d-hover btn-sm" href="{{ route('client.order.show') }}">{{ trans('message.checkout') }}</a>
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
                                    <i class="far fa-question-circle text-body ml-1" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" title="{{ trans('message.promo_code') }}" data-content="{{ trans('message.valid_coupon') }}"></i>
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
    <input type="hidden" name="AjaxRemoveItem" value="{{ route('client.ajax.remove') }}" />
    <input type="hidden" name="AjaxMinusQuantityItem" value="{{ route('client.ajax.minus_quantity_item') }}" />
    @else
    @include('client.carts.emptyCart')                                               
    @endif
    <!-- End Cart Section -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
