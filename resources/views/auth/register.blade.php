@extends('auth.layouts.authentication')
@section('title', trans('message.title_register'))
@section('content')
<!-- Signup Form Section -->
<!-- Signup Form -->
<form class="js-validate card border w-md-85 w-lg-100 mx-md-auto mt-md-0 h-auto" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="card-body p-md-6 mt-10">
        <h2 class="font-size-3 pb-5">{{ trans('message.register') }}</h2>
        <!-- Form Group -->
        <div class="row">
            <div class="col-sm-6">
                <div class="js-form-message form-group">
                    <label for="firstName" class="input-label">{{ trans('message.nickname') }}</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="js-form-message form-group">
                    <label for="lastName" class="input-label">{{ trans('message.full_name') }}</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Lady Gaga" aria-label="Lady Gaga" required
                        data-msg="Please enter last your full name">
                </div>
            </div>
        </div>
        <!-- End Form Group -->
        <!-- Form Group -->
        <div class="row">
            <div class="col-sm-12">
                <div class="js-form-message form-group">
                    <label for="emailAddress" class="input-label">{{ trans('message.email_address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="js-form-message form-group">
                    <label for="password" class="input-label">{{ trans('message.password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <label for="password-confirm" class="input-label">{{ trans('message.confirm_password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <!-- End Form Group -->
        <!-- Form Group -->
        <div class="row">
            <div class="col-sm-6">
                <div class="js-form-message form-group">
                    <label for="phone" class="input-label">{{ trans('message.phone') }}</label>
                    <input type="text" class="form-control" name="phone" placeholder="012-345-6789" aria-label="012-345-6789" required
                        data-msg="Please enter a valid phone number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="js-form-message form-group">
                    <label for="address" class="input-label">{{ trans('message.address') }}</label>
                    <input type="text" class="form-control" name="address" placeholder="12 Nguyen Trai, Hanoi, Vietnam" aria-label="12 Nguyen Trai, Hanoi, Vietnam" required
                        data-msg="Please enter a valid address">
                </div>
            </div>
        </div>
        <!-- End Form Group -->
        <div class="row">
            <div class="col-sm-12 mb-1">
                <label for="password" class="input-label">{{ trans('message.avatar') }}</label>
                <div class="custom-file">
                    <input type="file" class="js-file-attach custom-file-input" name="avatar" id="customFile"
                        data-hs-file-attach-options='{
                        "textTarget": "[for=\"customFile\"]"
                        }'>
                    <label class="custom-file-label" for="customFile">{{ trans('message.choose_file') }}</label>
                </div>
            </div>
        </div>
        <!-- Checkbox -->
        <div class="js-form-message mb-2">
            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                <input type="checkbox" class="custom-control-input" id="termsCheckboxExample1" name="termsCheckboxExample1" required
                    data-msg="Please accept our Terms and Conditions.">
                <label class="custom-control-label" for="termsCheckboxExample1">
                <small>
                {{ trans('message.i_agree') }}
                <a class="link-underline" href="#">{{ trans('message.terms_conditions') }}</a>
                </small>
                </label>
            </div>
        </div>
        <!-- End Checkbox -->
        <div class="row align-items-center">
            <div class="col-sm-7 mb-2 mb-sm-0">
                <p class="font-size-1 text-muted mb-0">{{ trans('message.already_account') }} <a class="font-weight-bold" href="{{ url('login') }}">{{ trans('message.login') }}</a></p>
            </div>
            <div class="col-sm-5 text-sm-right">
                <button type="submit" class="btn btn-sm btn-primary transition-3d-hover">{{ trans('message.sign_up') }} <i class="fa fa-angle-right fa-sm ml-1"></i></button>
            </div>
        </div>
    </div>
</form>
<!-- End Signup Form -->
</div>
<!-- End Signup Form Section -->
@endsection
