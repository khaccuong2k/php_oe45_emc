@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.edit', ['name' => 'Category'])</title>
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
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/css/all.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('categories.index')}}">@lang('lable.title.manage', ['name' => 'Categories'])</a></li>
<li class="breadcrumb-item active" aria-current="page">@lang('lable.title.edit', ['name' => 'Category'])</li>
@endsection

@section('content')
<!-- horizontal Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">@lang('lable.title.edit', ['name' => 'Category'])</h4>
        </div>
    </div>
    @include('admin.common.message')
    <form action="{{ route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>@lang('lable.name')</label>
            <input class="form-control" type="text" name="name" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label for="">@lang('lable.thumbnail')</label>
            <input type="file" class="form-control-file" name="thumbnail" aria-describedby="fileHelpId">
            <img src="{{ $category->thumbnail }}" alt="" id="blah" class="image-custom-setwh">
        </div>
        <div class="form-group">
            <label>@lang('lable.description')</label>
            <textarea class="form-control" name="description">{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <label>@lang('lable.parent_id')</label>
            <select class="custom-select2 form-control w-100" multiple="multiple" name="parent_id">
                <option value="">This Is Parent Category</option>
                @foreach ($categories as $subCategory)
                @if ($subCategory->parent_id === null)
                <option
                @if ($category->parent_id === $subCategory->id)selected @endif
                value="{{ $subCategory->id }}">{{ $subCategory->name }}
                </option>
                @endif
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary mt-5" value="@lang('lable.action_edit', ['name' => 'Category'])">
    </form>
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
