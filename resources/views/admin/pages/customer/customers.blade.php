@extends('admin.layout.layout')

@section('title', 'Customers - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Customers <span class="badge badge-soft-dark ml-2">97,524</span></h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{ route('customers.create') }}">Add customers</a>
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
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
            <!-- Body -->
            <div class="card-body">
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
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search customers..." aria-label="Search orders">
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

                            <!-- Unfold -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-white" href="javascript:;"
                                   data-hs-unfold-options='{
                                     "target": "#showHideDropdown",
                                     "type": "css-animation"
                                   }'>
                                    <i class="tio-table mr-1"></i> Columns <span class="badge badge-soft-dark rounded-circle ml-1">8</span>
                                </a>

                                <div id="showHideDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right dropdown-card" style="width: 15rem;">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">Name</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_name">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_name" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">E-mail</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_email">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_email" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">Phone</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_phone">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_phone" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">Country</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_country">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_country" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">Account status</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_account_status">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_account_status" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">Orders</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_orders">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_orders" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="mr-2">Total spent</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_total_spent">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_total_spent" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="mr-2">Last activity</span>

                                                <!-- Checkbox Switch -->
                                                <label class="toggle-switch toggle-switch-sm" for="toggleColumn_last_activity">
                                                    <input type="checkbox" class="toggle-switch-input" id="toggleColumn_last_activity" checked>
                                                    <span class="toggle-switch-label">
                                                        <span class="toggle-switch-indicator"></span>
                                                    </span>
                                                </label>
                                                <!-- End Checkbox Switch -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Unfold -->
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Body -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="customerTable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
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
                         "pageLength": 15,
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
                        <th class="table-column-pl-0">Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Account status</th>
                        <th>Orders</th>
                        <th>Total spent</th>
                        <th>Last activity</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                        <td class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="usersDataCheck{{$customer->id}}">
                                <label class="custom-control-label" for="usersDataCheck{{$customer->id}}"></label>
                            </div>
                        </td>
                        <td class="table-column-pl-0">
                            <a class="d-flex align-items-center" href="{{ route('customers.edit', $customer->id) }}">
                                @if ($customer->profile_photo_path !== null)
                                    <div class="avatar avatar-circle">
                                        <img class="avatar-img" src="{{ asset($customer->image->path) }}" alt="{{$customer->name}}">
                                    </div>
                                @else
                                    <div class="avatar avatar-soft-primary avatar-circle">
                                        <span class="avatar-initials">{{ substr($customer->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                    <div class="ml-3">
                                        <span class="h5 text-hover-primary">{{$customer->name}} <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                            </a>
                        </td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address[0]->getCountry->name}} <span class="text-hide">Code: {{$customer->address[0]->getCountry->iso2}}</span></td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Active
                        </td>
                        <td>{{ count($customer->orders) }}</td>
                        <td>$3,511.01</td>
                        <td>Aug 17, 2020, 5:48 (ET)</td>
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
                                @if (count($customers) > 5)
                                    @for($i = 5; $i <= count($customers); $i += 5)
                                        <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                @else
                                    <option value="{{ count($customers) }}" selected>{{ count($customers) }}</option>
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

@section('styles')
    <style>
        .page-header {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
    </style>
@endsection

@section('script')
    <script>
        async function deleteServices() {
            let id = [];
            let serviceCheckbox = document.querySelectorAll('.serviceCheckbox');
            for (let serviceCheckbox1 of serviceCheckbox) {
                let getId = serviceCheckbox1.id.split('Check')[1];
                id.push(getId);
            }
            // axios.get(`/admin/service/deletes?id=${JSON.stringify(id)}`)
            //         .then(res => console.log(res))
            //         .catch(e => console.log(e.message));
            try {
                const response = await axios.get(`/admin/service/deletes?id=${JSON.stringify(id)}`);
                if (response) {
                    console.log(response);
                }
            } catch (e) {
                console.log(e.message);
            }
        }
    </script>
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            var customerTable = $.HSCore.components.HSDatatables.init($('#customerTable'), {
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: '<div class="text-center p-4">' +
                        '<img class="mb-3" src="./assets/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                        '<p class="mb-0">No data to show</p>' +
                        '</div>'
                }
            });

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                customerTable.column(targetColumnIndex).search(elVal).draw();
            });

            $('#datatableSearch').on('mouseup', function (e) {
                var $input = $(this),
                    oldValue = $input.val();

                if (oldValue == "") return;

                setTimeout(function(){
                    var newValue = $input.val();

                    if (newValue == ""){
                        // Gotcha
                        datatable.search('').draw();
                    }
                }, 1);
            });

            $('#toggleColumn_name').change(function (e) {
                customerTable.columns(1).visible(e.target.checked)
            })

            $('#toggleColumn_email').change(function (e) {
                customerTable.columns(2).visible(e.target.checked)
            })

            $('#toggleColumn_phone').change(function (e) {
                customerTable.columns(3).visible(e.target.checked)
            })

            $('#toggleColumn_country').change(function (e) {
                customerTable.columns(4).visible(e.target.checked)
            })

            $('#toggleColumn_account_status').change(function (e) {
                customerTable.columns(5).visible(e.target.checked)
            })

            $('#toggleColumn_orders').change(function (e) {
                customerTable.columns(6).visible(e.target.checked)
            })

            $('#toggleColumn_total_spent').change(function (e) {
                customerTable.columns(7).visible(e.target.checked)
            })

            $('#toggleColumn_last_activity').change(function (e) {
                customerTable.columns(8).visible(e.target.checked)
            })
        });
    </script>
@endsection
