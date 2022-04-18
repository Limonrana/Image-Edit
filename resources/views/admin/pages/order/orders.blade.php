@extends('admin.layout.layout')

@section('title', 'Orders - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm">
                    <h1 class="page-header-title">Orders <span class="badge badge-soft-dark ml-2">{{ count($orders) }}</span></h1>
                </div>
            </div>
            <!-- End Row -->

            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="tio-chevron-left"></i>
              </a>
            </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="tio-chevron-right"></i>
              </a>
            </span>

                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link @if($query_string === 'all') active @endif" href="{{ route('orders.index', ['status' => 'all']) }}">All Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($query_string === 'open') active @endif" href="{{ route('orders.index', ['status' => 'open']) }}">Open</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($query_string === 'unpaid') active @endif" href="{{ route('orders.index', ['status' => 'unpaid']) }}">Unpaid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($query_string === 'delivered') active @endif" href="{{ route('orders.index', ['status' => 'delivered']) }}">Delivered</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($query_string === 'completed') active @endif" href="{{ route('orders.index', ['status' => 'completed']) }}">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($query_string === 'cancelled') active @endif" href="{{ route('orders.index', ['status' => 'cancelled']) }}">Cancelled</a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search orders" aria-label="Search orders">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                            <!-- Datatable Info -->
                            <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
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
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table" style="width: 100%"
                       data-hs-datatables-options='{
                             "columnDefs": [{
                                "targets": [0],
                                "orderable": false
                              }],
                             "order": [],
                             "info": {
                               "totalQty": "#datatableWithPaginationInfoTotalQty"
                             },
                             "search": "#datatableSearch",
                             "entries": "#datatableEntries",
                             "pageLength": 10,
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
                        <th>Customer</th>
                        <th>Payment status</th>
                        <th>Fulfillment status</th>
                        <th>Payment method</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ordersCheck1">
                                        <label class="custom-control-label" for="ordersCheck1"></label>
                                    </div>
                                </td>
                                <td class="table-column-pl-0">
                                    <a href="{{ route('orders.edit', $order->order_number) }}">
                                        #ORDER-{{ $order->order_number }}
                                    </a>
                                </td>
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="text-body" href="{{ route('orders.edit', $order->order_number) }}">{{ $order->user->name }}</a>
                                </td>
                                <td>
                                    <span class="badge @if($order->payment_status === 'Paid') badge-soft-success @else badge-soft-danger @endif">
                                      <span class="legend-indicator @if($order->payment_status === 'Paid') bg-success @else bg-danger @endif"></span>{{ $order->payment_status }}
                                    </span>
                                </td>
                                <td>
                                    @if ($order->status === 0)
                                        <span class="badge badge-soft-warning">
                                          <span class="legend-indicator bg-warning"></span>UnderReview
                                        </span>
                                    @elseif($order->status === 1)
                                        <span class="badge badge-soft-info">
                                          <span class="legend-indicator bg-info"></span>Open
                                        </span>
                                    @elseif($order->status === 2)
                                        <span class="badge badge-soft-dark">
                                          <span class="legend-indicator btn-ghost-dark"></span>Delivered
                                        </span>
                                    @elseif($order->status === 3)
                                        <span class="badge badge-soft-success">
                                          <span class="legend-indicator bg-success"></span>Completed
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger">
                                          <span class="legend-indicator bg-danger"></span>Cancelled
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($order->payment_method === 'Paypal')
                                    <div class="d-flex align-items-center">
                                        <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/brands/paypal.svg') }}" alt="PaypalPay">
                                        <span class="text-dark">&bull;&bull;&bull;&bull;{{ $order->transaction_id ? substr($order->transaction_id, -10) : 'UNPAID' }}</span>
                                    </div>
                                    @elseif($order->payment_method === 'Card')
                                    <div class="d-flex align-items-center">
                                        <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/brands/mastercard.svg') }}" alt="CardPay">
                                        <span class="text-dark">&bull;&bull;&bull;&bull; {{ $order->transaction_id ? substr($order->transaction_id, -10) : 'UNPAID' }}</span>
                                    </div>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/brands/paypal.svg') }}" alt="PaypalPay">
                                            <span class="text-danger">Manually</span>
                                        </div>
                                    @endif
                                </td>
                                <td>${{  number_format(floatval($order->total), 2, '.', '') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-sm btn-white" href="{{ route('orders.edit', $order->order_number) }}">
                                            <i class="tio-visible-outlined"></i> View
                                        </a>

                                        <!-- Unfold -->
                                        <div class="hs-unfold btn-group">
                                            <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                                               data-hs-unfold-options='{
                                             "target": "#ordersExportDropdown{{ $order->id }}",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                                            <div id="ordersExportDropdown{{ $order->id }}" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                                <span class="dropdown-header">Options</span>
                                                <a class="js-export-copy dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/illustrations/copy.svg') }}" alt="Image Description">
                                                    Published
                                                </a>
                                                <a class="js-export-print dropdown-item" href="javascript:;">
                                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="{{ asset('assets/svg/illustrations/print.svg') }}" alt="Image Description">
                                                    Print
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <span class="dropdown-header">Delete options</span>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="tio-delete-outlined dropdown-item-icon"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Unfold -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
                                @if (count($orders) > 5)
                                    @for($i = 5; $i <= count($orders); $i += 5)
                                        <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                    <option value="{{ count($orders) }}">{{ count($orders) }}</option>
                                @else
                                    <option value="{{ count($orders) }}" selected>{{ count($orders) }}</option>
                                @endif
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
    </div>
    <!-- End Content -->
@endsection
