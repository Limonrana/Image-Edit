@extends('admin.layout.layout')

@section('title', 'Reviews - Car Image Edit')

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
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Reviews</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Overview</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Manage reviews</h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#addReviewModal">
                        <i class="tio-add mr-1"></i> Add review
                    </a>
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
        <div class="card mb-3 mb-lg-5">
            <!-- Body -->
            <div class="card-body">
                <div class="row align-items-md-center gx-md-5">
                    <div class="col-md-auto mb-3 mb-md-0">
                        <div class="d-flex align-items-center">
                            <img class="avatar avatar-xxl avatar-4by3 mr-4" src="{{ asset('assets/svg/illustrations/review-5-star.svg') }}" alt="Image Description">

                            <div class="d-block">
                                <h4 class="display-2 text-dark mb-0">{{ $review_percent ? number_format($review_percent, 1) : '0.0' }}</h4>
                                <p>&mdash; of {{ $total_reviews }} @if($total_reviews > 1) reviews @else review @endif </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md">
                        <ul class="list-unstyled list-unstyled-py-2 mb-0">
                            <!-- Review Ratings -->
                            @foreach($review_count as $key => $count)
                                <li class="d-flex align-items-center font-size-sm">
                                    <span class="mr-3">{{ $key }} star</span>
                                    <div class="progress flex-grow-1">
                                        <div class="progress-bar" role="progressbar" style="width: {{ (100 / $total_reviews) * $count }}%;" aria-valuenow="{{ (100 / $total_reviews) * $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3">{{ $count }}</span>
                                </li>
                            @endforeach
                            <!-- End Review Ratings -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

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
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search reviews" aria-label="Search reviews">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                            <!-- Select -->
                            <select class="js-select2-custom js-datatable-filter custom-select-sm" size="1" style="opacity: 0;"
                                    data-target-column-index="5"
                                    data-hs-select2-options='{
                                        "minimumResultsForSearch": "Infinity",
                                        "customClass": "custom-select custom-select-sm",
                                        "dropdownAutoWidth": true,
                                        "width": true,
                                        "placeholder": "Filters"
                                      }'>
                                <option value="">All</option>
                                <option value="Published">Published</option>
                                <option value="Pending">Pending</option>
                            </select>
                            <!-- End Select -->
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
                                "targets": [0, 3, 6],
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
                        <th scope="col" class="table-column-pr-0">SL.</th>
                        <th>Order</th>
                        <th>Reviewer</th>
                        <th>Comment & Rating</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($reviews as $key => $review)
                        <tr>
                            <td class="table-column-pr-0">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}.</td>
                            <th>
                                <a class="d-flex align-items-center" href="javascript:;">
                                    <div class="ml-3">
                                        <span class="h5 text-hover-primary">@if($review->order_id === null) #0000 @else {{ $review->order_id }} @endif</span>
                                    </div>
                                </a>
                            </th>
                            <td>
                                <a class="d-flex align-items-center" href="javascript:;">
                                    @if($review->image_id === null)
                                        <div class="avatar avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">A</span>
                                        </div>
                                    @else
                                        <div class="avatar avatar-circle">
                                            <img class="avatar-img" src="{{ asset($review->image->path) }}" alt="{{ $review->name }}">
                                        </div>
                                    @endif
                                    <div class="ml-3">
                                        <span class="d-block h5 text-hover-primary mb-0">{{ $review->name }} <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Verified purchase"></i></span>
                                        <span class="d-block font-size-sm text-body">{{ $review->position }}, {{ $review->company }}</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="text-wrap" style="width: 18rem;">
                                    <div class="d-flex mb-2">
                                        <div class="mr-1">
                                            @php
                                                $rating = $review->rating;
                                                $muted_stars = 5 - $rating;
                                            @endphp
                                            @for($i = 1; $i <= $rating; $i++)
                                                <img src="{{ asset('assets/svg/components/star.svg') }}" alt="review-rating" width="14">
                                            @endfor
                                            @for($i = 1; $i <= $muted_stars; $i++)
                                                <img src="{{ asset('assets/svg/components/star-muted.svg') }}" alt="review-rating" width="14">
                                            @endfor
                                        </div>
                                    </div>

                                    <p>{{ $review->comment }}</p>
                                </div>
                            </td>
                            <td>{{ $review->created_at->format('M d, Y, H:i A') }}</td>
                            <td>
                                @if($review->status === 1)
                                    <span class="badge badge-soft-success ml-2">Published</span>
                                @else
                                    <span class="badge badge-soft-warning ml-2">Pending</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-white" type="button" data-toggle="modal" data-target="#editReviewModal" onclick="editReview({{ $review->id }})">
                                        <i class="tio-edit"></i> Edit
                                    </button>
                                    <!-- Unfold -->
                                    <div class="hs-unfold">
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="javascript:;"
                                           data-hs-unfold-options='{
                                               "target": "#reviewDropdown{{$review->id}}",
                                               "type": "css-animation"
                                             }'>
                                            <i class="tio-more-horizontal"></i>
                                        </a>

                                        <div id="reviewDropdown{{$review->id}}" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="{{ route('reviews.show', $review->id) }}">
                                                @if($review->status == 0)
                                                    <i class="tio-publish dropdown-item-icon"></i> Publish
                                                @else
                                                    <i class="tio-publish dropdown-item-icon"></i> Unpublish
                                                @endif
                                            </a>
                                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
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
                                @if (count($reviews) > 5)
                                    @for($i = 5; $i <= count($reviews); $i += 5)
                                        <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                @else
                                    <option value="{{ count($reviews) }}" selected>{{ count($reviews) }}</option>
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

    <!-- Add Modal -->
    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="editUserModalTitle" class="modal-title">Add New Review</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="collection-form">
                        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Alert -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> You have to use image width & height: 100PX - 150PX, But Recommended size: 110PX.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="tio-clear tio-lg"></i>
                                </button>
                            </div>
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">User Thumbnail</label>

                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="addReviewerImage">
                                            <img id="avatarImg" class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}" alt="addReviewerImage">
                                            <input type="file" class="js-file-attach avatar-uploader-input" id="addReviewerImage" name="image"
                                                   data-hs-file-attach-options='{
                                                      "textTarget": "#avatarImg",
                                                      "mode": "image",
                                                      "targetAttr": "src",
                                                      "resetTarget": ".js-file-attach-reset-img",
                                                      "resetImg": "{{ asset('assets/img/160x160/img1.jpg') }}",
                                                      "allowTypes": [".png", ".jpeg", ".jpg"]
                                                   }'>

                                            <span class="avatar-uploader-trigger">
                                              <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                            </span>
                                        </label>
                                        <!-- End Avatar -->

                                        <button type="button" class="js-file-attach-reset-img btn btn-white">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Name</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="name" placeholder="eg. Amanda Harvey" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Position & Company</label>

                                <div class="col-sm-9">
                                    <!-- Input Group -->
                                    <div class="input-group input-group-md-down-break">
                                        <input type="text" class="form-control" name="position" placeholder="eg. Sr. Manager" value="{{ old('position') }}" required>
                                        <input type="text" class="form-control" name="company" placeholder="eg. Wood Bazar" value="{{ old('company') }}" required>
                                    </div>
                                    <!-- End Input Group -->
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Write an Review</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <textarea class="form-control" name="comment" placeholder="Write an Review" rows="3" required>{{ old('comment') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Rating</label>

                                <div class="col-sm-9">
                                    <div class="js-quantity-counter input-group-quantity-counter input-group" style="width: 100%;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">★</span>
                                        </div>
                                        <input type="number" class="js-result form-control input-group-quantity-counter-control" name="rating" value="1" required readonly style="text-align: center;">

                                        <div class="input-group-quantity-counter-toggle">
                                            <a class="js-minus input-group-quantity-counter-btn" href="javascript:;" onclick="qtyMinus(this)">
                                                <i class="tio-remove"></i>
                                            </a>
                                            <a class="js-plus input-group-quantity-counter-btn" href="javascript:;" onclick="qtyPlus(this)">
                                                <i class="tio-add"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">Status type</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message input-group input-group-sm-down-break">
                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="status1" checked value="1">
                                                <label class="custom-control-label" for="status1">Publish</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->

                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="status2" value="0">
                                                <label class="custom-control-label" for="status2">Pending</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->
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
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="editReviewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="editUserModalTitle" class="modal-title">Add New Review</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="collection-form">
                        <form action="{{ route('reviews.update', 'review') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!-- Alert -->
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning!</strong> You have to use image width & height: 100PX - 150PX, But Recommended size: 110PX.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="tio-clear tio-lg"></i>
                                    </button>
                                </div>
                            <!-- End Alert -->
                            <input type="hidden" name="id" id="edit_id">
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">User Thumbnail</label>

                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="editReviewImg">
                                            <img id="editReviewImgView" class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}" alt="editReviewerImage">
                                            <input type="file" class="js-file-attach avatar-uploader-input" id="editReviewImg" name="image"
                                                   data-hs-file-attach-options='{
                                                      "textTarget": "#editReviewImgView",
                                                      "mode": "image",
                                                      "targetAttr": "src",
                                                      "resetTarget": ".js-file-attach-reset-img-edit",
                                                      "resetImg": "{{ asset('assets/img/160x160/img1.jpg') }}",
                                                      "allowTypes": [".png", ".jpeg", ".jpg"]
                                                   }'>

                                            <span class="avatar-uploader-trigger">
                                              <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                            </span>
                                        </label>
                                        <!-- End Avatar -->

                                        <button type="button" class="js-file-attach-reset-img-edit btn btn-white">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Name</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="name" id="edit_name" placeholder="eg. Amanda Harvey" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Position & Company</label>

                                <div class="col-sm-9">
                                    <!-- Input Group -->
                                    <div class="input-group input-group-md-down-break">
                                        <input type="text" class="form-control" name="position" id="edit_position" placeholder="eg. Sr. Manager" value="{{ old('position') }}" required>
                                        <input type="text" class="form-control" name="company" id="edit_company" placeholder="eg. Wood Bazar" value="{{ old('company') }}" required>
                                    </div>
                                    <!-- End Input Group -->
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Write an Review</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <textarea class="form-control" name="comment" id="edit_comment" placeholder="Write an Review" rows="3" required>{{ old('comment') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Rating</label>

                                <div class="col-sm-9">
                                    <div class="js-quantity-counter input-group-quantity-counter input-group" style="width: 100%;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">★</span>
                                        </div>
                                        <input type="number" class="js-result form-control input-group-quantity-counter-control" id="edit_ratting" name="rating" value="1" required readonly style="text-align: center;">

                                        <div class="input-group-quantity-counter-toggle">
                                            <a class="js-minus input-group-quantity-counter-btn" href="javascript:;" onclick="qtyMinus(this)">
                                                <i class="tio-remove"></i>
                                            </a>
                                            <a class="js-plus input-group-quantity-counter-btn" href="javascript:;" onclick="qtyPlus(this)">
                                                <i class="tio-add"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">Status type</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message input-group input-group-sm-down-break">
                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="edit-status_1" checked value="1">
                                                <label class="custom-control-label" for="edit-status_1">Publish</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->

                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="edit-status_0" value="0">
                                                <label class="custom-control-label" for="edit-status_0">Pending</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->
@endsection

@section('script')
    <script>
        async function editReview(id) {
            try {
                const response = await fetch(`/admin/reviews/${id}/edit`);
                const client = await response.json();
                if (client && response.status === 200) {
                    document.getElementById('edit_id').value = client.id;
                    document.getElementById('edit_name').value = client.name;
                    document.getElementById('edit_position').value = client.position;
                    document.getElementById('edit_company').value = client.company;
                    document.getElementById('edit_comment').value = client.comment;
                    document.getElementById('edit_ratting').value = client.rating;
                    document.getElementById('edit-status_' + client.status).checked = true;
                    if (client.image_id !== null) {
                        document.getElementById('editReviewImgView').src = `{{ env('APP_URL') }}/${client.image.path}`;
                    }
                }
            } catch (e) {
                console.log(e.message);
            }
        }

        // Ratting Check
        function qtyMinus(element) {
            let counterNode = element.parentNode.parentNode;
            let counterResult = counterNode.querySelector('.js-result').value;
            if (counterResult > 1) {
                counterResult--;
                counterNode.querySelector('.js-result').value = counterResult;
            }
        }

        function qtyPlus(element) {
            let counterNode = element.parentNode.parentNode;
            let counterResult = counterNode.querySelector('.js-result').value;
            if (counterResult < 5) {
                counterResult++;
                counterNode.querySelector('.js-result').value = counterResult;
            }
        }
    </script>
@endsection
