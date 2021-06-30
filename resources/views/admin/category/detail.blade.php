@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.category.detail')</title>
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
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
<!-- switchery css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/switchery/switchery.min.css') }}">
<!-- bootstrap-tagsinput css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<!-- bootstrap-touchspin css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/css/all.css') }}">
@endsection

@section('bread-crumb')
<li class="breadcrumb-item"><a href="{{ route('categories.index')}}">@lang('lable.title.category.index')</a></li>
<li class="breadcrumb-item active" aria-current="page">@lang('lable.title.category.detail')</li>
@endsection

@section('content')
<!-- multiple select row Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">@lang('lable.category.detail')</h4>
        @include('admin.common.message')
    </div>
    <div class="pb-20">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">@lang('lable.category.name')</th>
                    <th scope="col">@lang('lable.category.thumbnail')</th>
                    <th scope="col">@lang('lable.category.description')</th>
                    <th scope="col">@lang('lable.action')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $category->name }}</th>
                    <th scope="row"><img src="{{ $category->thumbnail }}" alt="" class="image-custom-setwh"></th>
                    <th scope="row">{{ $category->description }}</th>
                    <th scope="row">
                        {{-- <a href="{{ route('products.index') }}" class="btn btn-outline-info">
                            @lang('lable.category.listProduct')
                        </a> --}}
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('categories.listProduct', $category->id) }}"><i class="dw dw-eye"></i>
                                    @lang('lable.action_view')
                                </a>

                                <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}"><i class="dw dw-edit2"></i>
                                    @lang('lable.action_edit')
                                </a>
                                
                                <form class="dropdown-item" action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <i class="dw dw-delete-3"></i>
                                    <input type="submit" class="btn btn-outline-danger" value="@lang('lable.action_delete')">
                                </form>
                            </div>
                        </div>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- multiple select row Datatable End -->
@endsection

@section('script')
<!-- js -->
<script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
@endsection
