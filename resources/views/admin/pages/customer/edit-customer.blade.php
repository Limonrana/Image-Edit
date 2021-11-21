@extends('admin.layout.layout')

@section('title', 'Edit Customer - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('customers.index') }}">Customers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer details</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ $customer->name }}</h1>
                </div>

{{--                <div class="col-sm-auto">--}}
{{--                    <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle mr-1" href="#" data-toggle="tooltip" data-placement="top" title="Previous customer">--}}
{{--                        <i class="tio-arrow-backward"></i>--}}
{{--                    </a>--}}
{{--                    <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Next customer">--}}
{{--                        <i class="tio-arrow-forward"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-8">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Body -->
                    <div class="card-body">
                        <!-- Media -->
                        <div class="d-flex align-items-center mb-5">
                            @if ($customer->profile_photo_path !== null)
                                <div class="avatar avatar-lg avatar-circle">
                                    <img class="avatar-img" src="{{ asset($customer->image->path) }}" alt="{{$customer->name}}">
                                </div>
                            @else
                                <div class="avatar avatar-lg avatar-soft-primary avatar-circle">
                                    <span class="avatar-initials">{{ substr($customer->name, 0, 1) }}</span>
                                </div>
                            @endif

                            <div class="mx-3">
                                <div class="d-flex mb-1">
                                    <h3 class="mb-0 mr-3">{{ $customer->name }}</h3>

                                    <!-- Unfold -->
                                    <div class="hs-unfold">
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-white rounded-circle" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Edit"
                                           data-hs-unfold-options='{
                                             "target": "#editDropdown",
                                             "type": "css-animation"
                                           }'>
                                            <i class="tio-edit"></i>
                                        </a>

                                        <div id="editDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-card mt-1" style="min-width: 20rem;">
                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-6">
                                                            <label for="firstNameLabel" class="input-label">First name</label>
                                                            <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice" value="{{ explode(' ', $customer->name)[0] }}">
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label for="lastNameLabel" class="input-label">Last name</label>
                                                            <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone" value="{{ explode(' ', $customer->name)[1] }}">
                                                        </div>
                                                    </div>
                                                    <!-- End Row -->

                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="button" class="btn btn-sm btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Body -->
                                        </div>
                                    </div>
                                    <!-- End Unfold -->
                                </div>

                                <span class="font-size-sm">Customer for {{ $customer->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="d-none d-sm-inline-block ml-auto text-right">
                                <!-- Unfold -->
                                <div class="hs-unfold">
                                    <a class="js-hs-unfold-invoker btn btn-sm btn-white" href="javascript:;"
                                       data-hs-unfold-options='{
                                           "target": "#actionsDropdown",
                                           "type": "css-animation"
                                         }'>
                                        Actions <i class="tio-chevron-down"></i>
                                    </a>

                                    <div id="actionsDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu mt-1">
                                        <a class="dropdown-item" href="mailto:{{ $customer->email }}">
                                            <i class="tio-email-outlined dropdown-item-icon"></i> Email
                                        </a>
                                        <a class="dropdown-item" href="tel:{{ $customer->phone }}">
                                            <i class="tio-call dropdown-item-icon"></i> Call
                                        </a>
                                    </div>
                                </div>
                                <!-- End Unfold -->
                            </div>
                        </div>
                        <!-- End Media -->

                        <!-- Body -->
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
                                <li class="py-0">
                                    <small class="card-subtitle">About</small>
                                </li>

                                <li>
                                    <i class="tio-user-outlined nav-icon"></i>
                                    {{ $customer->name }}
                                </li>
                                <li>
                                    <i class="tio-city nav-icon"></i>
                                    {{ isset($customer->address->company_name) ? $customer->address->company_name : 'Not Provided' }}
                                </li>

                                <li class="pt-2 pb-0">
                                    <small class="card-subtitle">Contacts</small>
                                </li>

                                <li>
                                    <i class="tio-online nav-icon"></i>
                                    {{ $customer->email }}
                                </li>
                                <li>
                                    <i class="tio-android-phone-vs nav-icon"></i>
                                    {{ $customer->phone }}
                                </li>
                            </ul>
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- Body -->

                    <!-- Footer -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <div id="editUserPopover" data-toggle="popover-dark" data-placement="left" title="<div class='d-flex align-items-center'>Edit user <a href='#!' class='close close-light ml-auto'><i id='closeEditUserPopover' class='tio-clear'></i></a></div>" data-content="Check out this Edit user modal example." data-html="true">
                                <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#editUserModal">
                                    <i class="tio-edit"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm mb-3 mb-sm-0">
                                <h4 class="card-header-title">Orders placed</h4>
                            </div>

                            <div class="col-sm-auto">
                                <!-- Nav -->
                                <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-sm-down-break"
                                    data-hs-transform-tabs-to-btn-options='{
                                      "transformResolution": "sm",
                                      "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center"
                                    }'>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">All orders</a>
                                    </li>
                                </ul>
                                <!-- End Nav -->

                                <!-- Datatable Info -->
                                <div id="datatableCounterInfo" style="display: none;">
                                    <div class="d-flex align-items-center">
                                        <span class="font-size-sm mr-3">
                                          <span id="datatableCounter">0</span>
                                          Selected
                                        </span>
                                        <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                            <i class="tio-delete-outlined"></i> Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- End Datatable Info -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Input Group -->
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="tio-search"></i>
                                </span>
                            </div>

                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search orders" aria-label="Search orders">
                        </div>
                        <!-- End Input Group -->
                    </div>
                    <!-- End Body -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                                 "columnDefs": [{
                                    "targets": [0, 5],
                                    "orderable": false
                                  }],
                                 "order": [],
                                 "info": {
                                   "totalQty": "#datatableWithPaginationInfoTotalQty"
                                 },
                                 "search": "#datatableSearch",
                                 "entries": "#datatableEntries",
                                 "pageLength": 5,
                                 "isResponsive": false,
                                 "isShowPaging": false,
                                 "pagination": "datatablePagination"
                               }'>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="datatableCheckAll"></label>
                                    </div>
                                </th>
                                <th class="table-column-pl-0">Order</th>
                                <th>Date</th>
                                <th>Payment status</th>
                                <th>Total</th>
                                <th>Invoice</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck1">
                                        <label class="custom-control-label" for="ordersCheck1"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#35463</a>
                                </td>
                                <td>Aug 17, 2020</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                </td>
                                <td>$256.39</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck2">
                                        <label class="custom-control-label" for="ordersCheck2"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#23513</a>
                                </td>
                                <td>Aug 17, 2020</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                </td>
                                <td>$2,125.00</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck3">
                                        <label class="custom-control-label" for="ordersCheck3"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#62311</a>
                                </td>
                                <td>Aug 03, 2020</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                </td>
                                <td>$532.99</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck4">
                                        <label class="custom-control-label" for="ordersCheck4"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#12453</a>
                                </td>
                                <td>July 29, 2020</td>
                                <td>
                                    <span class="badge badge-soft-warning">
                                      <span class="legend-indicator bg-warning"></span>Pending
                                    </span>
                                </td>
                                <td>$1,035.02</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck5">
                                        <label class="custom-control-label" for="ordersCheck5"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#84223</a>
                                </td>
                                <td>July 11, 2020</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                </td>
                                <td>$68.53</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck6">
                                        <label class="custom-control-label" for="ordersCheck6"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#46542</a>
                                </td>
                                <td>July 04, 2020</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                </td>
                                <td>$100.00</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck7">
                                        <label class="custom-control-label" for="ordersCheck7"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a class="text-danger" href="ecommerce-order-details.html">#35378</a>
                                    <i class="tio-warning text-warning"></i>
                                </td>
                                <td>June 27, 2020</td>
                                <td>
                                    <span class="badge badge-soft-warning">
                                      <span class="legend-indicator bg-warning"></span>Pending
                                    </span>
                                </td>
                                <td class="text-danger">$89.46</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck8">
                                        <label class="custom-control-label" for="ordersCheck8"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a class="text-danger" href="ecommerce-order-details.html">#24562</a>
                                    <i class="tio-warning text-warning"></i>
                                </td>
                                <td>June 15, 2020</td>
                                <td>
                                    <span class="badge badge-soft-warning">
                                      <span class="legend-indicator bg-warning"></span>Pending
                                    </span>
                                </td>
                                <td class="text-danger">$3,535.46</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck9">
                                        <label class="custom-control-label" for="ordersCheck9"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#78531</a>
                                </td>
                                <td>June 12, 2020</td>
                                <td>
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                </td>
                                <td>$23.89</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck10">
                                        <label class="custom-control-label" for="ordersCheck10"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#34634</a>
                                </td>
                                <td>June 02, 2020</td>
                                <td>
                        <span class="badge badge-soft-success">
                          <span class="legend-indicator bg-success"></span>Paid
                        </span>
                                </td>
                                <td>$77.00</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck11">
                                        <label class="custom-control-label" for="ordersCheck11"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a class="text-danger" href="ecommerce-order-details.html">#93817</a>
                                    <i class="tio-warning text-warning"></i>
                                </td>
                                <td>May 30, 2020</td>
                                <td>
                        <span class="badge badge-soft-warning">
                          <span class="legend-indicator bg-warning"></span>Pending
                        </span>
                                </td>
                                <td class="text-danger">$77.00</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck12">
                                        <label class="custom-control-label" for="ordersCheck12"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#43113</a>
                                </td>
                                <td>May 25, 2020</td>
                                <td>
                        <span class="badge badge-soft-success">
                          <span class="legend-indicator bg-success"></span>Paid
                        </span>
                                </td>
                                <td>$1,421.47</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck13">
                                        <label class="custom-control-label" for="ordersCheck13"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="ecommerce-order-details.html">#12412</a>
                                </td>
                                <td>May 16, 2020</td>
                                <td>
                        <span class="badge badge-soft-success">
                          <span class="legend-indicator bg-success"></span>Paid
                        </span>
                                </td>
                                <td>$45.00</td>
                                <td>
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#invoiceReceiptModal">
                                        <i class="tio-receipt-outlined mr-1"></i> Invoice
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                            <div class="col-sm mb-2 mb-sm-0">
                                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                    <span class="mr-2">Showing:</span>

                                    <!-- Select -->
                                    <select id="datatableEntries" class="js-select2-custom"
                                            data-hs-select2-options='{
                                                "minimumResultsForSearch": "Infinity",
                                                "customClass": "custom-select custom-select-sm custom-select-borderless",
                                                "dropdownAutoWidth": true,
                                                "width": true
                                              }'>
                                        <option value="12" selected>5</option>
                                        <option value="14">10</option>
                                        <option value="16">13</option>
                                    </select>
                                    <!-- End Select -->

                                    <span class="text-secondary mr-2">of</span>

                                    <!-- Pagination Quantity -->
                                    <span id="datatableWithPaginationInfoTotalQty"></span>
                                </div>
                            </div>

                            <div class="col-sm-auto">
                                <div class="d-flex justify-content-center justify-content-sm-end">
                                    <!-- Pagination -->
                                    <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                                </div>
                            </div>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <!-- End Footer -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Timeline</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Step -->
                        <ul class="step step-icon-sm">
                            <!-- Step Item -->
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <small class="step-divider">Account Activities</small>
                                </div>
                            </li>
                            <!-- End Step Item -->

                            <!-- Step Item -->
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                    <div class="step-content">
                                        <h5 class="mb-0">Customer verified the account.</h5>
                                        <p class="font-size-sm mb-0">{{ $customer->email_varified_at ? $customer->email_varified_at->diffForHumans() : 'Not Verified' }}</p>
                                    </div>
                                </div>
                            </li>
                            <!-- End Step Item -->

                            <!-- Step Item -->
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                    <div class="step-content">
                                        <h5 class="mb-0">Customer added the billing details.</h5>
                                        <p class="font-size-sm mb-0">{{ $customer->created_at }}</p>
                                    </div>
                                </div>
                            </li>
                            <!-- End Step Item -->

                            <!-- Step Item -->
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                    <div class="step-content">
                                        <h5 class="mb-0">CUstomer created this customer.</h5>
                                        <p class="font-size-sm mb-0">{{ $customer->created_at }}</p>
                                    </div>
                                </div>
                            </li>
                            <!-- End Step Item -->
                        </ul>
                        <!-- End Step -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <div class="d-none d-lg-block">
                    <a href="{{ route('customers.destroy', $customer->id) }}" class="btn btn-danger" id="delete">Delete customer</a>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Contact info</h5>
                        </div>

                        <ul class="list-unstyled list-unstyled-py-2">
                            <li>
                                <i class="tio-online mr-2"></i>
                                {{ $customer->email }}
                            </li>
                            <li>
                                <i class="tio-android-phone-vs mr-2"></i>
                                {{ $customer->phone }}
                            </li>
                        </ul>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Billing address</h5>
                        </div>

                        <!-- Leaflet (Map) -->
                        <div id="map" class="leaflet-custom rounded mt-1 mb-3" style="min-height: 10rem;"
                             data-hs-leaflet-options='{
                               "map": {
                                 "scrollWheelZoom": false,
                                 "coords": [37.4040344, -122.0289704]
                               },
                               "marker": [
                                 {
                                   "coords": [37.4040344, -122.0289704],
                                   "icon": {
                                     "iconUrl": "{{ asset('assets/svg/components/map-pin.png') }}",
                                     "iconSize": [20, 15]
                                   },
                                   "popup": {
                                     "text": "{{ $address->city.', ' .$address->state.', '.$address->getCountry->name  }}"
                                   }
                                 }
                               ]
                              }'></div>
                        <!-- End Leaflet (Map) -->

                        <span class="d-block">
                          {{ $address->address_line_1 }}<br>
                          {{ $address->address_line_2 ?? $address->address_line_2 }}<br>
                          {{ $address->city }}, {{ $address->state }} - {{ $address->zip_code }}<br>
                          {{ $address->getCountry->name }}
                        </span>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h5>Email marketing</h5>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                <span class="h3">
                  <span class="badge badge-soft-dark badge-pill">Subscribed</span>
                </span>
                    </div>
                    <!-- Body -->
                </div>
            </div>
        </div>
        <!-- End Row -->

        <div class="d-lg-none">
            <a href="{{ route('customers.destroy', $customer->id) }}" class="btn btn-danger" id="delete">Delete customer</a>
        </div>
    </div>
    <!-- End Content -->

    <!-- Edit user Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="editUserModalTitle" class="modal-title">Edit customer details</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <!-- Nav -->
                    <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-lg-down-break mb-5" id="editUserModalTab" role="tablist"
                        data-hs-transform-tabs-to-btn-options='{
                          "transformResolution": "lg",
                          "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center mb-3"
                        }'>
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab">
                                <i class="tio-user-outlined mr-1"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="billing-address-tab" data-toggle="tab" href="#billing-address" role="tab">
                                <i class="tio-city mr-1"></i> Billing address
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="editUserModalTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- Profile Cover -->
                                <div class="profile-cover">
                                    <div class="profile-cover-img-wrapper">
                                        <img id="editProfileCoverImgModal" class="profile-cover-img" src="{{ asset('assets/img/1920x400/img1.jpg') }}" alt="editAvatarUploaderModal">
                                    </div>
                                </div>
                                <!-- End Profile Cover -->

                                <!-- Avatar -->
                                <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar mb-5" for="editAvatarUploaderModal">
                                    <img id="editAvatarImgModal" class="avatar-img" src="{{ asset($customer->profile_photo_path ? $customer->image->path :'assets/img/160x160/img1.jpg') }}" alt="{{ $customer->name }}">
                                    <input type="file" name="avatar" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
                                           data-hs-file-attach-options='{
                                                "textTarget": "#editAvatarImgModal",
                                                "mode": "image",
                                                "targetAttr": "src",
                                                "allowTypes": [".png", ".jpeg", ".jpg"]
                                             }'>

                                    <span class="avatar-uploader-trigger">
                                      <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                    </span>
                                </label>
                                <!-- End Avatar -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Full name <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Displayed on public forums, such as Front."></i></label>

                                    <div class="col-sm-9">
                                        <div class="js-form-message input-group input-group-sm-down-break">
                                            <input type="text" class="form-control" name="firstName" id="editFirstNameModalLabel" placeholder="Your first name" aria-label="Your first name" required value="{{ explode(' ', $customer->name)[0] }}">
                                            <input type="text" class="form-control" name="lastName" id="editLastNameModalLabel" placeholder="Your last name" aria-label="Your last name" required value="{{ explode(' ', $customer->name)[1] }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editEmailModalLabel" class="col-sm-3 col-form-label input-label">Email</label>

                                    <div class="col-sm-9">
                                        <div class="js-form-message">
                                            <input type="email" class="form-control" name="email" id="editEmailModalLabel" required placeholder="Email" aria-label="Email" value="{{ $customer->email }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editPhoneLabel" class="col-sm-3 col-form-label input-label">Phone</label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-down-break align-items-center">
                                            <input type="text" class="js-masked-input form-control" name="phone" required id="editPhoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="{{ $customer->phone }}"
                                                   data-hs-mask-options='{
                                                       "template": "00000000000"
                                                   }'>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="billing-address" role="tabpanel" aria-labelledby="billing-address-tab">
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="address" value="{{ $address->id }}">
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editLocationModalLabel" class="col-sm-3 col-form-label input-label">Location</label>

                                    <div class="col-sm-9">
                                        <!-- Select -->
                                        <div class="js-form-message mb-3">
                                            <select class="js-select2-custom custom-select" name="country" required size="1" style="opacity: 0;" id="editLocationModalLabel"
                                                    data-hs-select2-options='{
                                                        "customClass": "custom-select",
                                                        "placeholder": "Select country",
                                                        "searchInputPlaceholder": "Search a country"
                                                    }'>
                                                <option label="empty"></option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" @if($address->country == $country->id) selected @endif data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/'.strtolower($country->iso2).'.svg') }}" alt="{{ $country->name }} Flag" /><span class="text-truncate">{{ $country->name }}</span></span>'>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Select -->

                                        <div class="js-form-message mb-3">
                                            <input type="text" class="form-control" name="city" required id="editCityModalLabel" placeholder="City" aria-label="City" value="{{ $address->city }}">
                                        </div>
                                        <input type="text" class="form-control" name="state" required id="editStateModalLabel" placeholder="State" aria-label="State" value="{{ $address->state }}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editAddressLine1ModalLabel" class="col-sm-3 col-form-label input-label">Address line 1</label>

                                    <div class="col-sm-9">
                                        <div class="js-form-message">
                                            <input type="text" class="form-control" name="address_1" required id="editAddressLine1ModalLabel" placeholder="Your address" aria-label="Your address" value="{{ $address->address_line_1 }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editAddressLine2ModalLabel" class="col-sm-3 col-form-label input-label">Address line 2 <span class="input-label-secondary">(Optional)</span></label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address_2" id="editAddressLine2ModalLabel" placeholder="Your address" aria-label="Your address" value="{{ $address->address_line_2 }}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="editZipCodeModalLabel" class="col-sm-3 col-form-label input-label">Zip code <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                    <div class="col-sm-9">
                                        <div class="js-form-message">
                                            <input type="text" class="js-masked-input form-control" name="zip_code" required id="editZipCodeModalLabel" placeholder="Your zip code" aria-label="Your zip code" value="{{ $address->zip_code }}"
                                                   data-hs-mask-options='{
                                                       "template": "000000"
                                                     }'>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-white" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <span class="mx-2"></span>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Edit user Modal -->

@endsection

@section('script')
    <script>
        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        var quill = $.HSCore.components.HSQuill.init('.js-quill');
        var quill = $.HSCore.components.HSQuill.init('.js-quill-step');

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function() {
            $.HSCore.components.HSValidation.init($(this));
        });

        // INITIALIZATION OF MASKED INPUT
        // =======================================================
        $('.js-masked-input').each(function () {
            var mask = $.HSCore.components.HSMask.init($(this));
        });

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });


        // INITIALIZATION OF ADD INPUT FILED
        // =======================================================
        $('.js-add-field').each(function () {
            new HSAddField($(this), {
                addedField: function() {
                    $('.js-add-field .js-select2-custom-dynamic').each(function () {
                        var select2dynamic = $.HSCore.components.HSSelect2.init($(this));
                    });
                }
            }).init();
        });

        // INITIALIZATION OF LEAFLET
        // =======================================================
        $('#map').each(function () {
            var leaflet = $.HSCore.components.HSLeaflet.init($(this)[0]);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                id: 'mapbox/light-v9'
            }).addTo(leaflet);
        });

        // $('#title').keyup(function () {
        //     $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        //     $('#meta_title').val($(this).val());
        // });

    </script>
@endsection
