@extends('admin.layout.layout')

@section('title', 'Dashboard - Car Image Editing')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Good morning, Mark.</h1>
                    <p class="page-header-text">Here's what's happening with your store today.</p>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card card-body mb-3 mb-lg-5">
            <div class="row gx-lg-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="card-subtitle">In-store Sales</h6>
                            <span class="card-title h3">$7,820.75</span>

                            <div class="d-flex align-items-center">
                                <span class="d-block font-size-sm">5k orders</span>
                                <span class="badge badge-soft-success ml-2">
                      <i class="tio-trending-up"></i> 4.3%
                    </span>
                            </div>
                        </div>

                        <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                  <i class="tio-shop"></i>
                </span>
                    </div>

                    <div class="d-lg-none">
                        <hr>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 column-divider-sm">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="card-subtitle">Website Sales</h6>
                            <span class="card-title h3">$985,937.45</span>

                            <div class="d-flex align-items-center">
                                <span class="d-block font-size-sm">21k orders</span>
                                <span class="badge badge-soft-success ml-2">
                      <i class="tio-trending-up"></i> 12.5%
                    </span>
                            </div>
                        </div>

                        <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                  <i class="tio-website"></i>
                </span>
                    </div>

                    <div class="d-lg-none">
                        <hr>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 column-divider-lg">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="card-subtitle">Discount</h6>
                            <span class="card-title h3">$15,503.00</span>

                            <div class="d-flex align-items-center">
                                <span class="d-block font-size-sm">6k orders</span>
                            </div>
                        </div>

                        <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                  <i class="tio-label-off"></i>
                </span>
                    </div>

                    <div class="d-sm-none">
                        <hr>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 column-divider-sm">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="card-subtitle">Affiliate</h6>
                            <span class="card-title h3">$3,982.53</span>

                            <div class="d-flex align-items-center">
                                <span class="d-block font-size-sm">150 orders</span>
                                <span class="badge badge-soft-danger ml-2">
                      <i class="tio-trending-down"></i> 4.4%
                    </span>
                            </div>
                        </div>

                        <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                  <i class="tio-users-switch"></i>
                </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
                <div class="row align-items-center flex-grow-1">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h4 class="card-header-title">Sales <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i></h4>
                    </div>

                    <div class="col-sm-auto">
                        <!-- Select -->
                        <select class="js-select2-custom custom-select-sm" size="1" style="opacity: 0;"
                                data-hs-select2-options='{
                          "minimumResultsForSearch": "Infinity",
                          "customClass": "custom-select custom-select-sm mb-2 mb-sm-0 mr-2",
                          "dropdownAutoWidth": true,
                          "width": true
                        }'>
                            <option value="">Online store</option>
                            <option value="in-store">In-store</option>
                        </select>
                        <!-- End Select -->

                        <!-- Daterangepicker -->
                        <button id="js-daterangepicker-predefined" class="btn btn-sm btn-white dropdown-toggle mb-2 mb-sm-0">
                            <i class="tio-date-range"></i>
                            <span class="js-daterangepicker-predefined-preview ml-1"></span>
                        </button>
                        <!-- End Daterangepicker -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9 mb-5 mb-md-0">
                        <!-- Bar Chart -->
                        <div class="chartjs-custom mb-4">
                            <canvas class="js-chart" style="height: 18rem;"
                                    data-hs-chartjs-options='{
                            "type": "bar",
                            "data": {
                              "labels": ["1AM","2AM","3AM","4AM","5AM","6AM","7AM","8AM","9AM","10AM","11AM"],
                              "datasets": [{
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220, 200, 300, 290, 350, 150, 350, 300, 100, 125, 220, 225],
                                "backgroundColor": "#377dff",
                                "hoverBackgroundColor": "#377dff",
                                "borderColor": "#377dff"
                              },
                              {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120, 150, 230, 382, 204, 169, 290, 300, 100, 300, 140],
                                "backgroundColor": "#e7eaf3",
                                "borderColor": "#e7eaf3"
                              }]
                            },
                            "options": {
                              "scales": {
                                "yAxes": [{
                                  "gridLines": {
                                    "color": "#e7eaf3",
                                    "drawBorder": false,
                                    "zeroLineColor": "#e7eaf3"
                                  },
                                  "ticks": {
                                    "beginAtZero": true,
                                    "stepSize": 100,
                                    "fontSize": 12,
                                    "fontColor": "#97a4af",
                                    "fontFamily": "Open Sans, sans-serif",
                                    "padding": 10
                                  }
                                }],
                                "xAxes": [{
                                  "gridLines": {
                                    "display": false,
                                    "drawBorder": false
                                  },
                                  "ticks": {
                                    "fontSize": 12,
                                    "fontColor": "#97a4af",
                                    "fontFamily": "Open Sans, sans-serif",
                                    "padding": 5
                                  },
                                  "categoryPercentage": 0.5,
                                  "maxBarThickness": "10"
                                }]
                              },
                              "cornerRadius": 2,
                              "tooltips": {
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'></canvas>
                        </div>
                        <!-- End Bar Chart -->

                        <!-- Legend Indicators -->
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator"></span> Revenue
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> Orders
                            </div>
                        </div>
                        <!-- End Legend Indicators -->
                    </div>

                    <div class="col-md-3 column-divider-md">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <!-- Stats -->
                                <div class="d-flex justify-content-center flex-column" style="min-height: 10.5rem;">
                                    <h6 class="card-subtitle">Revenue</h6>
                                    <span class="d-block display-4 text-dark mb-1 mr-3">$97,458.20</span>
                                    <span class="d-block text-success">
                        <i class="tio-trending-up mr-1"></i> $2,401.02 (3.7%)
                      </span>
                                </div>
                                <!-- End Stats -->

                                <div class="d-sm-none">
                                    <hr class="my-0">
                                </div>

                                <div class="d-none d-md-block">
                                    <hr class="my-0">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-12">
                                <!-- Stats -->
                                <div class="d-flex justify-content-center flex-column" style="min-height: 10.5rem;">
                                    <h6 class="card-subtitle">Orders</h6>
                                    <span class="d-block display-4 text-dark mb-1 mr-3">67,893</span>
                                    <span class="d-block text-danger">
                        <i class="tio-trending-down mr-1"></i> +3,301 (1.2%)
                      </span>
                                </div>
                                <!-- End Stats -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <div class="row">
            <div class="col-lg-4 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow mb-4" href="#">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/create.svg') }}" alt="Image Description">

                            <div class="media-body">
                                <h3 class="text-hover-primary mb-1">Product</h3>
                                <span class="text-body">Create a new product</span>
                            </div>

                            <div class="ml-2 text-right">
                                <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="card card-hover-shadow mb-4" href="#">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/choice.svg') }}" alt="Image Description">

                            <div class="media-body">
                                <h3 class="text-hover-primary mb-1">Collection</h3>
                                <span class="text-body">Create a new collection</span>
                            </div>

                            <div class="ml-2 text-right">
                                <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="card card-hover-shadow" href="#">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/presenting.svg') }}" alt="Image Description">

                            <div class="media-body">
                                <h3 class="text-hover-primary mb-1">Discount</h3>
                                <span class="text-body">Create a new discount</span>
                            </div>

                            <div class="ml-2 text-right">
                                <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-lg-8 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Top products</h4>

                        <a class="btn btn-sm btn-ghost-secondary" href="#">View all</a>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body-height">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Change</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sold</th>
                                    <th scope="col">Sales</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>
                                        <!-- Media -->
                                        <a class="media align-items-center" href="ecommerce-product-description.html">
                                            <img class="avatar mr-3" src="{{ asset('assets/img/400x400/img4.jpg') }}" alt="Image Description">

                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0">Photive wireless speakers</h5>
                                            </div>
                                        </a>
                                        <!-- End Media -->
                                    </td>
                                    <td><i class="tio-trending-down text-danger mr-1"></i> 72%</td>
                                    <td>$65</td>
                                    <td>7,545</td>
                                    <td>
                                        <h4 class="mb-0">$15,302.00</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!-- Media -->
                                        <a class="media align-items-center" href="ecommerce-product-description.html">
                                            <img class="avatar mr-3" src="{{ asset('assets/img/400x400/img26.jpg') }}" alt="Image Description">

                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0">Topman shoe in green</h5>
                                            </div>
                                        </a>
                                        <!-- End Media -->
                                    </td>
                                    <td><i class="tio-trending-up text-success mr-1"></i> 69%</td>
                                    <td>$21</td>
                                    <td>6,643</td>
                                    <td>
                                        <h4 class="mb-0">$12,492.21</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!-- Media -->
                                        <a class="media align-items-center" href="ecommerce-product-description.html">
                                            <img class="avatar mr-3" src="{{ asset('assets/img/400x400/img25.jpg') }}" alt="Image Description">

                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0">RayBan black sunglasses</h5>
                                            </div>
                                        </a>
                                        <!-- End Media -->
                                    </td>
                                    <td><i class="tio-trending-down text-danger mr-1"></i> 65%</td>
                                    <td>$37</td>
                                    <td>5,951</td>
                                    <td>
                                        <h4 class="mb-0">$10,351.71</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!-- Media -->
                                        <a class="media align-items-center" href="ecommerce-product-description.html">
                                            <img class="avatar mr-3" src="{{ asset('assets/img/400x400/img6.jpg') }}" alt="Image Description">

                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0">Mango Women's shoe</h5>
                                            </div>
                                        </a>
                                        <!-- End Media -->
                                    </td>
                                    <td><i class="tio-trending-down text-danger mr-1"></i> 53%</td>
                                    <td>$65</td>
                                    <td>5,002</td>
                                    <td>
                                        <h4 class="mb-0">$9,917.45</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!-- Media -->
                                        <a class="media align-items-center" href="ecommerce-product-description.html">
                                            <img class="avatar mr-3" src="{{ asset('assets/img/400x400/img3.jpg') }}" alt="Image Description">

                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0">Calvin Klein t-shirts</h5>
                                            </div>
                                        </a>
                                        <!-- End Media -->
                                    </td>
                                    <td><i class="tio-trending-up text-success mr-1"></i> 50%</td>
                                    <td>$89</td>
                                    <td>4,714</td>
                                    <td>
                                        <h4 class="mb-0">$8,466.02</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!-- Media -->
                                        <a class="media align-items-center" href="ecommerce-product-description.html">
                                            <img class="avatar mr-3" src="{{ asset('assets/img/400x400/img5.jpg') }}" alt="Image Description">

                                            <div class="media-body">
                                                <h5 class="text-hover-primary mb-0">Givenchy perfume</h5>
                                            </div>
                                        </a>
                                        <!-- End Media -->
                                    </td>
                                    <td><i class="tio-trending-up text-success mr-1"></i> 50%</td>
                                    <td>$99</td>
                                    <td>4,155</td>
                                    <td>
                                        <h4 class="mb-0">$7,715.89</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div id="cardFullScreenEg" class="card overflow-hidden mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
                <div class="row align-items-sm-center flex-grow-1">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h4 class="card-header-title">Your top countries <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="This report is based on 100% of sessions."></i></h4>
                    </div>
                    <div class="col-sm-auto">
                        <a class="btn btn-sm btn-ghost-secondary" href="#">View all</a>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-lg">
                        <!-- Stats -->
                        <div class="media align-items-center">
                            <i class="tio-user-big-outlined tio-xl mr-3"></i>

                            <div class="media-body">
                                <span class="d-block font-size-sm">Users</span>
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0">34,413</h3>
                                    <span class="badge badge-soft-success ml-2">
                        <i class="tio-trending-up"></i> 12.5%
                      </span>
                                </div>
                            </div>
                        </div>
                        <!-- End Stats -->

                        <div class="d-lg-none">
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg column-divider-lg">
                        <!-- Stats -->
                        <div class="media align-items-center">
                            <i class="tio-time-20-s tio-xl mr-3"></i>

                            <div class="media-body">
                                <span class="d-block font-size-sm">Avg. session duration</span>
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0">1m 3s</h3>
                                </div>
                            </div>
                        </div>
                        <!-- End Stats -->

                        <div class="d-lg-none">
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg column-divider-lg">
                        <!-- Stats -->
                        <div class="media align-items-center">
                            <i class="tio-pages-outlined tio-xl mr-3"></i>

                            <div class="media-body">
                                <span class="d-block font-size-sm">Pages/Sessions</span>
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0">1.78</h3>
                                </div>
                            </div>
                        </div>
                        <!-- End Stats -->

                        <div class="d-sm-none">
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg column-divider-lg">
                        <!-- Stats -->
                        <div class="media align-items-center">
                            <i class="tio-chart-donut-2 tio-xl mr-3"></i>

                            <div class="media-body">
                                <span class="d-block font-size-sm">Bounce rate</span>
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0">62.9%</h3>
                                </div>
                            </div>
                        </div>
                        <!-- End Stats -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Body -->

            <hr class="my-0">

            <!-- Body -->
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <!-- jVector Map -->
                        <div style="height: 20.5rem;">
                            <div class="js-jvectormap jvectormap-custom"
                                 data-hs-jvector-map-options='{
                         "tipCentered": true,
                         "focusOn": {
                           "x": 0.5,
                           "y": 0.5,
                           "scale": 1
                         },
                         "regionStyle": {
                          "initial": {
                            "fill": "#bdc5d1"
                          },
                          "hover": {
                            "fill": "#77838f"
                          }
                         },
                         "backgroundColor": "#fff",
                         "markerStyle": {
                           "initial": {
                             "stroke-width": 2,
                             "fill": "#377dff",
                             "stroke": "#fff",
                             "r": 6
                           },
                           "hover": {
                            "fill": "#377dff",
                            "stroke": "#fff"
                           }
                         },
                         "markers": [
                           {
                             "latLng": [38, -97],
                             "name": "United States"
                           },
                           {
                             "latLng": [20, 77],
                             "name": "India"
                           },
                           {
                             "latLng": [60, -95],
                             "name": "Canada"
                           },
                           {
                             "latLng": [51, 9],
                             "name": "Germany"
                           },
                           {
                             "latLng": [54, -2],
                             "name": "United Kingdom"
                           }
                         ]
                       }'></div>
                        </div>
                        <!-- End jVector Map -->
                    </div>

                    <!--  Country Table -->
                    <div class="col-lg-5">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead>
                                <tr>
                                    <th class="border-top-0">Country</th>
                                    <th class="border-top-0">Visits</th>
                                    <th class="border-top-0">Purchases</th>
                                    <th class="border-top-0">Change</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <img class="avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Image description" />
                                            <div class="media-body">
                                                USA
                                            </div>
                                        </div>
                                    </td>
                                    <td>10,013</td>
                                    <td>$5,361</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            73.2% <i class="tio-trending-up text-success ml-1"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <img class="avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/in.svg') }}" alt="Image description" />
                                            <div class="media-body">
                                                India
                                            </div>
                                        </div>
                                    </td>
                                    <td>8,545</td>
                                    <td>$4,923</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            45.8% <i class="tio-trending-down text-danger ml-1"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <img class="avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/ca.svg') }}" alt="Image description" />
                                            <div class="media-body">
                                                Canada
                                            </div>
                                        </div>
                                    </td>
                                    <td>6,837</td>
                                    <td>$3,954</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            24.4% <i class="tio-trending-up text-success ml-1"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <img class="avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/de.svg') }}" alt="Image description" />
                                            <div class="media-body">
                                                Germany
                                            </div>
                                        </div>
                                    </td>
                                    <td>4,512</td>
                                    <td>$2,512</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            12.8% <i class="tio-trending-up text-success ml-1"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <img class="avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/gb.svg') }}" alt="Image description" />
                                            <div class="media-body">
                                                UK
                                            </div>
                                        </div>
                                    </td>
                                    <td>3,795</td>
                                    <td>$1,173</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            67.9% <i class="tio-trending-down text-danger ml-1"></i>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card">
            <div class="row">
                <!--  Total Sales Chart -->
                <div class="col-lg-6">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Total sales <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i></h4>

                        <div class="row align-items-sm-center mb-5">
                            <div class="col-sm">
                                <span class="display-4 text-dark mr-2">$597,820.75</span>
                            </div>

                            <div class="col-sm-auto">
                    <span class="h3 text-success">
                      <i class="tio-trending-up"></i> 25.9%
                    </span>
                                <span class="d-block">&mdash; 1,347,935 orders <span class="badge badge-soft-dark badge-pill ml-1">+$97k today</span></span>
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom mb-4" style="height: 18rem;">
                            <canvas class="js-chart"
                                    data-hs-chartjs-options='{
                            "type": "line",
                            "data": {
                               "labels": ["1AM","2AM","3AM","4AM","5AM","6AM","7AM","8AM","9AM","10AM"],
                               "datasets": [{
                                "data": [200, 200, 240, 350, 200, 350, 200, 250, 285, 220],
                                "backgroundColor": "transparent",
                                "borderColor": "#377dff",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#377dff",
                                "pointBackgroundColor": "#377dff",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              },
                              {
                                "data": [150, 230, 382, 204, 269, 290, 200, 250, 200, 225],
                                "backgroundColor": "transparent",
                                "borderColor": "#e7eaf3",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#e7eaf3",
                                "pointBackgroundColor": "#e7eaf3",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              }]
                            },
                            "options": {
                               "scales": {
                                  "yAxes": [{
                                    "gridLines": {
                                      "color": "#e7eaf3",
                                      "drawBorder": false,
                                      "zeroLineColor": "#e7eaf3"
                                    },
                                    "ticks": {
                                      "beginAtZero": true,
                                      "stepSize": 100,
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 10,
                                      "prefix": "$",
                                      "postfix": "k"
                                    }
                                  }],
                                  "xAxes": [{
                                    "gridLines": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 5
                                    }
                                  }]
                              },
                              "tooltips": {
                                "prefix": "$",
                                "postfix": "k",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false,
                                "lineMode": true,
                                "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'>
                            </canvas>
                        </div>
                        <!-- End Bar Chart -->

                        <!-- Legend Indicators -->
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator"></span> Yesterday
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> Today
                            </div>
                        </div>
                        <!-- End Legend Indicators -->
                    </div>
                    <!-- End Body -->

                    <div class="d-lg-none">
                        <hr>
                    </div>
                </div>

                <!--  Visitors Chart -->
                <div class="col-lg-6 column-divider-lg">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Visitors</h4>

                        <div class="row align-items-sm-center mb-5">
                            <div class="col-sm">
                                <span class="display-4 text-dark mr-2">831,071</span>
                            </div>

                            <div class="col-sm-auto">
                    <span class="h3 text-danger">
                      <i class="tio-trending-down"></i> 16%
                    </span>
                                <span class="d-block">&mdash; 467,001 unique <span class="badge badge-soft-dark badge-pill ml-1">+7k today</span></span>
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom mb-4" style="height: 18rem;">
                            <canvas class="js-chart"
                                    data-hs-chartjs-options='{
                            "type": "line",
                            "data": {
                               "labels": ["1AM","2AM","3AM","4AM","5AM","6AM","7AM","8AM","9AM","10AM"],
                               "datasets": [{
                                "data": [20, 20, 24, 15, 30, 35, 20, 28, 18, 16],
                                "backgroundColor": "transparent",
                                "borderColor": "#377dff",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#377dff",
                                "pointBackgroundColor": "#377dff",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              },
                              {
                                "data": [15, 23, 18, 20, 36, 29, 20, 22, 20, 22],
                                "backgroundColor": "transparent",
                                "borderColor": "#e7eaf3",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#e7eaf3",
                                "pointBackgroundColor": "#e7eaf3",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              }]
                            },
                            "options": {
                               "scales": {
                                  "yAxes": [{
                                    "gridLines": {
                                      "color": "#e7eaf3",
                                      "drawBorder": false,
                                      "zeroLineColor": "#e7eaf3"
                                    },
                                    "ticks": {
                                      "beginAtZero": true,
                                      "stepSize": 10,
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 10,
                                      "postfix": "k"
                                    }
                                  }],
                                  "xAxes": [{
                                    "gridLines": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 5
                                    }
                                  }]
                              },
                              "tooltips": {
                                "postfix": "k",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false,
                                "lineMode": true,
                                "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'>
                            </canvas>
                        </div>
                        <!-- End Bar Chart -->

                        <!-- Legend Indicators -->
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator"></span> Yesterday
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> Today
                            </div>
                        </div>
                        <!-- End Legend Indicators -->
                    </div>
                    <!-- End Body -->
                </div>
            </div>
            <!-- End Row -->

            <hr class="my-0">

            <div class="row">
                <!--  Total Orders Chart -->
                <div class="col-lg-6">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Total orders</h4>

                        <div class="row align-items-sm-center mb-5">
                            <div class="col-sm">
                                <span class="display-4 text-dark mr-2">1,348,935</span>
                            </div>

                            <div class="col-sm-auto">
                    <span class="h3 text-success">
                      <i class="tio-trending-up"></i> 4.7%
                    </span>
                                <span class="d-block">&mdash; orders over time <span class="badge badge-soft-dark badge-pill ml-1">+5k today</span></span>
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom mb-4" style="height: 18rem;">
                            <canvas class="js-chart"
                                    data-hs-chartjs-options='{
                            "type": "line",
                            "data": {
                               "labels": ["1AM","2AM","3AM","4AM","5AM","6AM","7AM","8AM","9AM","10AM"],
                               "datasets": [{
                                "data": [15, 26, 29, 20, 23, 38, 20, 30, 20, 22],
                                "backgroundColor": "transparent",
                                "borderColor": "#377dff",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#377dff",
                                "pointBackgroundColor": "#377dff",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              },
                              {
                                "data": [20, 20, 15, 18, 20, 24, 35, 20, 35, 22],
                                "backgroundColor": "transparent",
                                "borderColor": "#e7eaf3",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#e7eaf3",
                                "pointBackgroundColor": "#e7eaf3",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              }]
                            },
                            "options": {
                               "scales": {
                                  "yAxes": [{
                                    "gridLines": {
                                      "color": "#e7eaf3",
                                      "drawBorder": false,
                                      "zeroLineColor": "#e7eaf3"
                                    },
                                    "ticks": {
                                      "beginAtZero": true,
                                      "stepSize": 10,
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 10,
                                      "postfix": "k"
                                    }
                                  }],
                                  "xAxes": [{
                                    "gridLines": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 5
                                    }
                                  }]
                              },
                              "tooltips": {
                                "postfix": "k",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false,
                                "lineMode": true,
                                "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'>
                            </canvas>
                        </div>
                        <!-- End Bar Chart -->

                        <!-- Legend Indicators -->
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator"></span> Yesterday
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> Today
                            </div>
                        </div>
                        <!-- End Legend Indicators -->
                    </div>
                    <!-- End Body -->

                    <div class="d-lg-none">
                        <hr>
                    </div>
                </div>

                <!--  Refunded Chart -->
                <div class="col-lg-6 column-divider-lg">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Refunded</h4>

                        <div class="row align-items-sm-center mb-5">
                            <div class="col-sm">
                                <span class="display-4 text-dark mr-2">52,441</span>
                            </div>

                            <div class="col-sm-auto">
                    <span class="h3 text-success">
                      <i class="tio-trending-up"></i> 11%
                    </span>
                                <span class="d-block">&mdash; refunds over time <span class="badge badge-soft-dark badge-pill ml-1">+21 today</span></span>
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom mb-4" style="height: 18rem;">
                            <canvas class="js-chart"
                                    data-hs-chartjs-options='{
                            "type": "line",
                            "data": {
                               "labels": ["1AM","2AM","3AM","4AM","5AM","6AM","7AM","8AM","9AM","10AM"],
                               "datasets": [{
                                "data": [10, 20, 22, 15, 20, 15, 20, 19, 14, 15],
                                "backgroundColor": "transparent",
                                "borderColor": "#377dff",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#377dff",
                                "pointBackgroundColor": "#377dff",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              },
                              {
                                "data": [15, 13, 18, 10, 16, 19, 15, 14, 10, 26],
                                "backgroundColor": "transparent",
                                "borderColor": "#e7eaf3",
                                "borderWidth": 2,
                                "pointRadius": 0,
                                "hoverBorderColor": "#e7eaf3",
                                "pointBackgroundColor": "#e7eaf3",
                                "pointBorderColor": "#fff",
                                "pointHoverRadius": 0
                              }]
                            },
                            "options": {
                               "scales": {
                                  "yAxes": [{
                                    "gridLines": {
                                      "color": "#e7eaf3",
                                      "drawBorder": false,
                                      "zeroLineColor": "#e7eaf3"
                                    },
                                    "ticks": {
                                      "beginAtZero": true,
                                      "stepSize": 10,
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 10
                                    }
                                  }],
                                  "xAxes": [{
                                    "gridLines": {
                                      "display": false,
                                      "drawBorder": false
                                    },
                                    "ticks": {
                                      "fontSize": 12,
                                      "fontColor": "#97a4af",
                                      "fontFamily": "Open Sans, sans-serif",
                                      "padding": 5
                                    }
                                  }]
                              },
                              "tooltips": {
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false,
                                "lineMode": true,
                                "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'>
                            </canvas>
                        </div>
                        <!-- End Bar Chart -->

                        <!-- Legend Indicators -->
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <span class="legend-indicator"></span> Yesterday
                            </div>
                            <div class="col-auto">
                                <span class="legend-indicator bg-primary"></span> Today
                            </div>
                        </div>
                        <!-- End Legend Indicators -->
                    </div>
                    <!-- End Body -->
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
