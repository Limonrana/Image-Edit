@extends('admin.layout.layout')

@section('title', 'Collection - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Inventory</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Collections</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Overview</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Collections</h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#addCollectionModal">
                        <i class="tio-user-add mr-1"></i> Add collection
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
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search collections..." aria-label="Search users">
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
                                "targets": [0, 5],
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
                        <th class="table-column-pl-0">Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($collections as $key => $collection)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input check-collection" id="usersDataCheck{{$collection->id}}">
                                    <label class="custom-control-label" for="usersDataCheck{{$collection->id}}"></label>
                                </div>
                            </td>
                            <td class="table-column-pl-0">
                                <a class="d-flex align-items-center">
                                    @if($collection->image_id)
                                        <div class="avatar avatar-circle">
                                            <img class="avatar-img" src="{{ asset($collection->image->path) }}" alt="{{$collection->name}}">
                                        </div>
                                    @else
                                        <div class="avatar avatar-soft-dark avatar-circle">
                                            <span class="avatar-initials">A</span>
                                        </div>
                                    @endif

                                    <div class="ml-3">
                                        <span class="d-block h5 text-hover-primary mb-0">{{ $collection->name }} <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <span class="d-block font-size-sm">/{{ $collection->slug }}</span>
                            </td>
                            <td>
                                <span class="legend-indicator bg-success"></span>Active
                            </td>
                            <td>{{ $collection->created_at->diffForHumans() }}</td>
                            <td>{{ $collection->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-white" type="button" data-toggle="modal" data-target="#editCollectionModal" onclick="editCollection({{ $collection->id }})">
                                        <i class="tio-edit"></i> Edit
                                    </button>

                                    <!-- Unfold -->
                                    <div class="hs-unfold btn-group">
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-white dropdown-toggle dropdown-toggle-empty" href="javascript:;"
                                           data-hs-unfold-options='{
                                             "target": "#productsEditDropdown{{$collection->id}}",
                                             "type": "css-animation",
                                             "smartPositionOffEl": "#datatable"
                                           }'></a>

                                        <div id="productsEditDropdown{{$collection->id}}" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right mt-1">
                                            <form action="{{ route('collection.destroy', $collection->id) }}" method="POST">
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
                                @if (count($collections) > 5)
                                    @for($i = 5; $i <= count($collections); $i += 5)
                                         <option value="{{ $i }}" @if($i === 10) selected @endif>{{ $i }}</option>
                                    @endfor
                                @else
                                    <option value="{{ count($collections) }}" selected>{{ count($collections) }}</option>
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

    <!-- Add collection Modal -->
    <div class="modal fade" id="addCollectionModal" tabindex="-1" role="dialog" aria-labelledby="addCollectionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="editUserModalTitle" class="modal-title">Add New Collection</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="collection-form">
                        <form action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">Collection Thumbnail</label>

                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="addCollectionImage">
                                            <img id="avatarImg" class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}" alt="addCollectionImage">
                                            <input type="file" class="js-file-attach avatar-uploader-input" id="addCollectionImage" name="image"
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
                                <label for="add_name" class="col-sm-3 col-form-label input-label">Collection name</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="name" id="add_name" placeholder="Example: Web Development" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_slug" class="col-sm-3 col-form-label input-label">Slug</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="slug" id="add_slug" placeholder="Example: /web-development" value="{{ old('slug') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_meta_title" class="col-sm-3 col-form-label input-label">SEO Meta Title</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="meta_title" id="add_meta_title" placeholder="Your organization" aria-label="Your organization" value="{{ old('meta_title') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_meta_keywords" class="col-sm-3 col-form-label input-label">SEO Meta Keywords</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="js-tagify tagify-form-control form-control" name="meta_keywords" id="add_meta_keywords" placeholder="Write some tags" value="{{ old('meta_keywords') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="add_meta_description" class="col-sm-3 col-form-label input-label">SEO Meta Description</label>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <span id="maxLengthCountCharacters" class="text-muted"></span>
                                        </div>
                                        <textarea class="js-count-characters form-control" name="meta_description" id="add_meta_description" placeholder="SEO Meta Description" rows="2" maxlength="160"
                                                  data-hs-count-characters-options='{
                                          "output": "#maxLengthCountCharacters"
                                        }'>{{ old('meta_description') }}</textarea>
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
                                                <label class="custom-control-label" for="status1">Active</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->

                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="status2" value="2">
                                                <label class="custom-control-label" for="status2">Inactive</label>
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
    <!-- End Add collection Modal -->

    <!-- Edit collection Modal -->
    <div class="modal fade" id="editCollectionModal" tabindex="-1" role="dialog" aria-labelledby="editCollectionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 id="editUserModalTitle" class="modal-title">Edit Collection</h4>

                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="collection-form">
                        <form action="{{ route('collection.update', 'edit') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <!-- Form Group -->
                            <input type="hidden" name="id" id="edit_id">
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">Collection Thumbnail</label>

                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="editCollectionImage">
                                            <img id="editCollectionImgView" class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}" alt="addCollectionImage">
                                            <input type="file" class="js-file-attach avatar-uploader-input" id="editCollectionImage" name="image"
                                                   data-hs-file-attach-options='{
                                                      "textTarget": "#editCollectionImgView",
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
                                <label for="edit_name" class="col-sm-3 col-form-label input-label">Collection name</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="name" id="edit_name" placeholder="Example: Web Development" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="edit_slug" class="col-sm-3 col-form-label input-label">Slug</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="slug" id="edit_slug" placeholder="Example: /web-development" value="{{ old('slug') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="edit_meta_title" class="col-sm-3 col-form-label input-label">SEO Meta Title</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="meta_title" id="edit_meta_title" placeholder="SEO Meta Title" aria-label="Your organization" value="{{ old('meta_title') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="edit_meta_keywords" class="col-sm-3 col-form-label input-label">SEO Meta Keywords</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="js-tagify edit-tagify tagify-form-control form-control" name="meta_keywords" id="edit_meta_keywords" placeholder="Write some tags" value="{{ old('meta_keywords') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="edit_meta_description" class="col-sm-3 col-form-label input-label">SEO Meta Description</label>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <span id="maxLengthCountCharacters" class="text-muted"></span>
                                        </div>
                                        <textarea class="js-count-characters form-control" name="meta_description" id="edit_meta_description" placeholder="SEO Meta Description" rows="2" maxlength="160"
                                                  data-hs-count-characters-options='{
                                          "output": "#maxLengthCountCharacters"
                                        }'>{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="edit_status" class="col-sm-3 col-form-label input-label">Status type</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message input-group input-group-sm-down-break">
                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="edit-status_1" checked value="1">
                                                <label class="custom-control-label" for="edit-status_1">Active</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->

                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="status" id="edit-status_2" value="2">
                                                <label class="custom-control-label" for="edit-status_2">Inactive</label>
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
    <!-- End Edit collection Modal -->
@endsection

@section('script')
    <script>
        $('#add_name').keyup(function () {
            $('#add_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
            $('#add_meta_title').val($(this).val());
        });

        async function editCollection(id) {
            try {
                const response = await fetch(`/admin/collection/${id}/edit`);
                const collection = await response.json();
                if (collection && response.status === 200) {
                    document.getElementById('edit_id').value = collection.id;
                    document.getElementById('edit_name').value = collection.name;
                    document.getElementById('edit_slug').value = collection.slug;
                    document.getElementById('edit_meta_title').value = collection.meta_title;
                    document.getElementById('edit_meta_description').value = collection.meta_description;
                    document.getElementById('edit_meta_description').value = collection.meta_description;
                    document.getElementById('edit-status_' + collection.status).checked = true;
                    if (collection.meta_keywords) {
                        let keywords = JSON.parse(collection.meta_keywords);
                        let tagifyContainer = document.querySelector('.edit-tagify');
                        let tagList = document.querySelectorAll('.edit-tagify tag');
                        if (tagList.length > 0) {
                            tagList.forEach(tag => {
                                tag.remove();
                            })
                        }
                        keywords.forEach(keyword => {
                            let html = `<tag title="${keyword}" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag" isvalid="true" value="${keyword}">
                                            <x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                            <div><span class="tagify__tag-text">${keyword}</span></div>
                                        </tag>`;
                            tagifyContainer.insertAdjacentHTML('afterbegin', html);
                        });
                    }
                    if (collection.image_id !== null) {
                        document.getElementById('editCollectionImgView').src = `{{ env('APP_URL') }}/${collection.image.path}`;
                    }
                }
            } catch (e) {
                console.log(e.message);
            }
        }
    </script>
@endsection
