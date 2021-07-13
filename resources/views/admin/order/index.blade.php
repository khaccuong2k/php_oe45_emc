@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.manage', ['name' => 'Orders'])</title>
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
<li class="breadcrumb-item active">@lang('lable.title.manage', ['name' => 'Orders'])</li>
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <h5 class="h4 text-blue mb-20">@lang('lable.title.manage', ['name' => 'Orders'])</h5>
            <div class="tab">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home2" role="tab" aria-selected="true">@lang('lable.order_confirmation')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">@lang('lable.delivery')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact2" role="tab" aria-selected="false">@lang('lable.ordered')</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home2" role="tabpanel">
                        <!-- multiple select row Datatable start -->
                        <div class="card-box mb-30">
                            <div class="pb-20">
                                <table class="table hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>@lang('lable.user_order')</th>
                                            <th>@lang('lable.type_payment')</th>
                                            <th>@lang('lable.detail', ['name' => 'Order'])</th>
                                            <th>@lang('lable.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $key => $order)
                                            @if ($order->status === config('app.status_confirm'))
                                            <tr>
                                                <td class="table-plus">{{ $order->user->fullname }}</td>
                                                <td>
                                                    @if ($order->type_payment === config('app.payment_on_delivery'))
                                                    @lang('lable.payment_on_delivery')
                                                    @else
                                                    @lang('lable.payment_online')
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info">
                                                        @lang('lable.detail', ['name' => 'Order'])
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('orders.change-status', $order->id)}}" data-id="{{ $order->id }}" class="btn btn-outline-primary change-status">
                                                        @lang('lable.go_to_order')
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                        <tr>
                                            <td class="table-plus text-center" colspan="2">
                                                @lang('lable.no_have_value')
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- multiple select row Datatable End -->
                    </div>
                    <div class="tab-pane fade" id="profile2" role="tabpanel">
                        <!-- multiple select row Datatable start -->
                        <div class="card-box mb-30">
                            <div class="pb-20">
                                <table class="table hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>@lang('lable.user_order')</th>
                                            <th>@lang('lable.detail', ['name' => 'Order'])</th>
                                            <th>@lang('lable.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            @if ($order->status === config('app.status_delivery'))
                                            <tr>
                                                <td class="table-plus">{{ $order->user->fullname }}</td>
                                                <td>
                                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info">
                                                        @lang('lable.detail', ['name' => 'Order'])
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('orders.change-status', $order->id)}}" data-id="{{ $order->id }}" class="btn btn-outline-primary change-status">
                                                        @lang('lable.go_to_delivery')
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                        <tr>
                                            <td class="table-plus text-align" colspan="2">
                                                @lang('lable.no_have_value')
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- multiple select row Datatable End -->
                    </div>
                    <div class="tab-pane fade" id="contact2" role="tabpanel">
                        <div class="card-box mb-30">
                            <div class="pb-20">
                                <table class="table hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>@lang('lable.user_order')</th>
                                            <th>@lang('lable.detail', ['name' => 'Order'])</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            @if ($order->status === config('app.status_done'))
                                                <tr>
                                                    <td class="table-plus">{{ $order->user->fullname }}</td>
                                                    <td>
                                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info">
                                                            @lang('lable.detail', ['name' => 'Order'])
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                        <tr>
                                            <td class="table-plus text-align" colspan="2">
                                                @lang('lable.no_have_value')
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<!-- switchery js -->
<script src="{{ asset('admin-page/src/plugins/switchery/switchery.min.js') }}"></script>
<!-- bootstrap-tagsinput js -->
<script src="{{ asset('admin-page/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- bootstrap-touchspin js -->
<script src="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/advanced-components.js') }}"></script>
<!-- add sweet alert js & css in footer -->
<script src="{{ asset('admin-page/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
<script src="{{ asset('admin-page/src/scripts/ajax-order.js') }}"></script>
@endsection
