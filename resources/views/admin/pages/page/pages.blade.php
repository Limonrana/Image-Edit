@extends('admin.layout.layout')

@section('title', 'Pages - Car Image Editing')

@section('content')

<!-- Content -->
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">All Pages <span class="badge badge-soft-dark ml-2">{{ count($pages) + 3 }}</span></h1>
            </div>

            <div class="col-sm-auto">
                <a class="btn btn-primary" href="{{ route('pages.create') }}">Add new page</a>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Page Header -->

    <div class="row justify-content-end mb-3">
        <div class="col-lg">
            <!-- Datatable Info -->
            <div id="datatableCounterInfo" style="display: none;">
                <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
                <span class="d-block d-sm-inline-block font-size-sm mr-3 mb-2 mb-sm-0">
                  <span id="datatableCounter">0</span>
                  Selected
                </span>
                    <a class="btn btn-sm btn-outline-danger mb-2 mb-sm-0 mr-2" id="delete" href="javascript:;" onclick="deleteServices()">
                        <i class="tio-delete-outlined"></i> Delete
                    </a>
                </div>
            </div>
            <!-- End Datatable Info -->
        </div>
    </div>
    <!-- End Row -->

    <!-- Card -->
    <div class="card">
        <!-- Header -->
        <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-md-4 mb-3 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="serviceTableSearch" type="search" class="form-control" placeholder="Search pages..." aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="col-auto">
                    <!-- Unfold -->
                    <div class="hs-unfold">
                        <a class="js-hs-unfold-invoker btn btn-white" href="javascript:;"
                           data-hs-unfold-options='{
                               "target": "#showHideDropdown",
                               "type": "css-animation"
                             }'>
                            <i class="tio-table mr-1"></i> Columns <span class="badge badge-soft-dark rounded-circle ml-1">6</span>
                        </a>

                        <div id="showHideDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right dropdown-card" style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">Title</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_service">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_service" checked>
                                            <span class="toggle-switch-label">
                                              <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">Slug</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_slug">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_slug" checked>
                                            <span class="toggle-switch-label">
                                              <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">Status</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_status">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_status" checked>
                                            <span class="toggle-switch-label">
                                              <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">Created</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_created">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_created" checked>
                                            <span class="toggle-switch-label">
                                              <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                        <!-- End Checkbox Switch -->
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="mr-2">Updated</span>

                                        <!-- Checkbox Switch -->
                                        <label class="toggle-switch toggle-switch-sm" for="toggleColumn_updated">
                                            <input type="checkbox" class="toggle-switch-input" id="toggleColumn_updated" checked>
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
            <!-- End Row -->
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <table id="serviceTable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                   data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0],
                        "width": "2%",
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#serviceTableSearch",
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
                    <th class="table-column-pl-0">Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                    @include('admin.components.page.common-page')
                    @foreach($pages as $page)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input serviceCheckbox" id="productsCheck{{ $page->id }}">
                                    <label class="custom-control-label" for="productsCheck{{ $page->id }}"></label>
                                </div>
                            </td>
                            <td class="table-column-pl-0">
                                <a class="d-flex align-items-center" href="{{ route('pages.edit', $page->id) }}">
                                    <div class="avatar avatar-soft-dark avatar-circle">
                                        <span class="avatar-initials">{{ substr($page->title, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-3">
                                        <span class="d-block h5 text-hover-primary mb-0">{{ count(str_split($page->title)) > 50 ? substr($page->title, 0, 40).'...'.substr($page->title, -10) : $page->title }} <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                                </a>
                            </td>
                            <td>/{{ count(str_split($page->slug)) > 20 ? substr($page->slug, 0, 15).'...'.substr($page->slug, -5) : $page->slug }}</td>
                            <td>
                                <label class="toggle-switch toggle-switch-sm" for="stocksCheckbox{{$page->id}}">
                                    <input type="checkbox" class="toggle-switch-input" id="stocksCheckbox{{$page->id}}" @if($page->status) checked @endif readonly>
                                    <span class="toggle-switch-label">
                                <span class="toggle-switch-indicator"></span>
                              </span>
                                </label>
                            </td>
                            <td>{{ $page->created_at->diffForHumans() }}</td>
                            <td>{{ $page->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-white" href="{{ route('pages.edit', $page->id) }}">
                                        <i class="tio-edit"></i> Edit
                                    </a>

                                    <!-- Unfold -->
                                    <div class="hs-unfold btn-group">
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                                           data-hs-unfold-options='{
                                             "target": "#productsEditDropdown{{$page->id}}",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                                        <div id="productsEditDropdown{{$page->id}}" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                            <a class="dropdown-item" href="javascript:;" id="delete">
                                                <form id="data-destroy" action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                <i class="tio-delete-outlined dropdown-item-icon"></i> Delete
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                @if($page->status)
                                                    <i class="tio-clear"></i> Unpublish
                                                @else
                                                    <i class="tio-publish"></i> Publish
                                                @endif
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
                            @if (count($pages) > 5)
                                @for($i = 5; $i <= count($pages); $i += 5)
                                    <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                @endfor
                            @else
                                <option value="{{ count($pages) }}" selected>{{ count($pages) }}</option>
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
            var serviceTable = $.HSCore.components.HSDatatables.init($('#serviceTable'), {
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

            if (serviceTable) {

                $('#toggleColumn_service').change(function (e) {
                    serviceTable.columns(1).visible(e.target.checked)
                })

                $('#toggleColumn_slug').change(function (e) {
                    serviceTable.columns(2).visible(e.target.checked)
                })

                $('#toggleColumn_status').change(function (e) {
                    serviceTable.columns(3).visible(e.target.checked)
                })

                $('#toggleColumn_created').change(function (e) {
                    serviceTable.columns(4).visible(e.target.checked)
                })

                $('#toggleColumn_updated').change(function (e) {
                    serviceTable.columns(5).visible(e.target.checked)
                })
            }

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                serviceTable.column(targetColumnIndex).search(elVal).draw();
            });

            $('#serviceTableSearch').on('mouseup', function (e) {
                var $input = $(this),
                    oldValue = $input.val();

                if (oldValue == "") return;

                setTimeout(function(){
                    var newValue = $input.val();

                    if (newValue == ""){
                        // Gotcha
                        serviceTable.search('').draw();
                    }
                }, 1);
            });
        });
    </script>
@endsection
