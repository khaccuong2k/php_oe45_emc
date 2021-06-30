@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.category.index')</title>
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
@endsection

@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">@lang('lable.category.list')</h4>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">@lang('lable.category.name')</th>
                    <th>@lang('lable.category.thumbnail')</th>
                    <th class="datatable-nosort">@lang('lable.action')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-plus">Gloria F. Mead</td>
                    <td>25</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#"><i class="dw dw-add"></i>
                                @lang('lable.action_add')
                                </a>
                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                @lang('lable.action_view')
                                </a>
                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>
                                @lang('lable.action_edit')
                                </a>
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                @lang('lable.action_delete')
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection

@section('script')
<!-- js -->
<script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<!-- buttons for Export datatable -->
<script src="{{ asset('admin-page/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin-page/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
<!-- Datatable Setting js -->
<script src="{{ asset('admin-page/vendors/scripts/datatable-setting.js') }}"></script></body>
@endsection
