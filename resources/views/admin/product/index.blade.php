@extends('admin.layouts.app')

@section('title')
    <title>Manage Products</title>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('admin-page/vendors/styles/style.css') }}">
@endsection

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product-list">
                        <ul class="row">
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img1.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce Black</a></h4>
                                        <div class="price">
                                            <del>$55.5</del><ins>$49.5</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img2.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce White</a></h4>
                                        <div class="price">
                                            <del>$75.5</del><ins>$50</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img3.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                                        <div class="price">
                                            <ins>$80</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img4.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Apple Watch Series 3</a></h4>
                                        <div class="price">
                                            <ins>$380</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img2.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce White</a></h4>
                                        <div class="price">
                                            <del>$75.5</del><ins>$50</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img4.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Apple Watch Series 3</a></h4>
                                        <div class="price">
                                            <ins>$380</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img1.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce Black</a></h4>
                                        <div class="price">
                                            <del>$55.5</del><ins>$49.5</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img3.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                                        <div class="price">
                                            <ins>$80</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img1.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce Black</a></h4>
                                        <div class="price">
                                            <del>$55.5</del><ins>$49.5</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img2.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Gufram Bounce White</a></h4>
                                        <div class="price">
                                            <del>$75.5</del><ins>$50</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img3.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h4><a href="#">Contrast Lace-Up Sneakers</a></h4>
                                        <div class="price">
                                            <ins>$80</ins>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-2 col-md-6 col-sm-12">
                                <div class="product-box">
                                    <div class="producct-img"><img src="{{ asset('admin-page/vendors/images/product-img4.jpg') }}" alt=""></div>
                                    <div class="product-caption">
                                        <h6><a href="#">Apple Watch Series 3</a></h6>
                                        <div class="price">
                                            <ins>$380</ins>
                                        </div>
                                        <a href="{{ route('products.show', 1) }}" class="btn btn-outline-primary">View Detail</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-pagination mb-30">
                        <div class="btn-toolbar justify-content-center mb-15">
                            <div class="btn-group">
                                <a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
                                <a href="#" class="btn btn-outline-primary">1</a>
                                <a href="#" class="btn btn-outline-primary">2</a>
                                <span class="btn btn-primary current">3</span>
                                <a href="#" class="btn btn-outline-primary">4</a>
                                <a href="#" class="btn btn-outline-primary">5</a>
                                <a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 admin-page Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- js -->
	<script src="{{ asset('admin-page/vendors/scripts/core.js') }}"></script>') }}
	<script src="{{ asset('admin-page/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('admin-page/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('admin-page/vendors/scripts/layout-settings.js') }}"></script>
@endsection
