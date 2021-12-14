<!-- JS Preview mode only -->
<div id="headerMain">
    <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
                    <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo-short.svg') }}" alt="Logo">
                    <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.svg') }}" alt="Logo">
                </a>
                <!-- End Logo -->
            </div>

            <div class="navbar-nav-wrap-content-left">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-toggle="tooltip" data-placement="right" title="Expand"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->

                <!-- Search Form -->
                <div class="d-none d-md-block">
                    <form class="position-relative">
                        <!-- Input Group -->
                        <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="search" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front"
                                   data-hs-form-search-options='{
                                     "clearIcon": "#clearSearchResultsIcon",
                                     "dropMenuElement": "#searchDropdownMenu",
                                     "dropMenuOffset": 20,
                                     "toggleIconOnFocus": true,
                                     "activeClass": "focus"
                                   }'>
                            <a class="input-group-append" href="javascript:;">
                              <span class="input-group-text">
                                <i id="clearSearchResultsIcon" class="tio-clear" style="display: none;"></i>
                              </span>
                            </a>
                        </div>
                        <!-- End Input Group -->

                        <!-- Card Search Content -->
                        <div id="searchDropdownMenu" class="hs-form-search-menu-content card dropdown-menu dropdown-card overflow-hidden">
                            <!-- Body -->
                            <div class="card-body-height py-3">
                                <small class="dropdown-header mb-n2">Recent searches</small>

                                <div class="dropdown-item bg-transparent text-wrap my-2">
                    <span class="h4 mr-1">
                      <a class="btn btn-xs btn-soft-dark btn-pill" href="index.html">
                        Gulp <i class="tio-search ml-1"></i>
                      </a>
                    </span>
                                    <span class="h4">
                      <a class="btn btn-xs btn-soft-dark btn-pill" href="index.html">
                        Notification panel <i class="tio-search ml-1"></i>
                      </a>
                    </span>
                                </div>

                                <div class="dropdown-divider my-3"></div>

                                <small class="dropdown-header mb-n2">Tutorials</small>

                                <a class="dropdown-item my-2" href="index.html">
                                    <div class="media align-items-center">
                      <span class="icon icon-xs icon-soft-dark icon-circle mr-2">
                        <i class="tio-tune"></i>
                      </span>

                                        <div class="media-body text-truncate">
                                            <span>How to set up Gulp?</span>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item my-2" href="index.html">
                                    <div class="media align-items-center">
                      <span class="icon icon-xs icon-soft-dark icon-circle mr-2">
                        <i class="tio-paint-bucket"></i>
                      </span>

                                        <div class="media-body text-truncate">
                                            <span>How to change theme color?</span>
                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-divider my-3"></div>

                                <small class="dropdown-header mb-n2">Members</small>

                                <a class="dropdown-item my-2" href="index.html">
                                    <div class="media align-items-center">
                                        <img class="avatar avatar-xs avatar-circle mr-2" src="{{ asset('assets/img/160x160/img10.jpg') }}" alt="Image Description">
                                        <div class="media-body text-truncate">
                                            <span>Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item my-2" href="index.html">
                                    <div class="media align-items-center">
                                        <img class="avatar avatar-xs avatar-circle mr-2" src="{{ asset('assets/img/160x160/img3.jpg') }}" alt="Image Description">
                                        <div class="media-body text-truncate">
                                            <span>David Harrison</span>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item my-2" href="index.html">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-xs avatar-soft-info avatar-circle mr-2">
                                            <span class="avatar-initials">A</span>
                                        </div>
                                        <div class="media-body text-truncate">
                                            <span>Anne Richard</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <a class="card-footer text-center" href="index.html">
                                See all results
                                <i class="tio-chevron-right"></i>
                            </a>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card Search Content -->
                    </form>
                </div>
                <!-- End Search Form -->
            </div>

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center flex-row">
                    <li class="nav-item d-md-none">
                        <!-- Search Trigger -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                               data-hs-unfold-options='{
                                 "target": "#searchDropdown",
                                 "type": "css-animation",
                                 "animationIn": "fadeIn",
                                 "hasOverlay": "rgba(46, 52, 81, 0.1)",
                                 "closeBreakpoint": "md"
                               }'>
                                <i class="tio-search"></i>
                            </a>
                        </div>
                        <!-- End Search Trigger -->
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                               data-hs-unfold-options='{
                                 "target": "#notificationDropdown",
                                 "type": "css-animation"
                               }'>
                                <i class="tio-notifications-on-outlined"></i>
                                <span class="btn-status btn-sm-status btn-status-danger"></span>
                            </a>

                            <div id="notificationDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu" style="width: 25rem;">
                                <!-- Header -->
                                <div class="card-header">
                                    <span class="card-title h4">Notifications</span>
                                </div>
                                <!-- End Header -->
                                <!-- Body -->
                                <div class="card-body-height">
                                    <!-- Tab Content -->
                                    <div class="tab-content" id="notificationTabContent">
                                        <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                                            <ul class="list-group list-group-flush navbar-card-list-group">
                                                <!-- Item -->
                                                <li class="list-group-item custom-checkbox-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-auto position-static">
                                                            <div class="d-flex align-items-center">
                                                                <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input" id="notificationCheck1" checked>
                                                                    <label class="custom-control-label" for="notificationCheck1"></label>
                                                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img" src="{{ asset('assets/img/160x160/img3.jpg') }}" alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">Brian Warner</span>
                                                            <p class="card-text font-size-sm">changed an issue from "In Progress" to <span class="badge badge-success">Review</span></p>
                                                        </div>
                                                        <small class="col-auto text-muted text-cap">2hr</small>
                                                    </div>
                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item custom-checkbox-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-auto position-static">
                                                            <div class="d-flex align-items-center">
                                                                <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input" id="notificationCheck2" checked>
                                                                    <label class="custom-control-label" for="notificationCheck2"></label>
                                                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                    <span class="avatar-initials">K</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">Klara Hampton</span>
                                                            <p class="card-text font-size-sm">mentioned you in a comment</p>
                                                            <blockquote class="blockquote blockquote-sm">
                                                                Nice work, love! You really nailed it. Keep it up!
                                                            </blockquote>
                                                        </div>
                                                        <small class="col-auto text-muted text-cap">10hr</small>
                                                    </div>
                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item custom-checkbox-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-auto position-static">
                                                            <div class="d-flex align-items-center">
                                                                <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input" id="notificationCheck4" checked>
                                                                    <label class="custom-control-label" for="notificationCheck4"></label>
                                                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img" src="{{ asset('assets/img/160x160/img10.jpg') }}" alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">Ruby Walter</span>
                                                            <p class="card-text font-size-sm">joined the Slack group HS Team</p>
                                                        </div>
                                                        <small class="col-auto text-muted text-cap">3dy</small>
                                                    </div>
                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item custom-checkbox-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-auto position-static">
                                                            <div class="d-flex align-items-center">
                                                                <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input" id="notificationCheck3">
                                                                    <label class="custom-control-label" for="notificationCheck3"></label>
                                                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img" src="{{ asset('assets/svg/brands/google.svg') }}" alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">from Google</span>
                                                            <p class="card-text font-size-sm">Start using forms to capture the information of prospects visiting your Google website</p>
                                                        </div>
                                                        <small class="col-auto text-muted text-cap">17dy</small>
                                                    </div>
                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item custom-checkbox-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-auto position-static">
                                                            <div class="d-flex align-items-center">
                                                                <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input" id="notificationCheck5">
                                                                    <label class="custom-control-label" for="notificationCheck5"></label>
                                                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img" src="{{ asset('assets/img/160x160/img7.jpg') }}" alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">Sara Villar</span>
                                                            <p class="card-text font-size-sm">completed <i class="tio-folder-bookmarked text-primary"></i> FD-7 task</p>
                                                        </div>
                                                        <small class="col-auto text-muted text-cap">2mn</small>
                                                    </div>
                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Tab Content -->
                                </div>
                                <!-- End Body -->

                                <!-- Card Footer -->
                                <a class="card-footer text-center" href="#">
                                    View all notifications
                                    <i class="tio-chevron-right"></i>
                                </a>
                                <!-- End Card Footer -->
                            </div>
                        </div>
                        <!-- End Notification -->
                    </li>
                    <li class="nav-item">
                        <!-- Account -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                               data-hs-unfold-options='{
                                 "target": "#accountNavbarDropdown",
                                 "type": "css-animation"
                               }'>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="{{ asset('assets/img/160x160/img6.jpg') }}" alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account" style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            <img class="avatar-img" src="{{ asset('assets/img/160x160/img6.jpg') }}" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5">{{ Auth::user()->name }}</span>
                                            <span class="card-text">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate pr-2" title="Profile &amp; account">Profile &amp; account</span>
                                </a>

                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate pr-2" title="Settings">Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                    <span class="text-truncate pr-2" title="Sign out">Sign out</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Account -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
            <!-- End Secondary Content -->
        </div>
    </header>
</div>
<div id="sidebarMain">
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered navbar-dark navbar-vertical-aside-initialized">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <div class="navbar-brand-wrapper justify-content-between">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
                        <div class="navbar-brand-logo" style="display: flex; align-items: center;">
                            <img class="navbar-brand-logo short" src="{{ asset('assets/svg/logos/logo-short.svg') }}" alt="Logo">
                            <h2 class="navbar-brand-text">IMAGE EDIT</h2>
                        </div>
                        <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.svg') }}" alt="Logo">
                    </a>
                    <!-- End Logo -->
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>
                <!-- Content -->
                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->
                        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <a class="js-nav-tooltip-link nav-link" href="{{ route('admin.dashboard') }}" title="Dashboards">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboards</span>
                            </a>
                        </li>
                        <!-- End Dashboards -->

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Inventory">Inventory</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Collection -->
                        <li class="nav-item {{ Request::is('admin/collection*') ? 'active' : '' }}">
                            <a class="js-nav-tooltip-link nav-link" href="{{ route('collection.index') }}" title="Collection Overview" data-placement="left">
                                <i class="tio-apps nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Collection</span>
                            </a>
                        </li>
                        <!-- End Collection -->

                        <!-- Services -->
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/service*') || Request::is('admin/complexities*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/service*') ? 'active' : '' }}" href="javascript:;" title="Apps">
                                <i class="tio-puzzle nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Services</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/service') ? 'active' : '' }}" href="{{ route('service.index') }}" title="Services Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/service/create') ? 'active' : '' }}" href="{{ route('service.create') }}" title="Calendar">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add Service</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/complexities') ? 'active' : '' }}" href="{{ route('complexities.index') }}" title="Complexities">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Image Complexities</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Services -->

                        <!-- Orders -->
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/orders*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/orders*') ? 'active' : '' }}" href="javascript:;" title="Apps">
                                <i class="tio-shopping-basket-add nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Orders <span class="badge badge-info badge-pill ml-1">3</span></span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}" href="{{ route('orders.index', ['status' => 'all']) }}" title="Orders Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/orders/cancelled') ? 'active' : '' }}" href="{{ route('orders.cancelled.index') }}" title="Orders Cancelled Request">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Cancel Request</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Orders -->

                        <!-- Customers -->
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/customers*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/customers*') ? 'active' : '' }}" href="javascript:;" title="Customers">
                                <i class="tio-user-big-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Customers</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}" href="{{ route('customers.index') }}" title="Customers Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/customers/create') ? 'active' : '' }}" href="{{ route('customers.create') }}" title="Add New Customer">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add Customer</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Customers -->

                        <!-- Invoice -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                                <i class="tio-file-add-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Invoices <span class="badge badge-info badge-pill ml-1">3</span></span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Orders Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Calendar">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Invoice Generator</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Invoice -->

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="layouts/layouts.html" title="Transactions Overview" data-placement="left">
                                <i class="tio-dollar nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Transactions</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="layouts/layouts.html" title="Services Review" data-placement="left">
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Services Review</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Pages">Pages & Post</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ Request::is('admin/clients*') ? 'active' : '' }}" href="{{ route('clients.index') }}" title="Our Clients Overview" data-placement="left">
                                <i class="tio-company nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Clients</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ Request::is('admin/comments*') ? 'active' : '' }}" href="{{ route('comments.index') }}" title="Comments Overview" data-placement="left">
                                <i class="tio-comment-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Comments</span>
                            </a>
                        </li>

                        <!-- Blog -->
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/blog*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/blog*') ? 'active' : '' }}" href="javascript:;" title="Apps">
                                <i class="tio-notebook-bookmarked nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Blogs <span class="badge badge-info badge-pill ml-1">Post</span></span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/blogs') ? 'active' : '' }}" href="{{ route('blogs.index') }}" title="Blog Post Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Blog Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/blogs/create') ? 'active' : '' }}" href="{{ route('blogs.create') }}" title="Add New Blog Post">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add New Post</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/blog/category*') ? 'active' : '' }}" href="{{ route('category.index') }}" title="Categories Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Categories Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/blog/tags*') ? 'active' : '' }}" href="{{ route('tags.index') }}" title="Tags Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Tags Overview</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Blog -->

                        <!-- Projects -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Projects">
                                <i class="tio-notebook-bookmarked nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Projects</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Project Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Add New Project">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add Project</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Projects -->

                        <!-- Pages -->
                        <li class="navbar-vertical-aside-has-menu  {{ Request::is('admin/pages*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/pages*') ? 'active' : '' }}" href="javascript:;" title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pages</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/pages') ? 'active' : '' }}" href="{{ route('pages.index') }}" title="Pages Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/pages/create') ? 'active' : '' }}" href="{{ route('pages.create') }}" title="Add New Page">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add Page</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Pages -->

                        <!-- Appearance -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Appearance">
                                <i class="tio-dashboard-vs-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Appearance</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Pages Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Manage Header">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Header</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Manage Footer">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Footer</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Manage Layout">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Layout</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Manage Social Login">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Social Login</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Email Settings">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Email Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Appearance -->

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Layouts">Others</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="layouts/layouts.html" title="Email" data-placement="left">
                                <i class="tio-email-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Email</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="layouts/layouts.html" title="Subscribers List" data-placement="left">
                                <i class="tio-telegram nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Subscribers</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="layouts/layouts.html" title="Reports" data-placement="left">
                                <i class="tio-chart-bar-4 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Reports</span>
                            </a>
                        </li>

                        <!-- Settings -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Settings">
                                <i class="tio-settings-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Settings</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Settings Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">General</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Settings Appearance">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Appearance</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="SEO Meta Details">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">SEO Meta</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Settings -->

                        <li class="nav-item">
                            <div class="nav-divider"></div>
                        </li>

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Documentation">Accounts</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Role -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                                <i class="tio-apps nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Roles <span class="badge badge-info badge-pill ml-1">Admin Role</span></span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Roles Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Calendar">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add Role</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Role -->

                        <!-- Users -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                                <i class="tio-user-add nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Users <span class="badge badge-info badge-pill ml-1">Admin Role</span></span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-kanban.html" title="Users Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="apps-calendar.html" title="Calendar">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Users -->

                        <!-- My Account -->
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="layouts/layouts.html" title="Layouts" data-placement="left">
                                <i class="tio-account-circle nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">My Account</span>
                            </a>
                        </li>
                        <!-- End My Account -->

                        <li class="nav-item">
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Help -->
                        <li class="navbar-vertical-aside-has-menu nav-footer-item ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Help">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Help</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Resources &amp; tutorials">
                                        <i class="tio-book-outlined dropdown-item-icon"></i> Resources &amp; tutorials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Keyboard shortcuts">
                                        <i class="tio-command-key dropdown-item-icon"></i> Keyboard shortcuts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Connect other apps">
                                        <i class="tio-alt dropdown-item-icon"></i> Connect other apps
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="What's new?">
                                        <i class="tio-gift dropdown-item-icon"></i> What's new?
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Contact support">
                                        <i class="tio-chat-outlined dropdown-item-icon"></i> Contact support
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Help -->
                    </ul>
                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">
                        <li class="navbar-vertical-footer-list-item">
                            <!-- Unfold -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                                   data-hs-unfold-options='{
                                      "target": "#styleSwitcherDropdown",
                                      "type": "css-animation",
                                      "animationIn": "fadeInRight",
                                      "animationOut": "fadeOutRight",
                                      "hasOverlay": true,
                                      "smartPositionOff": true
                                     }'>
                                    <i class="tio-account-circle"></i>
                                </a>
                            </div>
                            <!-- End Unfold -->
                        </li>

                        <li class="navbar-vertical-footer-list-item">
                            <!-- Other Links -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                                   data-hs-unfold-options='{
                                      "target": "#otherLinksDropdown",
                                      "type": "css-animation",
                                      "animationIn": "slideInDown",
                                      "hideOnScroll": true
                                     }'>
                                    <i class="tio-help-outlined"></i>
                                </a>

                                <div id="otherLinksDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu navbar-vertical-footer-dropdown">
                                    <span class="dropdown-header">Help</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="tio-book-outlined dropdown-item-icon"></i>
                                        <span class="text-truncate pr-2" title="Resources &amp; tutorials">Resources &amp; tutorials</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="tio-command-key dropdown-item-icon"></i>
                                        <span class="text-truncate pr-2" title="Keyboard shortcuts">Keyboard shortcuts</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="tio-alt dropdown-item-icon"></i>
                                        <span class="text-truncate pr-2" title="Connect other apps">Connect other apps</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="tio-gift dropdown-item-icon"></i>
                                        <span class="text-truncate pr-2" title="What's new?">What's new?</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <span class="dropdown-header">Contacts</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="tio-chat-outlined dropdown-item-icon"></i>
                                        <span class="text-truncate pr-2" title="Contact support">Contact support</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Other Links -->
                        </li>

                        <li class="navbar-vertical-footer-list-item">
                            <!-- Unfold -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="{{ route('admin.logout')}}"
                                   data-hs-unfold-options='{
                                      "target": "#styleSwitcherDropdown",
                                      "type": "css-animation",
                                      "animationIn": "fadeInRight",
                                      "animationOut": "fadeOutRight",
                                      "hasOverlay": true,
                                      "smartPositionOff": true
                                     }'>
                                    <i class="tio-sign-out"></i>
                                </a>
                            </div>
                            <!-- End Unfold -->
                        </li>
                    </ul>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>
</div>
