<!-- Cart Section -->
<div class="container space-2 space-lg-3">
    <div class="w-md-80 w-lg-50 text-center mx-md-auto">
        <figure class="max-w-10rem max-w-sm-15rem mx-auto mb-3">
            <img class="img-fluid" src="{{ asset('customers/assets/svg/illustrations/empty-cart.svg') }}" alt="SVG">
        </figure>
        <div class="mb-5">
            <h1 class="h2">{{ trans('message.cart_empty') }}</h1>
            <p>{{ trans('message.cart_empty_desc') }}</p>
        </div>
        <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="{{ url('/') }}">{{ trans('message.start_shopping') }}</a>
    </div>
</div>
<!-- End Cart Section -->
