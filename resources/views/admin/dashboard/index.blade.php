@extends('admin.layouts.app')

@section('title')
    <title>@lang('lable.title.dashboard.index')</title>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
@endsection

@section('content')
    <div class="row clearfix progress-box">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly>
                    <h5 class="text-blue padding-top-10 h5">My Earnings</h5>
                    <span class="d-block">80% Average <i class="fa fa-line-chart text-blue"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <input type="text" class="knob dial2" value="70" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091" data-angleOffset="180" readonly>
                    <h5 class="text-light-green padding-top-10 h5">Business Captured</h5>
                    <span class="d-block">75% Average <i class="fa text-light-green fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <input type="text" class="knob dial3" value="90" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767" data-angleOffset="180" readonly>
                    <h5 class="text-light-orange padding-top-10 h5">Projects Speed</h5>
                    <span class="d-block">90% Average <i class="fa text-light-orange fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                    <input type="text" class="knob dial4" value="65" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb" data-angleOffset="180" readonly>
                    <h5 class="text-light-purple padding-top-10 h5">Panding Orders</h5>
                    <span class="d-block">65% Average <i class="fa text-light-purple fa-line-chart"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="pd-20 card-box height-100-p">
                <h4 class="h4 text-blue">Pie Chart</h4>
                <div id="chart8"></div>
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="pd-20 card-box height-100-p">
                <h4 class="h4 text-blue">Radial Bar Chart</h4>
                <div id="chart9"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('admin-page/src/plugins/jQuery-Knob-master/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('admin-page/src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin-page/src/plugins/highcharts-6.0.7/code/highcharts-more.js') }}"></script>
    <script src="{{ asset('admin-page/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('admin-page/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin-page/vendors/scripts/dashboard2.js') }}"></script>
    <script src="{{ asset('admin-page/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('admin-page/vendors/scripts/apexcharts-setting.js') }}"></script>
@endsection
