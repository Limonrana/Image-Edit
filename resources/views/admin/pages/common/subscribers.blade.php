@extends('admin.layout.layout')

@section('title', 'Subscribers - Car Image Edit')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-header-title">Manage Subscribers</h1>
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search Subscribers..." aria-label="Search reviews">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                            <!-- Datatable Info -->
                            <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
                                <div class="d-flex align-items-center">
                                      <span class="font-size-sm mr-3">
                                        <span id="datatableCounter">0</span>
                                        Selected
                                      </span>
                                    <a class="btn btn-sm btn-outline-danger mr-2" href="javascript:;" onclick="deleteHandler()" id="delete">
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
                <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap card-table"
                       data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 3, 4],
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
                        <th>EMAIL ADDRESS</th>
                        <th>CREATED AT</th>
                        <th>UPDATED AT</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="subscriber-{{ $subscriber->id }}" onclick="handleDelete({{ $subscriber->id }})">
                                    <label class="custom-control-label" for="subscriber-{{ $subscriber->id }}"></label>
                                </div>
                            </td>
                            <th>
                                <a class="d-flex align-items-center" href="javascript:;">
                                    <span class="h5 text-hover-primary">#{{ $subscriber->email }}</span>
                                </a>
                            </th>
                            <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                            <td>{{ $subscriber->updated_at->diffForHumans() }}</td>
                            <td>
                                @if ($subscriber->status === 0)
                                    <span class="badge badge-soft-danger ml-2">Inactive</span>
                                @else
                                    <span class="badge badge-soft-success ml-2">Active</span>
                                @endif
                            </td>
                            <td>
                                <!-- Unfold -->
                                <div class="hs-unfold">
                                    <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="javascript:;"
                                       data-hs-unfold-options='{
                                       "target": "#settingsDropdown{{ $subscriber->id }}",
                                       "type": "css-animation"
                                     }'>
                                        <i class="tio-more-horizontal"></i>
                                    </a>

                                    <div id="settingsDropdown{{ $subscriber->id }}" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                        <span class="dropdown-header">Settings</span>
                                        <a class="dropdown-item" href="{{ route('subscribers.edit', $subscriber->id) }}">
                                            <i class="tio-edit dropdown-item-icon"></i> @if ($subscriber->status === 0) Activate @else Deactivate @endif
                                        </a>
                                        <a class="dropdown-item" href="{{ route('subscribers.destroy', $subscriber->id) }}" id="delete">
                                            <i class="tio-delete-outlined dropdown-item-icon"></i> Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- End Unfold -->
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
                                @if (count($subscribers) > 5)
                                    @for($i = 5; $i <= count($subscribers); $i += 5)
                                        <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                    <option value="{{ count($subscribers) }}">{{ count($subscribers) }}</option>
                                @else
                                    <option value="{{ count($subscribers) }}" selected>{{ count($subscribers) }}</option>
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

@section('script')
    <script>
        let subscribersId = [];
        function handleDelete(id) {
            let find = subscribersId.find((value => value === id));
            if (find !== undefined) {
                subscribersId = subscribersId.filter((value => value !== id));
            } else {
                subscribersId.push(id);
            }
        }

        function deleteHandler() {
            if (subscribersId.length > 0) {
                $.ajax({
                    url: '{{ route('subscribers.all.destroy') }}',
                    type: 'DELETE',
                    data: {
                        subscribersId: subscribersId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            subscribersId = [];
                            $('#datatable').DataTable().ajax.reload();
                        }
                    }
                });
            }
        }
    </script>
@endsection
