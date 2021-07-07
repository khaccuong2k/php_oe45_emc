@extends('client.layouts.master')
@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Checkout Section -->
    <div class="container space-1 space-md-2">
        <div class="row">
            <div class="col-lg-4 order-lg-2 mb-7 mb-lg-0">
                <div class="pl-lg-4">
                    <!-- Order Summary -->
                    <div class="card shadow-soft p-4 mb-4">
                        <!-- Title -->
                        <div class="border-bottom pb-4 mb-4">
                            <h2 class="h3 mb-0">Order summary</h2>
                        </div>
                        <!-- End Title -->
                        @foreach($productsCart as $product)
                        <!-- Product Content -->
                        <div class="border-bottom pb-4 mb-4 single-cart-item">
                            <div class="media">
                                <div class="avatar avatar-lg mr-3">
                                    <img class="avatar-img" src="{{ asset($product->thumbnail) }}" alt="Image Description">
                                    <sup class="avatar-status avatar-primary quantity-single-item">
                                    @foreach($brokenProductAndQuantity as $id => $quantity)
                                    @if($product->id == $id)
                                    {{ $quantity }}
                                    @endif 
                                    @endforeach
                                    </sup>
                                </div>
                                <div class="media-body">
                                    <h2 class="h6">{{ $product->name }}</h2>
                                    <div class="text-body font-size-1">
                                        <span>Price:</span>
                                        <span class="price-single-item">{{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Content -->
                        @endforeach
                        <!-- Fees -->
                        <div class="border-bottom pb-4 mb-4">
                            <div class="media align-items-center mb-3">
                                <span class="d-block font-size-1 mr-3">Item subtotal</span>
                                <div class="media-body text-right">
                                    <span class="text-dark font-weight-bold total-price-checkout"></span>
                                </div>
                            </div>
                            <div class="media align-items-center mb-3">
                                <span class="d-block font-size-1 mr-3">Delivery</span>
                                <div class="media-body text-right">
                                    <span class="text-dark font-weight-bold">Free</span>
                                </div>
                            </div>
                            <!-- Checkbox -->
                            <div class="card shadow-none mb-3">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio d-flex align-items-center small">
                                        <input type="radio" class="custom-control-input" id="deliveryRadio1" name="deliveryRadio" checked>
                                        <label class="custom-control-label ml-1" for="deliveryRadio1">
                                        <span class="d-block font-size-1 font-weight-bold mb-1">Free - Standard delivery</span>
                                        <span class="d-block text-muted">Shipment may take 5-6 business days.</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox -->
                        </div>
                        <!-- End Fees -->
                        <!-- Total -->
                        <div class="media align-items-center">
                            <span class="d-block font-size-1 mr-3">Total</span>
                            <div class="media-body text-right">
                                <span class="text-dark font-weight-bold total">$73.98</span>
                            </div>
                        </div>
                        <!-- End Total -->
                    </div>
                    <!-- End Order Summary -->
                </div>
            </div>
            <div class="col-lg-8 order-lg-1">
                <form class="js-validate" action="{{ route('client.order.handle') }}" method="POST">
                    @csrf
                    <div class="border-bottom pb-2 mb-2">
                        <!-- Title -->
                        <div class="mb-4">
                            <h2 class="h3">Billing address</h2>
                        </div>
                        <!-- End Title -->
                        <!-- Billing Form -->
                        <div class="row">
                            <div class="col-md-12 mb-1 mb-sm-12">
                                <!-- Input -->
                                <div class="js-form-message">
                                    <label class="input-label">{{ trans('message.fullname') }}</label>
                                    <input type="text" class="form-control" name="fullname" value="{{ Auth::user()->fullname }}" disabled>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12 mb-3 mb-sm-12">
                                <!-- Input -->
                                <div class="js-form-message">
                                    <label class="input-label">{{ trans('message.phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" disabled>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-12 mb-3 mb-sm-12">
                                <!-- Input -->
                                <div class="js-form-message">
                                    <label class="input-label">{{ trans('message.address') }}</label>
                                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" disabled>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="w-100"></div>
                        </div>
                        <!-- End Billing Form -->
                    </div>
                    <!-- Payment -->
                    <div class="mb-7">
                        <!-- Title -->
                        <div class="mb-4">
                            <h2 class="h3">Payment method</h2>
                        </div>
                        <!-- End Title -->
                        <!-- Input -->
                        <div class="js-form-message mb-3 mb-sm-6">                
                            <input type="text" class="form-control" name="payment_method" value="Free Shipping" disabled>
                        </div>
                        <!-- End Input -->
                        <!-- Button -->
                    </div>
                    <!-- Button -->
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="font-weight-bold" href="cart.html"><i class="fas fa-angle-left fa-xs mr-1"></i> Return to cart</a>
                        <button type="submit" class="btn btn-primary btn-pill transition-3d-hover">Place order</button>
                    </div>
                    <!-- End Button -->
            </div>
            <!-- End Payment -->
            </form>
        </div>
    </div>
    </div>
    <!-- End Checkout Section -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
