@extends('admin.layout.layout')

@section('title', 'Comments - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages & Post</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Comments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Overview</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Comments</h1>
                </div>
            </div>
            <!-- End Row -->

            @if ($errors->any())
                <div class="errors mt-5">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-soft-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="tio-clear tio-lg"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
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
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search comments..." aria-label="Search users">
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
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                       data-hs-datatables-options='{
                             "columnDefs": [{
                                "targets": [0, 7],
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
                        <th class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                <label class="custom-control-label" for="datatableCheckAll"></label>
                            </div>
                        </th>
                        <th class="table-column-pl-0">Post Name</th>
                        <th>Commenter Name</th>
                        <th>Commenter Email</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($comments as $key => $comment)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input check-collection" id="usersDataCheck{{$comment->id}}">
                                    <label class="custom-control-label" for="usersDataCheck{{$comment->id}}"></label>
                                </div>
                            </td>
                            <td class="table-column-pl-0">
                                <a class="d-flex align-items-center">
                                    @if(isset($comment->post->image))
                                        <div class="avatar avatar-circle">
                                            <img class="avatar-img" src="{{ asset($comment->post->image->path) }}" alt="{{$comment->post->title}}">
                                        </div>
                                    @else
                                        <div class="avatar avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">B</span>
                                        </div>
                                    @endif

                                    <div class="ml-3">
                                        <span class="d-block h5 text-hover-primary mb-0">{{ \Illuminate\Support\Str::limit($comment->post->title, 45) }} <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                                </a>
                            </td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>
                                @if($comment->status)
                                    <span class="legend-indicator bg-success"></span>Approved
                                @else
                                    <span class="legend-indicator bg-warning"></span>Pending
                                @endif
                            </td>
                            <td>{{ $comment->created_at->diffForHumans() }}</td>
                            <td>{{ $comment->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-white" href="javascript:;" data-toggle="modal" data-target="#viewCommentModal" onclick="handleComment({{$comment->id}})">
                                        <i class="tio-agenda-view"></i> View
                                    </a>
                                    <!-- Unfold -->
                                    <div class="hs-unfold btn-group">
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                                           data-hs-unfold-options='{
                                             "target": "#productsEditDropdown{{$comment->id}}",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                                        <div id="productsEditDropdown{{$comment->id}}" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit" id="delete">
                                                    <i class="tio-delete-outlined dropdown-item-icon"></i> Delete
                                                </button>
                                            </form>
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
                                @if (count($comments) > 5)
                                    @for($i = 5; $i <= count($comments); $i += 5)
                                         <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                @else
                                    <option value="{{ count($comments) }}" selected>{{ count($comments) }}</option>
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

    <!-- View Comment Modal -->
    <div class="modal fade" id="viewCommentModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="editUserModalTitle" class="modal-title">View Comment Details</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="modal-form">
                        <form action="{{ route('comments.update', 'status') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="commentId" name="comment_id">
                            <!-- Profile Cover -->
                            <div class="profile-cover">
                                <div class="profile-cover-img-wrapper">
                                    <img id="postImage" class="profile-cover-img" src="{{ asset('assets/img/1920x400/img1.jpg') }}" alt="post-featured-image">
                                </div>
                            </div>
                            <!-- End Profile Cover -->

                            <!-- Avatar -->
                            <div class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar mb-5" style="width: 6.5rem;">
                                <img id="commenterImage" class="avatar-img" src="{{ asset('assets/img/160x160/img9.jpg') }}" alt="user-image">
                            </div>
                            <!-- End Avatar -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="postTitle" class="col-sm-3 col-form-label input-label">Post Title</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="title" id="postTitle" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="commenterName" class="col-sm-3 col-form-label input-label">User Details</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="commenterName" id="commenterName" disabled>
                                        <input type="text" class="form-control" name="commenterEmail" id="commenterEmail" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="postTitle" class="col-sm-3 col-form-label input-label">Comment Body</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <textarea name="commentBody" id="commentBody" rows="6" class="form-control" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button id="submitBtn" type="submit" class="btn btn-primary">Approved</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End View Comment Modal -->
@endsection

@section('script')
    <script>
        async function handleComment(id) {
            try {
                const response = await fetch(`/admin/comments/${id}/edit`);
                const collection = await response.json();
                if (collection && response.status === 200) {
                    document.getElementById('commentId').value = collection.id;
                    document.getElementById('postTitle').value = collection.post.title;
                    document.getElementById('commenterName').value = collection.name;
                    document.getElementById('commenterEmail').value = collection.email;
                    document.getElementById('commentBody').value = collection.comment;

                    if (collection.status === 1) {
                        document.getElementById('submitBtn').innerText = 'Unapproved';
                    } else {
                        document.getElementById('submitBtn').innerText = 'Approved';
                    }

                    if (collection.post_id !== null) {
                        document.getElementById('postImage').src = `{{ env('APP_URL') }}/${collection.post.image.path}`;
                    }

                    if (collection.customer_id !== null) {
                        document.getElementById('commenterImage').src = `{{ env('APP_URL') }}/${collection.user.profile_photo_path}`;
                    }
                }
            } catch (e) {
                console.log(e.message);
            }
        }
    </script>
@endsection
