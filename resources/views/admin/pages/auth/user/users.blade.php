@extends('admin.layout.layout')

@section('title', 'Users - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Users <span class="badge badge-soft-dark ml-2">{{ count($users) }}</span></h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{ route('users.create') }}">Add New User</a>
                </div>
            </div>
            <!-- End Row -->
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
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search users..." aria-label="Search orders">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="col-lg-6"></div>
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
                         "pageLength": 10,
                         "isResponsive": false,
                         "isShowPaging": false,
                         "pagination": "datatablePagination"
                       }'>
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <label class="custom-control-label">SL.</label>
                            </div>
                        </th>
                        <th class="table-column-pl-0">Name</th>
                        <th>E-mail</th>
                        <th>Email Verified</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                        <td class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <label class="custom-control-label">{{ $key + 1 }}.</label>
                            </div>
                        </td>
                        <td class="table-column-pl-0">
                            <a class="d-flex align-items-center" href="{{ route('users.show', $user->id) }}">
                                @if ($user->profile_photo_path !== null)
                                    <div class="avatar avatar-circle">
                                        <img class="avatar-img" src="{{$user->profile_photo_path ? asset($user->image->path) : 'https://ui-avatars.com/api/?name='.$user->name.'&color=7F9CF5&background=EBF4FF' }}" alt="{{$user->name}}">
                                    </div>
                                @else
                                    <div class="avatar avatar-soft-primary avatar-circle">
                                        <span class="avatar-initials">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                    <div class="ml-3">
                                        <span class="h5 text-hover-primary">{{$user->name}} <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                            </a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->email_verified_at !== null)
                                <span class="badge badge-soft-success">Verified</span>
                            @else
                                <span class="badge bg-soft-danger">Not Verified</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->role === 'admin')
                                <span class="legend-indicator bg-success"></span>Super Admin
                            @else
                                <span class="legend-indicator bg-info"></span>Admin
                            @endif
                        </td>
                        <td>
                            @if ($user->status)
                                <span class="legend-indicator bg-success"></span>Active
                            @else
                                <span class="legend-indicator bg-danger"></span>InActive
                            @endif
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
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
                                @if (count($users) > 5)
                                    @for($i = 5; $i <= count($users); $i += 5)
                                        <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                @else
                                    <option value="{{ count($users) }}" selected>{{ count($users) }}</option>
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
        });
    </script>
@endsection
