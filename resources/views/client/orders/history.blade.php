@extends('client.layouts.master')

@section('content')

  <!-- ========== MAIN ========== -->
  <main id="content" role="main" class="bg-light">
    <!-- Breadcrumb Section -->
    <div class="bg-navy" style="background-image: url({{ asset('customers/assets/svg/components/abstract-shapes-20.svg') }});">
        <div class="container space-1 space-top-lg-2 space-bottom-lg-3">
          <div class="row align-items-center">
            <div class="col">
              <div class="d-none d-lg-block">
                <h1 class="h2 text-white">{{ trans('message.personal_info') }}</h1>
              </div>
  
              <!-- Breadcrumb -->
              <ol class="breadcrumb breadcrumb-light breadcrumb-no-gutter mb-0">
                <li class="breadcrumb-item">{{ trans('message.account') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('message.personal_info') }}</li>
              </ol>
              <!-- End Breadcrumb -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Breadcrumb Section -->
  
      <!-- Content Section -->
      <div class="container space-1 space-top-lg-0 mt-lg-n10">
        <div class="row">
          <div class="col-lg-3">
            <!-- Navbar -->
            <div class="navbar-expand-lg navbar-expand-lg-collapse-block navbar-light">
              <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
                <!-- Card -->
                <div class="card mb-5">
                  <div class="card-body">
                    <!-- Avatar -->
                    <div class="d-none d-lg-block text-center mb-5">
                      <div class="avatar avatar-xxl avatar-circle mb-3">
                        <img class="avatar-img" src="{{ asset($currentUser->avatar) }}" alt="Image Description">
                        <img class="avatar-status avatar-lg-status" src="{{ asset('customers/assets/svg/illustrations/top-vendor.svg') }}" alt="Image Description" data-toggle="tooltip" data-placement="top" title="Verified user">
                      </div>
  
                      <h4 class="card-title">{{ $currentUser->username }}</h4>
                      <p class="card-text font-size-1">{{ $currentUser->email }}</p>
                    </div>
                    <!-- End Avatar -->
  
                    <h6 class="text-cap small">{{ trans('message.account') }}</h6>
  
                    <!-- List -->
                    <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.user.show', $currentUser->id) }}">
                          <i class="fas fa-id-card nav-icon"></i>
                          {{ trans('message.personal_info') }}
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.user.password', $currentUser->id) }}">
                          <i class="fas fa-shield-alt nav-icon"></i>
                          {{ trans('message.security') }}
                        </a>
                      </li>
                    </ul>
                    <!-- End List -->
  
                    <h6 class="text-cap small">{{ trans('message.shopping') }}</h6>
  
                    <!-- List -->
                    <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                      <li class="nav-item">
                        <a class="nav-link active" href="{{ route('client.order.history') }}">
                          <i class="fas fa-shopping-basket nav-icon"></i>
                          {{ trans('message.your_order') }}
                        </a>
                      </li>
                    </ul>
                    <!-- End List -->
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
            <!-- End Navbar -->
          </div>

        <div class="col-lg-9">
          <!-- Card -->
          <div class="card">
            <!-- Header -->
            <div class="card-header">
              <form class="input-group input-group-merge input-group-borderless">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
                <input type="search" class="form-control" placeholder="Search orders" aria-label="Search orders">
              </form>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <!-- Nav -->
              <ul class="nav nav-segment nav-fill mb-5" id="editUserTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="all-orders-tab" data-toggle="tab" href="#all-orders" role="tab">{{ trans('message.orders') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="cenceled-orders-tab" data-toggle="tab" href="#cenceled-orders" role="tab">{{ trans('message.cancel_orders') }}</a>
                </li>
              </ul>
              <!-- End Nav -->

              <!-- Tab Content -->
              <div class="tab-content" id="editUserTabContent">
                <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
                  @if(count($orderData) > 0)
                  <ul class="list-unstyled">
                    <!-- Card -->
                    @foreach($orderData as $order)
                    <li class="card card-bordered mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-3 col-md mb-3 mb-md-0">
                            <small class="text-cap">{{ trans('message.ship_to') }}</small>
                            <small class="text-dark font-weight-bold">{{ $order->user->address }}</small>
                          </div>
                          <div class="col-3 col-md">
                            <small class="text-cap">{{ trans('message.order_no') }}</small>
                            <small class="text-dark font-weight-bold">{{ $order->id }}</small>
                          </div>
                          <div class="col-3 col-md">
                            <small class="text-cap">{{ trans('message.ship_date') }}:</small>
                            <small class="text-dark font-weight-bold">{{ $order->created_at }}</small>
                          </div>
                        </div>
                        <!-- End Row -->

                        <hr>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="row mx-n1">
                            @if (count($order->orderDetail) > 0)
                            @foreach($order->orderDetail as $detail)
                                @foreach($detail->product as $product)
                                  <div class="col-2 px-1">
                                    <a href="{{ route('client.product.show', $product->id) }}">
                                      <img class="img-fluid" src="{{ asset($product->thumbnail) }}" alt="{{ asset($product->name) }}" />
                                    </a>
                                  </div>
                                  @endforeach
                            @endforeach
                            @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                              <a class="btn btn-sm btn-block btn-white mb-2" href="javascript:;">
                                <i class="fab fa-cc-amazon-pay"></i> {{ paymentMethod($order->type_payment) }}
                              </a>
                              <a class="btn btn-sm btn-block btn-white" href="javascript:;">
                                <i class="fas fa-shipping-fast"></i> {{ orderStatus($order->status) }}
                              </a>
                              @if ($order->status == 4)
                              <form action="{{ route('client.order.confirm', $order->id) }}" method="POST">
                              @method('PATCH')
                              @csrf
                              <button type="submit" class="btn btn-sm btn-block btn-primary mt-1" href="#">{{ trans('message.received')}}</a>
                              @endif
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                    <!-- End Card -->
                    {!! $orderData->links() !!}
                  </ul>
                  @else
                  <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
                    <!-- Empty State -->
                    <div class="text-center space-1">
                      <img class="avatar avatar-xl mb-3" src="{{ asset('customers/assets/svg/components/empty-state-no-data.svg') }}" alt="Image Description">
                      <p class="card-text">{{ trans('message.no_data') }}</p>
                      <a class="btn btn-sm btn-white" href="{{ url('/') }}">{{ trans('message.start_shopping') }}</a>
                    </div>
                    <!-- End Empty State -->
                  </div>
                  @endif
                </div>

                <div class="tab-pane fade" id="cenceled-orders" role="tabpanel" aria-labelledby="cenceled-orders-tab">
                  <!-- Empty State -->
                  <div class="text-center space-1">
                    <img class="avatar avatar-xl mb-3" src="{{ asset('customers/assets/svg/components/empty-state-no-data.svg') }}" alt="Image Description">
                    <p class="card-text">No data to show</p>
                    <a class="btn btn-sm btn-white" href="{{ url('/') }}">Start Shopping</a>
                  </div>
                  <!-- End Empty State -->
                </div>
              </div>
              <!-- End Tab Content -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content Section -->
  </main>
  <!-- ========== END MAIN ========== -->

@endsection
