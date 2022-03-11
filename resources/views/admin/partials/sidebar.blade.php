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
            </div>

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center flex-row">
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
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/invoices*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/invoices*') ? 'active' : '' }}" href="javascript:;" title="Invoices">
                                <i class="tio-file-add-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Invoices</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/invoices') ? 'active' : '' }}" href="{{ route('invoices.index') }}" title="Invoices Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/invoices/create') ? 'active' : '' }}" href="{{ route('invoices.create') }}" title="Invoices Generator">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Invoice Generator</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Invoice -->

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Pages">Pages & Post</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ Request::is('admin/reviews*') ? 'active' : '' }}" href="{{ route('reviews.index') }}" title="Reviews" data-placement="left">
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Reviews</span>
                            </a>
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
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/projects*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ Request::is('admin/projects*') ? 'active' : '' }}" href="javascript:;" title="Projects">
                                <i class="tio-notebook-bookmarked nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Projects</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/projects') ? 'active' : '' }}" href="{{ route('projects.index') }}" title="Project Overview">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/projects/create') ? 'active' : '' }}" href="{{ route('projects.create') }}" title="Add New Project">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Add Project</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Projects -->

                        <!-- Pages -->
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/pages*') ? 'show' : '' }}">
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

                        <!-- Menus -->
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link  {{ Request::is('admin/menus*') ? 'active' : '' }}" href="{{ route('menus.index') }}" title="Menus" data-placement="left">
                                <i class="tio-menu-vs nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Menu Builder</span>
                            </a>
                        </li>
                        <!-- End Menus -->

                        <!-- Appearance -->
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link  {{ Request::is('admin/appearance*') ? 'active' : '' }}" href="{{ route('appearance.index') }}" title="Appearance" data-placement="left">
                                <i class="tio-dashboard-vs-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Appearance</span>
                            </a>
                        </li>
                        <!-- End Appearance -->

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Layouts">Others</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ Request::is('admin/subscribers*') ? 'active' : '' }}" href="{{ route('subscribers.index') }}" title="Subscribers List" data-placement="left">
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
                                        <span class="text-truncate">Email Settings</span>
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
                    </ul>
                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">
                        <li class="navbar-vertical-footer-list-item">
                            <!-- Unfold -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;">
                                    <i class="tio-account-circle"></i>
                                </a>
                            </div>
                            <!-- End Unfold -->
                        </li>

                        <li class="navbar-vertical-footer-list-item">
                            <!-- Unfold -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="{{ route('admin.logout')}}">
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
