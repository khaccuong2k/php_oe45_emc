@extends('client.layouts.master')
@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Cart Section -->
    <div class="container space-2 space-lg-3">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto">
            <i class="fas fa-check-circle text-success fa-5x mb-3"></i>
            <div class="mb-5">
                <h1 class="h2">Your order is completed!</h1>
                <p>Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.</p>
            </div>
            <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="{{ url('/') }}">Continue Shopping</a>
        </div>
    </div>
    <!-- End Cart Section -->
    <!-- Subscribe Section -->
    <div class="bg-light">
        <div class="container space-2">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <!-- Title -->
                    <div class="text-center mb-4">
                        <h2 class="h1">Stay in the know</h2>
                        <p>Get special offers on the latest developments from Front.</p>
                    </div>
                    <!-- End Title -->
                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message w-lg-85 mx-lg-auto">
                        <label class="sr-only" for="subscribeSrEmail">Email address</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control" name="email" id="subscribeSrEmail" placeholder="Email address" aria-label="Email address" aria-describedby="subscribeButton" required
                                data-msg="Please enter a valid email address.">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary px-6" id="subscribeButton">Join</button>
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
