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
                @if (Session::has('success') || Session::has('error')) 
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
                                        <a class="nav-link active" href="{{ route('client.user.show', $currentUser->id) }}">
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
                                        <a class="nav-link" href="">
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
                <div class="card mb-3 mb-lg-5">
                    <div class="card-header">
                        <h5 class="card-title">{{ trans('message.basic_info') }}</h5>
                    </div>
                    <!-- Body -->
                    <div class="card-body">
                        <form action="{{ route('client.user.update', $currentUser->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">{{ trans('message.avatar') }}</label>
                                <div class="col-sm-9">
                                    <div class="media align-items-center">
                                        <label class="avatar avatar-xl avatar-circle mr-4" for="avatarUploader">
                                        <img id="avatarImg" class="avatar-img" src="{{ asset($currentUser->avatar) }}" alt="Image Description">
                                        </label>
                                        <div class="media-body">
                                            <div class="btn btn-sm btn-primary file-attachment-btn mb-2 mb-sm-0 mr-2">{{ trans('message.upload_photo') }}
                                                <input type="file" name="avatar" class="js-file-attach file-attachment-btn-label" id="avatarUploader"
                                                    data-hs-file-attach-options='{
                                                    "textTarget": "#avatarImg",
                                                    "mode": "image",
                                                    "targetAttr": "src"
                                                    }'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">{{ trans('message.fullname') }} <i class="far fa-question-circle text-body ml-1" data-toggle="tooltip" data-placement="top" title="Displayed on public forums, such as Front."></i></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="fullname" id="firstNameLabel" placeholder="{{ $currentUser->fullname }}" aria-label="{{ $currentUser->fullname }}" value="{{ $currentUser->fullname }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="emailLabel" class="col-sm-3 col-form-label input-label">{{ trans('message.email') }}</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="clarice@example.com" value="{{ $currentUser->email }}">
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="phoneLabel" class="col-sm-3 col-form-label input-label">{{ trans('message.phone') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" id="phonelLabel" placeholder="0123-456-789" aria-label="0123-456-789" value="{{ $currentUser->phone }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="addressLabel" class="col-sm-3 col-form-label input-label">{{ trans('message.address') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" id="addresslLabel" placeholder="{{ trans('message.address') }}" aria-label="{{ trans('message.address') }}" value="{{ $currentUser->address }}">
                                </div>
                            </div>
                            <!-- End Form Group -->
                    </div>
                    <!-- End Body -->
                    <!-- Footer -->
                    <div class="card-footer d-flex justify-content-end">
                    <a class="btn btn-white" href="javascript:;">{{ trans('message.cancel') }}</a>
                    <span class="mx-2"></span>
                    <button type="submit" class="btn btn-primary">{{ trans('message.save_change') }}</button>
                    </div>
                    <!-- End Footer -->
                    </form>
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
