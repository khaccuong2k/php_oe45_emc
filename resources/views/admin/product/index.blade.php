@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.product.index')</title> 
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
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
@endsection

@section('breadcrumb')
    @if (isset($breadcrumb) && $breadcrumb)
        <li class="breadcrumb-item">
            <a href="{{ route('categories.index') }}">
                @lang('lable.title.category.index')
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">@lang('lable.category.listProduct')</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">@lang('lable.title.product.index')</li>
    @endif
@endsection

@section('content')
<div class="product-wrap">
    <div class="product-list">
        <ul class="row">
            @forelse ($products as $product)
                <li class="col-lg-2 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="producct-img"><img src="{{ $product->thumbnail }}" alt=""></div>
                        <div class="product-caption">
                            <div class="price">
                                <h6><a href="#">{{ $product->name }}</a></h6>
                            </div>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-info">@lang('lable.product.detail')</a>
                        </div>
                    </div>
                </li>
            @empty
                <li class="col-lg-2 col-md-6 col-sm-12">
                    <div class="product-box">
                        <div class="product-caption">
                            <h6>@lang('lable.no_have_value')</h6>
                        </div>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection

@section('script')
<!-- js -->
<script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
@endsection
