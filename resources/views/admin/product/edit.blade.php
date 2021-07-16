@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.edit', ['name' => 'Product'])</title>
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
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/icon-font.min.css') }}">
<!-- switchery css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/switchery/switchery.min.css') }}">
<!-- bootstrap-tagsinput css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<!-- bootstrap-touchspin css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('products.index') }}">@lang('lable.title.manage', ['name' => 'Products'])</a></li>
<li class="breadcrumb-item active" aria-current="page">@lang('lable.title.edit', ['name' => 'Product'])</li>
@endsection

@section('content')
<!-- horizontal Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">@lang('lable.title.edit', ['name' => 'Product'])</h4>
                @include('admin.common.message')
        </div>
    </div>
    <form action="{{ route('products.update', $detailProduct->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>@lang('lable.name')</label>
            <input class="form-control" type="text" name="name" value="{{ $detailProduct->name }}">
        </div>
        <div class="form-group">
            <label>@lang('lable.content')</label>
            <textarea class="form-control" name="content">{{ $detailProduct->content }}</textarea>
        </div>
        <textarea 
            class="textarea_editor form-control border-radius-0"
            name="short_description">{{ $detailProduct->short_description }}</textarea>
        <div class="row">
            <div class="form-group col-md-6">
                <label>@lang('lable.price')</label>
                <input class="form-control" name="price" value="{{ $detailProduct->price }}" type="number">
            </div>
            <div class="form-group col-md-6">
                <label>@lang('lable.quantity')</label>
                <input class="form-control" name="quantity" value="{{ $detailProduct->quantity }}" type="number">
            </div>
        </div>
        <div class="form-group">
            <label>@lang('lable.parent_id')</label>
            <select class="custom-select2 form-control w-100" name="parent_id[]" multiple="multiple">
                @forelse ($categories as $category)
                    <optgroup label="{{ $category->name }}">
                        @forelse ($category->subCategories as $subCategories)
                            <option
                                @if (in_array($subCategories->id, $listIdCategoryOfThisProduct))selected @endif
                                value="{{ $subCategories->id }}">{{ $subCategories->name }}
                            </option>
                        @empty
                            <option disabled value="">@lang('lable.no_have_value')</option>
                        @endforelse
                    </optgroup>
                @empty
                    <option disabled value="">@lang('lable.no_have_value')</option>
                @endforelse
            </select>
        </div>
        <div class="mt-3" >
            <label>@lang('lable.image')</label>
            <br>
            <input type="file" name="thumbnail[]" id="imgInp">
            <button class="btn btn-outline-success btn-sm" type="button"></i>@lang('lable.action_add_image', ['name' => 'More Image'])</button>
        </div>
        <div class="will-add d-none">
        </div>
        <input type="submit" class="btn btn-primary mt-5" value="@lang('lable.action_edit', ['name' => 'Product'])">
    </form>
    <br><br>
</div>
<!-- horizontal Basic Forms End -->
@endsection

@section('script')
<!-- js -->
<script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
<!-- switchery js -->
<script src="{{ asset('admin-page/src/plugins/switchery/switchery.min.js') }}"></script>
<!-- bootstrap-tagsinput js -->
<script src="{{ asset('admin-page/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- bootstrap-touchspin js -->
<script src="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/advanced-components.js') }}"></script>
<script src="{{ asset('admin-page/src/scripts/edit.js') }}"></script>
@endsection
