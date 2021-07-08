@extends('admin.layouts.app')

@section('title')
<title>@lang('lable.title.user.detail')</title>
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

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('lable.title.user.index')</a></li>
<li class="breadcrumb-item active">@lang('lable.title.user.detail')</li>
@endsection

@section('content')
<!-- multiple select row Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">@lang('lable.user.detail')</h4>
        @lang('message.user.delete.success')
    </div>
    <div class="pb-20">
        <table class="table hover nowrap">
            <thead>
                <tr>
                    <th>@lang('lable.user.name')</th>
                    <th>@lang('lable.user.email')</th>
                    <th>@lang('lable.user.phone')</th>
                    <th>@lang('lable.user.address')</th>
                    <th>@lang('lable.user.birthday')</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($userDetail))
                    <tr>
                        <td>{{ $userDetail->username }}</td>
                        <td>{{ $userDetail->email }}</td>
                        <td>{{ $userDetail->phone }}</td>
                        <td>{{ $userDetail->address }}</td>
                        <td>{{ $userDetail->created_at }}</td>
                    </tr>
                @else
                    <tr>
                        <td>@lang('lable.no_have_value')</td>
                    </tr>
                @endif
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
<!-- switchery js -->
<script src="{{ asset('admin-page/src/plugins/switchery/switchery.min.js') }}"></script>
<!-- bootstrap-tagsinput js -->
<script src="{{ asset('admin-page/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- bootstrap-touchspin js -->
<script src="{{ asset('admin-page/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('admin-page/vendors/scripts/advanced-components.js') }}"></script>
@endsection
