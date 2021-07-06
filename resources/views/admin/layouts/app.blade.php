<!DOCTYPE html>
<html>
    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8">
        <!-- Section title  -->
        @yield('title')
        <!-- Section css -->
        @yield('css')
    </head>
    <body>
        <div class="header">
            <div class="header-left">
                <div class="menu-icon dw dw-menu"></div>
                <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
                <div class="header-search">
                    <form>
                        <div class="form-group mb-0">
                            <i class="dw dw-search2 search-icon"></i>
                            <input type="text" class="form-control search-input" placeholder="Search Here">
                            <div class="dropdown">
                                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">@lang('lable.app.search.from')</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control form-control-sm form-control-line" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">@lang('lable.app.search.to')</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control form-control-sm form-control-line" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">@lang('lable.app.search.subject')</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control form-control-sm form-control-line" type="text">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary">@lang('lable.app.search.search')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-right">
                <div class="dashboard-setting user-notification">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                        </a>
                    </div>
                </div>
                <div class="user-notification">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="notification-list mx-h-350 customscroll">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset('admin-page/vendors/images/img.jpg') }}" alt="">
                                            <h3>John Doe</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                        <img src="{{ asset('admin-page/vendors/images/photo1.jpg') }}" alt="">
                        </span>
                        <span class="user-name">Ross C. Lopez</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i>
                            @lang('lable.app.user.profile')
                            </a>
                            <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i>
                            @lang('lable.app.user.setting')
                            </a>
                            <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i>
                            @lang('lable.app.user.help')
                            </a>
                            <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i>
                            @lang('lable.app.user.logout')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-sidebar">
            <div class="sidebar-title">
                <h3 class="weight-600 font-16 text-blue">
                    @lang('lable.app.setting.layout_setting')
                    <span class="btn-block font-weight-400 font-12">@lang('lable.app.setting.user_interface_settings')</span>
                </h3>
                <div class="close-sidebar" data-toggle="right-sidebar-close">
                    <i class="icon-copy ion-close-round"></i>
                </div>
            </div>
            <div class="right-sidebar-body customscroll">
                <div class="right-sidebar-body-content">
                    <h4 class="weight-600 font-18 pb-10">@lang('lable.app.setting.header_background')</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">@lang('lable.app.setting.white')</a>
                        <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">@lang('lable.app.setting.dark')</a>
                    </div>
                    <h4 class="weight-600 font-18 pb-10">@lang('lable.app.setting.sidebar_background')</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">@lang('lable.app.setting.white')</a>
                        <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">@lang('lable.app.setting.dark')</a>
                    </div>
                    <h4 class="weight-600 font-18 pb-10">@lang('lable.app.setting.menu_dropdown_icon')</h4>
                    <div class="sidebar-radio-group pb-10 mb-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                            <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                            <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                            <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                        </div>
                    </div>
                    <h4 class="weight-600 font-18 pb-10">@lang('lable.app.setting.menu_list_icon')</h4>
                    <div class="sidebar-radio-group pb-30 mb-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                            <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                            <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                            <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                            <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                            <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                            <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                        </div>
                    </div>
                    <div class="reset-options pt-30 text-center">
                        <button class="btn btn-danger" id="reset-settings">@lang('lable.app.setting.reset_settings')</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-side-bar">
            <div class="brand-logo">
                <a href="index.html">
                <img src="{{ asset('admin-page/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
                <img src="{{ asset('admin-page/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
                </a>
                <div class="close-sidebar" data-toggle="left-sidebar-close">
                    <i class="ion-close-round"></i>
                </div>
            </div>
            <div class="menu-block customscroll">
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <li>
                            <a href="/" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">@lang('lable.title.dashboard.index')</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list3"></span><span class="mtext">@lang('lable.title.category.index')</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('categories.index') }}">@lang('lable.app.sidebar.list')</a></li>
                                <li><a href="{{ route('categories.create') }}">@lang('lable.app.sidebar.add')</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-library"></span><span class="mtext">@lang('lable.title.product.index')</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('products.index') }}">@lang('lable.app.sidebar.list')</a></li>
                                <li><a href="{{ route('products.create') }}">@lang('lable.app.sidebar.add')</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-copy"></span><span class="mtext">@lang('lable.title.order.index')</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('orders.index') }}">@lang('lable.app.sidebar.list')</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-right-arrow1"></span><span class="mtext">@lang('lable.title.request.index')</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('requests.index') }}">@lang('lable.app.sidebar.list')</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-invoice"></span><span class="mtext">@lang('lable.title.user.index')</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('users.index') }}">@lang('lable.app.sidebar.list')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="chat.html" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-chat3"></span><span class="mtext">@lang('lable.app.sidebar.chat')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div>
        <!-- main-container -->
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard.index') }}">
                                                @lang('lable.app.home')
                                            </a>
                                        </li>
                                        @yield('breadcrumb')
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- yield content off page  -->
                    @yield('content')
                    <!-- end yield content off page  -->
                </div>
                <div class="footer-wrap pd-20 mb-20 card-box">
                    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
                </div>
            </div>
        </div>
        <!-- Section js -->
        @yield('script')
    </body>
</html>
    