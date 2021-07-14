@extends('client.layouts.master')

@section('content')
 <!-- ========== MAIN CONTENT ========== -->
 <main id="content" role="main">
    <!-- Cart Section -->
    <div class="container space-2 space-lg-3">
      <div class="w-md-80 w-lg-50 text-center mx-md-auto">
        <i class="fas fa-check-circle text-success fa-5x mb-3"></i>
        <div class="mb-5">
          <h1 class="h2">{{ trans('message.order_complete') }}</h1>
          <p>{{ trans('message.order_desc') }}</p>
        </div>
        <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="{{ url('/') }}">{{ trans('message.continue_shopping') }}</a>
      </div>
    </div>
    <!-- End Cart Section -->

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
