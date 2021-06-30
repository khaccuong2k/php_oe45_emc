@extends('admin.layouts.app')

@section('title')
    <title>Edit Product</title>
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


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- horizontal Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">horizontal Basic Forms</h4>
                    </div>
                </div>
                <form action="{{ route('test') }}" method="post" enctype="multipart/form-data">
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

            <!-- Input Validation Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Input Validation</h4>
                        <p class="mb-30">Validation styles for error, warning, and success</p>
                    </div>
                    <div class="pull-right">
                        <a href="#input-validation-form" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group has-success">
                                <label class="form-control-label">Input with success</label>
                                <input type="text" class="form-control form-control-success">
                                <div class="form-control-feedback">Success! You've done it.</div>
                                <small class="form-text text-muted">Example help text that remains unchanged.</small>
                            </div>
                            <div class="form-group has-warning">
                                <label class="form-control-label">Input with warning</label>
                                <input type="text" class="form-control form-control-warning">
                                <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                <small class="form-text text-muted">Example help text that remains unchanged.</small>
                            </div>
                            <div class="form-group has-danger">
                                <label class="form-control-label">Input with danger</label>
                                <input type="text" class="form-control form-control-danger">
                                <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                <small class="form-text text-muted">Example help text that remains unchanged.</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group has-success row">
                                <label class="form-control-label col-sm-12 col-md-3 col-form-label">Input with success</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control form-control-success">
                                    <div class="form-control-feedback">Success! You've done it.</div>
                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                </div>
                            </div>
                            <div class="form-group has-warning row">
                                <label class="form-control-label col-sm-12 col-md-3 col-form-label">Input with warning</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control form-control-warning">
                                    <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                </div>
                            </div>
                            <div class="form-group has-danger row">
                                <label class="form-control-label col-sm-12 col-md-3 col-form-label">Input with danger</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" class="form-control form-control-danger">
                                    <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="collapse collapse-box" id="input-validation-form" >
                    <div class="code-box">
                        <div class="clearfix">
                            <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#input-validation"><i class="fa fa-clipboard"></i> Copy Code</a>
                            <a href="#input-validation-form" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                        </div>
                        <pre><code class="xml copy-pre" id="input-validation">
                        <form>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group has-success">
                                    <label class="form-control-label">Input with success</label>
                                    <input type="text" class="form-control form-control-success">
                                    <div class="form-control-feedback">Success! You've done it.</div>
                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                </div>
                                <div class="form-group has-warning">
                                    <label class="form-control-label">Input with warning</label>
                                    <input type="text" class="form-control form-control-warning">
                                    <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                </div>
                                <div class="form-group has-danger">
                                    <label class="form-control-label">Input with danger</label>
                                    <input type="text" class="form-control form-control-danger">
                                    <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group has-success row">
                                    <label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with success</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control form-control-success">
                                        <div class="form-control-feedback">Success! You've done it.</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group has-warning row">
                                    <label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with warning</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control form-control-warning">
                                        <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group has-danger row">
                                    <label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with danger</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control form-control-danger">
                                        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        </code></pre>
                    </div>
                </div>
            </div>
            <!-- Input Validation End -->

        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>
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
