@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.product.detail')</title>
@endsection

@section('css')
<!-- Site favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin-page/vendors/images/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin-page/vendors/images/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-page/vendors/images/favicon-16x16.png') }}">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Google Font -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/fonts/google-font/inter.css') }}">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/core.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/icon-font.min.css') }}">
<!-- Slick Slider css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/slick/slick.css') }}">
<!-- bootstrap-touchspin css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
@endsection

@section('content')
<div class="product-wrap">
    <div class="product-detail-wrap mb-30">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="product-slider slider-arrow">
                    <div class="product-slide">
                        <img src="{{ asset('admin-page/vendors/images/product-img1.jpg') }}" alt="">
                    </div>
                    <div class="product-slide">
                        <img src="{{ asset('admin-page/vendors/images/product-img2.jpg') }}" alt="">
                    </div>
                    <div class="product-slide">
                        <img src="{{ asset('admin-page/vendors/images/product-img3.jpg') }}" alt="">
                    </div>
                    <div class="product-slide">
                        <img src="{{ asset('admin-page/vendors/images/product-img4.jpg') }}" alt="">
                    </div>
                </div>
                <div class="product-slider-nav">
                    <div class="product-slide-nav">
                        <img src="{{ asset('admin-page/vendors/images/product-img1.jpg') }}" alt="">
                    </div>
                    <div class="product-slide-nav">
                        <img src="{{ asset('admin-page/vendors/images/product-img2.jpg') }}" alt="">
                    </div>
                    <div class="product-slide-nav">
                        <img src="{{ asset('admin-page/vendors/images/product-img3.jpg') }}" alt="">
                    </div>
                    <div class="product-slide-nav">
                        <img src="{{ asset('admin-page/vendors/images/product-img4.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="product-detail-desc pd-20 card-box height-100-p">
                    <h4 class="mb-20 pt-20">Gufram Bounce Black</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="price">
                        <del>$55.5</del><ins>$49.5</ins>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- js -->
    <script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('admin-page/src/plugins/slick/slick.min.js') }}"></script>
    <!-- bootstrap-touchspin js -->
    <script src="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('admin-page/js/detail-flugin/detail-flugin.js') }}"></script>
@endsection
