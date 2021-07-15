@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.detail', ['name' => 'Order'])</title>
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
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/sweetalert2/sweetalert2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('orders.index') }}">@lang('lable.title.manage', ['name' => 'Orders'])</a></li>
<li class="breadcrumb-item active">@lang('lable.title.detail', ['name' => 'Order'])</li>
@endsection

@section('content')
<!-- multiple select row Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">@lang('lable.detail', ['name' => 'Order'])</h4>
        @if ($detailOrder->status === config('app.status_confirm'))
        <a href="{{ route('orders.change-status', $detailOrder->id)}}" data-id="{{ $detailOrder->id }}" class="btn btn-outline-primary change-status">
            @lang('lable.go_to_order')
        </a>
        @endif
        @if ($detailOrder->status === config('app.status_delivery'))
        <a href="{{ route('orders.change-status', $detailOrder->id)}}" data-id="{{ $detailOrder->id }}" class="btn btn-outline-primary change-status">
            @lang('lable.go_to_delivery')
        </a>
        @endif
    </div>
    <div class="pb-20">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">@lang('lable.name_atr', ['name' => 'Product'])</th>
                    <th scope="col">@lang('lable.quantity')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detailOrder->orderDetail as $orderDetail)
                <tr>
                    <th scope="row">{{ $orderDetail->product->first()->name }}</th>
                    <th scope="row">{{ $orderDetail->quantity }}</th>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="2" class="text-center">@lang('lable.no_have_value')</th>
                </tr>
                @endforelse
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
<!-- add sweet alert js & css in footer -->
<script src="{{ asset('admin-page/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
<script src="{{ asset('admin-page/src/scripts/ajax-order.js') }}"></script>
@endsection
