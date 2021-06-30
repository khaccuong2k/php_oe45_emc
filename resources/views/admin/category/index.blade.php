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

@section('bread-crumb')
<li class="breadcrumb-item"><a href="{{ route('categories.index')}}">@lang('lable.title.category.index')</a></li>
<li class="breadcrumb-item active" aria-current="page">@lang('lable.title.category.index')</li>
@endsection

@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">@lang('lable.category.list')</h4>
	</div>
	<div class="pb-20">
		<table class="table">
			@forelse ($categories as $key => $category)
			<thead>
				<tr>
					<td class="text-center"><h3>{{ $category->name }}</h3></td>
				</tr>
			</thead>
			<tbody>
			@forelse ($category->subCategories as $subCategories)
				<tr>
					<td colspan="4">
						<table class="table mb-0 table-bordered table-dark">
						<thead>
							<tr>
								<td class="w-25 p-3">@lang('lable.category.sub')</td>
								<td class="w-50 p-3">{{ $subCategories->name }}</td>
								<td class="w-25 p-3">
									<a class="btn btn-outline-info" href="{{ route('categories.show', $subCategories->id) }}">
										@lang('lable.category.detail')
									</a>
								</td>
							</tr>
						</thead>
						</table>
					</td>
				</tr>
			@empty
			<tr>
				<td colspan="4">
					<table class="table mb-0 table-bordered table-dark">
					<thead>
						<tr>
							<td>nonono</td>
						</tr>
					</thead>
					</table>
				</td>
			</tr>
			@endforelse
			</tbody>
			@empty
				nononon
			@endforelse
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
