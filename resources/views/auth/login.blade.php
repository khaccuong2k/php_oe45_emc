@extends('auth.layouts.authentication')
@section('title', trans('message.title_login'))
@section('content')
<div class="row no-gutters">
    <div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-top-3 space-lg-0">
        <!-- Form -->
        <form class="js-validate" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Title -->
            <div class="mb-5 mb-md-7">
                <h1 class="h2">{{ trans('message.login_welcome') }}</h1>
                <p>{{ trans('message.login_welcome_content') }}</p>
            </div>
            <!-- End Title -->
            <!-- Form Group -->
            <div class="js-form-message form-group">
                <label class="input-label" for="signinSrEmail">{{ trans('message.email_address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- End Form Group -->
            <!-- Form Group -->
            <div class="js-form-message form-group">
                <label class="input-label" for="signinSrPassword" tabindex="0">
                <span class="d-flex justify-content-between align-items-center">
                {{ trans('Password') }}
                <a class="link-underline text-capitalize font-weight-normal" href="recover-account.html">{{ trans('message.forgot_password') }}</a>
                </span>
                </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- End Form Group -->
            <!-- Button -->
            <div class="row align-items-center mb-5">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span class="font-size-1 text-muted">{{ trans('message.dont_have_account') }}</span>
                    <a class="font-size-1 font-weight-bold" href="{{ url('register') }}">{{ trans('message.signup') }}</a>
                </div>
                <div class="col-sm-6 text-sm-right">
                    <button type="submit" class="btn btn-primary btn-sm transition-3d-hover">{{ trans('message.login') }}</button>
                </div>
            </div>
            <!-- End Button -->
        </form>
        <!-- End Form -->
    </div>
</div>
</div>
@endsection
