@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.product.edit')</title>
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

@section('content')
<!-- horizontal Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">horizontal Basic Forms</h4>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Text</label>
            <input class="form-control" type="text" name="name" value="">
        </div>
        <div class="form-group">
            <label for="">Thumbnail</label>
            <input type="file" class="form-control-file" name="thumbnail" id="thumbnail" placeholder="" aria-describedby="fileHelpId">
            <img src="#" alt="" id="blah">
        </div>
        <div class="form-group">
            <label>Textarea</label>
            <textarea class="form-control" name="content"></textarea>
        </div>
        <div class="form-group">
            <label>Number</label>
            <input class="form-control" name="price" value="" type="number">
        </div>
        <div class="form-group">
            <label>Number</label>
            <input class="form-control" name="quantity" value="" type="number">
        </div>
        <div class="form-group">
            <label>Multiple Select</label>
            <select class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
                <optgroup label="Alaskan/Hawaiian Time Zone">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                </optgroup>
                <optgroup label="Pacific Time Zone">
                    <option value="CA">California</option>
                    <option value="NV">Nevada</option>
                    <option value="OR">Oregon</option>
                    <option value="WA">Washington</option>
                </optgroup>
                <optgroup label="Mountain Time Zone">
                    <option value="AZ">Arizona</option>
                    <option value="CO">Colorado</option>
                    <option value="ID">Idaho</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NM">New Mexico</option>
                    <option value="ND">North Dakota</option>
                    <option value="UT">Utah</option>
                    <option value="WY">Wyoming</option>
                </optgroup>
            </select>
        </div>
        <textarea class="textarea_editor form-control border-radius-0" name="short_description" placeholder="Enter text ..."></textarea>
        <div class="mt-3" >
            <label>Image</label>
            <br>
            <input type="file" name="image[]" id="imgInp">
            <button class="btn btn-outline-success btn-sm" type="button"></i>Add</button>
        </div>
        <div class="will-add d-none">
        </div>
        <input type="submit" class="btn btn-primary mt-5" value="Edit">
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
