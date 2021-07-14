@extends('client.layouts.master')

@section('content')

<!-- ========== MAIN ========== -->
<main id="content" role="main">
    <!-- Contact Form Section -->
    <div class="container space-top-3 space-top-lg-4 space-bottom-2">
      <div class="row">
        <div class="col-lg-6 mb-9 mb-lg-0">
          <div class="mb-5">
            <h1>{{ trans('message.get_in_touch') }}</h1>
            <p>{{ trans('message.get_in_touch_desc') }}</p>
          </div>
          @if(Session::has('success') || Session::has('error')) 
          <div class="col">
              <!-- Cookie Alert -->
              <div class="container position-fixed bottom-0 right-0 left-0 z-index-4">
                    <div class="alert bg-white w-lg-80 border shadow-sm mx-auto" role="alert">
                        <h5 class="text-dark">{{ trans('message.notification') }}</h5>
                            <p class="small"><span class="font-weight-bold">{{ trans('message.note') }}:</span>
                                @if (Session::has('success'))
                                    <span class="text-success text-highlight-success font-weight-bold">{{ trans(Session::get('success')) }}</span>
                                @endif
                                @if (Session::has('error'))
                                <span class="text-danger text-highlight-danger font-weight-bold">{{ trans(Session::get('error')) }}</span>
                                @endif
                            </p>
                        <div class="row align-items-sm-center">
                            <div class="col-sm-8 mb-3 mb-sm-0"></div>
                            <div class="col-sm-4 text-sm-right">
                                <button type="button" class="btn btn-sm btn-primary transition-3d-hover" data-dismiss="alert" aria-label="Close">Got it!</button>
                            </div>
                        </div>
                    </div>
              </div>
          <!-- End Cookie Alert -->
          </div>
          @endif
          <!-- Leaflet -->
          <div id="map" class="min-h-300rem mb-5"
               data-hs-leaflet-options='{
                 "map": {
                   "scrollWheelZoom": false,
                   "coords": [37.4040344, -122.0289704]
                 },
                 "marker": [
                   {
                     "coords": [37.4040344, -122.0289704],
                     "icon": {
                       "iconUrl": "{{ asset('customers/assets/svg/components/map-pin.svg') }}",
                       "iconSize": [50, 45]
                     },
                     "popup": {
                       "text": "153 Williamson Plaza, Maggieberg"
                     }
                   }
                 ]
                }'></div>
          <!-- End Leaflet -->

          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <span class="d-block h5 mb-1">{{ trans('message.call_us') }}:</span>
                <span class="d-block text-body font-size-1">+1 (062) 109-9222</span>
              </div>

              <div class="mb-3">
                <span class="d-block h5 mb-1">{{ trans('message.email_us') }}:</span>
                <span class="d-block text-body font-size-1">hello@example.com</span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <span class="d-block h5 mb-1">{{ trans('message.address') }}:</span>
                <span class="d-block text-body font-size-1">153 Williamson Plaza, Maggieberg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="ml-lg-5">
            <!-- Form -->
            <form class="js-validate card shadow-lg mb-4" action="{{ route('client.suggest.handle') }}" method="POST">
                @csrf
              <div class="card-header border-0 bg-light text-center py-4 px-4 px-md-6">
                <h2 class="h4 mb-0">{{ trans('message.general_enquiries')}}</h2>
              </div>

              <div class="card-body p-4 p-md-6">
                <div class="row">
                  <div class="col-sm-12">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="firstName" class="input-label">{{ trans('message.full_name') }}</label>
                      <input type="text" class="form-control" name="firstName" value="{{ Auth::user()->fullname }}" disabled>
                    </div>
                    <!-- End Form Group -->
                  </div>

                  <div class="col-sm-12">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="emailAddress" class="input-label">{{ trans('message.email') }}</label>
                      <input type="email" class="form-control" name="emailAddress" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <!-- End Form Group -->
                  </div>

                  <div class="col-sm-12">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="message" class="input-label">{{ trans('message.message') }}</label>
                      <div class="input-group">
                        <textarea class="form-control" rows="4" name="content"></textarea>
                      </div>
                    </div>
                    <!-- End Form Group -->
                  </div>
                </div>

                <button type="submit" class="btn btn-block btn-primary transition-3d-hover">{{ trans('message.submit') }}</button>
              </div>
            </form>
            <!-- End Form -->

            <div class="text-center">
              <p class="small">We'll get back to you in 1-2 business days.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Contact Form Section -->
  </main>
  <!-- ========== END MAIN ========== -->

@endsection