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

@section('bread-crumb')
<li class="breadcrumb-item"><a href="{{ route('products.index') }}">@lang('lable.title.product.index')</a></li>
<li class="breadcrumb-item active" aria-current="page">@lang('lable.title.product.detail')</li>
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
                    @include('admin.common.message')
                    <h4 class="mb-20 pt-20">@lang('lable.name') : {{ $detailProduct->name }}</h4>
                    <p>@lang('lable.content') : {!! $detailProduct->content !!}</p>
                    <p>@lang('lable.shot_description') : {!! $detailProduct->short_description !!}</p>
                    <p>
                        @lang('lable.views') : {{ $detailProduct->views }}
                        <i class="icon-copy fa fa-eye" aria-hidden="true"></i>
                    </p>
                    <p>
                        @lang('lable.solds') : {{ $detailProduct->sold }}
                        <i class="icon-copy fa fa-send" aria-hidden="true"></i>
                    </p>
                    <p>
                        @lang('lable.votes') : {{ $detailProduct->number_of_vote_submissions/$detailProduct->total_vote }}
                        <i class="icon-copy fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p>
                        @lang('lable.price') : <ins>{{ number_format($detailProduct->price)}}</ins>
                        <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </p>
                    <div class="form-group">
                        <label>@lang('lable.parent_id')</label>
                        <select class="custom-select2 form-control w-100" multiple="multiple" name="parent_id" disabled>
                            @foreach ($detailProduct->categories as $subCategory)
                                <option selected value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row d-flex flex-row-reverse">
                        <form action="{{ route('products.destroy', $detailProduct->id) }}" method="post" class="col-3">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="@lang('lable.action_delete')" class="btn btn-outline-danger">
                        </form>
                        <a href="{{ route('products.edit', $detailProduct->id) }}" class="btn btn-outline-primary">@lang('lable.action_edit')</a>
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
<script src="{{ asset('admin-page/src/scripts/detail-flugin.js') }}"></script>
@endsection
