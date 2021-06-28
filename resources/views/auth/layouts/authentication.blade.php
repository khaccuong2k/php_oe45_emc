<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>@yield('title')</title>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('customers/favicon.ico') }}">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('customers/assets/vendor/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('customers/assets/vendor/slick-carousel/slick/slick.css') }}">
        <!-- CSS Front Template -->
        <link rel="stylesheet" href="{{ asset('customers/assets/css/theme.css') }}">
    </head>
    <body>
        <!-- ========== HEADER ========== -->
        <header id="header" class="header header-bg-transparent header-abs-top">
            <div class="header-section">
                <div id="logoAndNav" class="container-fluid">
                    <!-- Nav -->
                    <nav class="navbar navbar-expand header-navbar">
                        <!-- White Logo -->
                        <a class="d-none d-lg-flex navbar-brand header-navbar-brand" href="../landings/index.html" aria-label="Front">
                        <img src="{{ asset('customers/assets/svg/logos/logo-white.svg') }}" alt="Logo">
                        </a>
                        <!-- End White Logo -->
                        <!-- Default Logo -->
                        <a class="d-flex d-lg-none navbar-brand header-navbar-brand header-navbar-brand-collapsed" href="../landings/index.html" aria-label="Front">
                        <img src="{{ asset('customers/assets/svg/logos/logo.svg') }}" alt="Logo">
                        </a>
                        <!-- End Default Logo -->
                        <!-- Button -->
                        <div class="ml-auto">
                            <a class="btn btn-sm btn-link text-body" href="../landings/index.html">
                            <i class="fas fa-angle-left fa-sm mr-1"></i> @lang('Go to main')
                            </a>
                        </div>
                        <!-- End Button -->
                    </nav>
                    <!-- End Nav -->
                </div>
            </div>
        </header>
        <!-- ========== END HEADER ========== -->
        <!-- ========== MAIN ========== -->
        <main id="content" role="main">
            <!-- Form -->
            <div class="d-flex align-items-center position-relative vh-lg-100">
                <div class="col-lg-5 col-xl-4 d-none d-lg-flex align-items-center bg-navy vh-lg-100 px-0" style="background-image: url({{ asset('customers/assets/svg/components/abstract-shapes-20.svg') }});">
                    <div class="w-100 p-5">
                        <!-- SVG Quote -->
                        <figure class="text-center mb-5 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px"
                                viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;" xml:space="preserve">
                                <path fill="#fff" d="M3,1.3C2,1.7,1.2,2.7,1.2,3.6c0,0.2,0,0.4,0.1,0.5c0.2-0.2,0.5-0.3,0.9-0.3c0.8,0,1.5,0.6,1.5,1.5c0,0.9-0.7,1.5-1.5,1.5
                                    C1.4,6.9,1,6.6,0.7,6.1C0.4,5.6,0.3,4.9,0.3,4.5c0-1.6,0.8-2.9,2.5-3.7L3,1.3z M7.1,1.3c-1,0.4-1.8,1.4-1.8,2.3
                                    c0,0.2,0,0.4,0.1,0.5c0.2-0.2,0.5-0.3,0.9-0.3c0.8,0,1.5,0.6,1.5,1.5c0,0.9-0.7,1.5-1.5,1.5c-0.7,0-1.1-0.3-1.4-0.8
                                    C4.4,5.6,4.4,4.9,4.4,4.5c0-1.6,0.8-2.9,2.5-3.7L7.1,1.3z"/>
                            </svg>
                        </figure>
                        <!-- End SVG Quote -->
                        <!-- Testimonials Carousel Main -->
                        <div id="testimonialsNavMain" class="js-slick-carousel slick mb-4"
                            data-hs-slick-carousel-options='{
                            "autoplay": true,
                            "autoplaySpeed": 5000,
                            "fade": true,
                            "infinite": true,
                            "asNavFor": "#testimonialsNavPagination"
                            }'>
                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="w-md-80 w-lg-60 text-center mx-auto">
                                    <blockquote class="h3 text-white font-weight-normal mb-4">@lang("message.review_one")</blockquote>
                                    <span class="d-block text-white-70">Christina Kray, Google</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>
                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="w-md-80 w-lg-60 text-center mx-auto">
                                    <blockquote class="h3 text-white font-weight-normal mb-4">@lang("message.review_two")</blockquote>
                                    <span class="d-block text-white-70">James Austin, Slack</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>
                            <div class="js-slide">
                                <!-- Testimonials -->
                                <div class="w-md-80 w-lg-60 text-center mx-auto">
                                    <blockquote class="h3 text-white font-weight-normal mb-4">@lang("message.review_three")</blockquote>
                                    <span class="d-block text-white-70">Charlotte Moore, Amazon</span>
                                </div>
                                <!-- End Testimonials -->
                            </div>
                        </div>
                        <!-- End Testimonials Carousel Main -->
                        <!-- Testimonials Carousel Pagination -->
                        <div id="testimonialsNavPagination" class="js-slick-carousel slick slick-transform-off slick-pagination-modern slick-transform-off mx-auto"
                            data-hs-slick-carousel-options='{
                            "infinite": true,
                            "slidesToShow": 3,
                            "centerMode": true,
                            "isThumbs": true,
                            "asNavFor": "#testimonialsNavMain"
                            }'>
                            <div class="js-slide">
                                <div class="avatar avatar-circle mx-auto">
                                    <img class="avatar-img" src="{{ asset('customers/assets/img/100x100/img1.jpg') }}" alt="Image Description">
                                </div>
                            </div>
                            <div class="js-slide">
                                <div class="avatar avatar-circle mx-auto">
                                    <img class="avatar-img" src="{{ asset('customers/assets/img/100x100/img3.jpg') }}" alt="Image Description">
                                </div>
                            </div>
                            <div class="js-slide">
                                <div class="avatar avatar-circle mx-auto">
                                    <img class="avatar-img" src="{{ asset('customers/assets/img/100x100/img2.jpg') }}" alt="Image Description">
                                </div>
                            </div>
                        </div>
                        <!-- End Testimonials Carousel Pagination -->
                        <!-- Clients -->
                        <div class="position-absolute right-0 bottom-0 left-0 text-center p-5">
                            <span class="d-block text-white-70 mb-3">@lang('Front partners')</span>
                            <div class="d-flex justify-content-center">
                                <img class="max-w-10rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/slack-white.svg') }}" alt="Image Description">
                                <img class="max-w-10rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/google-white.svg') }}" alt="Image Description">
                                <img class="max-w-10rem mx-auto" src="{{ asset('customers/assets/svg/clients-logo/spotify-white.svg') }}" alt="Image Description">
                            </div>
                        </div>
                        <!-- End Clients -->
                    </div>
                </div>
                <div class="container">
                    @yield('content')
                </div>
            </div>
            <!-- End Form -->
        </main>
        <!-- ========== END MAIN ========== -->
        <!-- JS Global Compulsory -->
        <script src="{{ asset('customers/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('customers/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('customers/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- JS Implementing Plugins -->
        <script src="{{ asset('customers/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('customers/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <!-- JS Front -->
        <script src="{{ asset('customers/assets/js/hs.core.js') }}"></script>
        <script src="{{ asset('customers/assets/js/hs.slick-carousel.js') }}"></script>
        <!-- JS Plugins Init. -->
        <script src="{{ asset('customers/assets/js/init-plugin.js') }}"></script>
    </body>
</html>
