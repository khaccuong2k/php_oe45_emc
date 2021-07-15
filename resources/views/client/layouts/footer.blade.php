<!-- ========== FOOTER ========== -->
<footer class="border-top">
    <div class="container">
        <div class="row justify-content-lg-between space-top-2 space-bottom-lg-2">
            <div class="col-lg-3 mb-5">
                <div class="d-flex align-items-start flex-column h-100">
                    <a class="w-100 mb-3 mb-lg-auto" href="../landings/index.html" aria-label="Front">
                    <img class="brand" src="{{ asset('customers/assets/svg/logos/logo.svg') }}" alt="Logo">
                    </a>
                    <p class="small text-muted mb-0">&copy; Front. 2020  {{ config('app.name') }}</p>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 ml-lg-auto mb-5 mb-lg-0">
                <h5>{{ trans('message.account') }}</h5>
                <!-- Nav Link -->
                <ul class="nav nav-sm nav-x-0 flex-column">
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.place_in_order') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.shoping_option') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.tracking') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.country_availability') }}</a></li>
                </ul>
                <!-- End Nav Link -->
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-5 mb-lg-0">
                <h5>{{ trans('message.company') }}</h5>
                <!-- Nav Link -->
                <ul class="nav nav-sm nav-x-0 flex-column">
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.financing') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.recycling') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ trans('message.return_policy') }}</a></li>
                </ul>
                <!-- End Nav Link -->
            </div>
            <div class="col-md-4 col-lg-2 mb-5 mb-lg-0">
                <h5>{{ trans('message.our_location') }}</h5>
                <!-- Nav Link -->
                <ul class="nav nav-sm nav-x-0 flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="../help-desk/index.html">
                        <span class="media align-items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span class="media-body">{{ trans('message.help') }}</span>
                        </span>
                        </a>
                    </li>
                    <li class="position-relative">
                        <!-- Country -->
                        <div class="hs-unfold position-static">
                            <a class="js-hs-unfold-invoker nav-link" href="javascript:;"
                                data-hs-unfold-options='{
                                "target": "#footerCountry",
                                "type": "css-animation",
                                "animationIn": "slideInDown"
                                }'>
                            <img class="dropdown-item-icon" src="{{ asset('customers/assets/vendor/flag-icon-css/flags/4x3/us.svg') }}" alt="United States Flag">
                            <span>{{ trans('message.english') }}</span>
                            </a>
                            <div id="footerCountry" class="hs-unfold-content dropdown-menu dropdown-card dropdown-menu-md-right dropdown-menu-bottom w-100 w-sm-auto mb-0">
                                <div class="card">
                                    <!-- Body -->
                                    <div class="card-body">
                                        <h5>{{ trans('message.change_locale') }}</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- Nav Link -->
                                                <a class="nav-link" href="{{ route('locale.change', ['vi']) }}">
                                                <img class="max-w-3rem mr-1" src="{{ asset('customers/assets/vendor/flag-icon-css/flags/4x3/vn.svg') }}" alt="United Kingdom Flag">
                                                VI
                                                </a>
                                                <a class="nav-link active " href="{{ route('locale.change', ['en']) }}">
                                                <img class="max-w-3rem mr-1" src="{{ asset('customers/assets/vendor/flag-icon-css/flags/4x3/us.svg') }}" alt="United States Flag">
                                                US
                                                </a>
                                                <!-- End Nav Link -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Body -->
                                    <!-- Footer -->
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </div>
                        <!-- End Country -->
                    </li>
                </ul>
                <!-- End Nav Link -->
            </div>
        </div>
        <hr class="my-0">
        <div class="row align-items-md-center space-1">
            <div class="col-md-4 mb-4 mb-md-0">
                <!-- Social Networks -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-google"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-github"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Social Networks -->
            </div>
            <div class="col-md-8 text-md-right">
                <!-- Links -->
                <ul class="nav nav-sm justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link pl-0" href="../pages/privacy.html">{{ trans('message.privacy_policy') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/terms.html">{{ trans('message.term_condition') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pr-0" href="../pages/careers.html">{{ trans('message.carreers') }}</a>
                    </li>
                </ul>
                <!-- End Links -->
            </div>
        </div>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
<!-- ========== END SECONDARY CONTENTS ========== -->
<!-- Go to Top -->
<a class="js-go-to go-to position-fixed v-hidden" href="javascript:;"
    data-hs-go-to-options='{
    "offsetTop": 700,
    "position": {
    "init": {
    "right": 15
    },
    "show": {
    "bottom": 15
    },
    "hide": {
    "bottom": -15
    }
    }
    }'>
<i class="fas fa-angle-up"></i>
</a>
<!-- End Go to Top -->
<input type="hidden" name="AjaxAddToCart" value="{{ route('client.ajax.addToCart') }}" />
<!-- JS Global Compulsory -->
<script src="{{ asset('customers/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- JS Implementing Plugins -->
<script src="{{ asset('customers/assets/vendor/hs-header/dist/hs-header.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/hs-go-to/dist/hs-go-to.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/hs-show-animation/dist/hs-show-animation.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>
<!-- JS Front -->
<script src="{{ asset('customers/assets/js/hs.core.js') }}"></script>
<script src="{{ asset('customers/assets/js/hs.validation.js') }}"></script>
<script src="{{ asset('customers/assets/js/hs.slick-carousel.js') }}"></script>
<script src="{{ asset('customers/assets/js/hs.countdown.js') }}"></script>
<script src="{{ asset('customers/assets/js/hs.select2.js') }}"></script>
<script src="{{ asset('customers/assets/js/hs.ion-range-slider.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('customers/assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!-- Ajax -->
<script src="{{ asset('customers/assets/js/ajax.filter-products.js') }}"></script>
<script src="{{ asset('customers/assets/js/ajax.resolve-cart.js') }}"></script>
<script src="{{ asset('customers/assets/js/ajax.resolve-star-vote.js') }}"></script>
<script src="{{ asset('customers/assets/js/ajax.resolve-reply-comment.js') }}"></script>
<script src="{{ asset('customers/assets/js/js.resolve-order.js') }}"></script>
<!-- JS Plugins Init. -->
<script src="{{ asset('customers/assets/js/init-plugin-home.js') }}"></script>
<!-- JS Chat -->
<script src="{{ asset('customers/assets/js/hs.chat.js') }}"></script>
</body>
</html>
