@extends('admin.layout.layout')

@section('title', 'Edit Project - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('projects.index') }}">Projects</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit project</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Edit Project</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Project information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="title" class="input-label">Project Title Or Name</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="eg. WEB LANDING PAGE" value="{{ $project->title }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label" for="description">Description <span class="input-label-secondary">(Optional)</span></label>
                                <textarea name="description" id="description" rows="1" style="display: none;">{!! $project->description !!}</textarea>
                                <!-- Quill -->
                                <div class="quill-custom">
                                    <div class="js-quill" style="min-height: 15rem;"
                                         data-hs-quill-options='{
                                          "placeholder": "Type your description..."
                                         }'>
                                        {!! $project->description !!}
                                    </div>
                                </div>
                                <!-- End Quill -->
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Card -->

                    <!-- File Uploader Media Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Media</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Gallery -->
                            <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-2"
                                 data-hs-fancybox-options='{
                                   "selector": "#fancyboxGallery .js-fancybox-item"
                                 }'>
                                @if (isset($project->featured_image_id))
                                    <div class="col-3 mb-3 mb-lg-5" id="featuredImageSec">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="featuredImageSrc" class="card-img-top" src="{{ asset($project->featured_image->path) }}" alt="featured_image" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="featuredImageSrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset($project->featured_image->path) }}"
                                                       data-caption="Image #01">
                                                        <i class="tio-visible-outlined"></i>
                                                    </a>
                                                </div>

                                                <div class="col column-divider">
                                                    <a class="text-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Delete" onclick="removeImage('featuredImage')">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                @endif

                                @if (isset($project->banner_image_1))
                                    <div class="col-3 mb-3 mb-lg-5" id="bannerImage1Sec">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="bannerImage1Src" class="card-img-top" src="{{ asset($project->b_image_1->path) }}" alt="banner_image_1" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="bannerImage1SrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset($project->b_image_1->path) }}"
                                                       data-caption="Image #02">
                                                        <i class="tio-visible-outlined"></i>
                                                    </a>
                                                </div>

                                                <div class="col column-divider">
                                                    <a class="text-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Delete" onclick="removeImage('bannerImage1')">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                @endif

                                @if (isset($project->banner_image_2))
                                    <div class="col-3 mb-3 mb-lg-5" id="bannerImage2Sec">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="bannerImage2Src" class="card-img-top" src="{{ asset($project->b_image_2->path) }}" alt="banner_image_2" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="bannerImage2SrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset($project->b_image_2->path) }}"
                                                       data-caption="Image #03">
                                                        <i class="tio-visible-outlined"></i>
                                                    </a>
                                                </div>

                                                <div class="col column-divider">
                                                    <a class="text-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Delete" onclick="removeImage('bannerImage2')">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                @endif

                                @if (isset($project->banner_image_3))
                                    <div class="col-3 mb-3 mb-lg-5" id="bannerImage3Sec">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="bannerImage3Src" class="card-img-top" src="{{ asset($project->b_image_3->path) }}" alt="banner_image_2" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="bannerImage2SrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset($project->b_image_3->path) }}"
                                                       data-caption="Image #03">
                                                        <i class="tio-visible-outlined"></i>
                                                    </a>
                                                </div>

                                                <div class="col column-divider">
                                                    <a class="text-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Delete" onclick="removeImage('bannerImage3')">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                                @endif
                            </div>
                            <!-- End Gallery -->

                            <div class="row justify-content-md-between">
                                <div id="featuredImageUp" class="col-md-3 @if(isset($project->featured_image_id)) d-none @endif">
                                    <!-- File Attachment Input -->
                                    <label class="custom-file-boxed custom-file-boxed-sm @error('featured_image') is-invalid custom-file-boxed-error @enderror" for="featuredImageUploader">
                                        <img id="featured_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="featured_image">

                                        <span class="d-block">Browse your file here</span>
                                        <small class="d-block text-muted">Maximum file size 2MB</small>

                                        <input type="file" name="featured_image" class="js-file-attach custom-file-boxed-input"
                                               id="featuredImageUploader"
                                               data-hs-file-attach-options='{
                                                    "textTarget": "#featured_image",
                                                    "mode": "image",
                                                    "targetAttr": "src",
                                                    "allowTypes": [".png", ".jpeg", ".jpg"]
                                                 }'>
                                    </label>
                                    <!-- End File Attachment Input -->
                                    @error('featured_image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="bannerImage1Up" class="col-md-3 @if(isset($project->banner_image_1)) d-none @endif">
                                    <!-- File Attachment Input -->
                                    <label class="custom-file-boxed custom-file-boxed-sm @error('banner_image_1') is-invalid custom-file-boxed-error @enderror" for="banner1ImageUploader">
                                        <img id="banner_image_1" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="featured_image">

                                        <span class="d-block">Browse your file here</span>
                                        <small class="d-block text-muted">Maximum file size 2MB</small>

                                        <input type="file" name="banner_image_1" class="js-file-attach custom-file-boxed-input"
                                               id="banner1ImageUploader"
                                               data-hs-file-attach-options='{
                                                    "textTarget": "#banner_image_1",
                                                    "mode": "image",
                                                    "targetAttr": "src",
                                                    "allowTypes": [".png", ".jpeg", ".jpg"]
                                                 }'>
                                    </label>
                                    <!-- End File Attachment Input -->
                                    @error('banner_image_1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="bannerImage2Up" class="col-md-3 @if(isset($project->banner_image_2)) d-none @endif">
                                    <!-- File Attachment Input -->
                                    <label class="custom-file-boxed custom-file-boxed-sm @error('banner_image_2') is-invalid custom-file-boxed-error @enderror" for="banner2ImageUploader">
                                        <img id="banner_image_2" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="featured_image">

                                        <span class="d-block">Browse your file here</span>
                                        <small class="d-block text-muted">Maximum file size 2MB</small>

                                        <input type="file" name="banner_image_2" class="js-file-attach custom-file-boxed-input"
                                               id="banner2ImageUploader"
                                               data-hs-file-attach-options='{
                                                    "textTarget": "#banner_image_2",
                                                    "mode": "image",
                                                    "targetAttr": "src",
                                                    "allowTypes": [".png", ".jpeg", ".jpg"]
                                                 }'>
                                    </label>
                                    <!-- End File Attachment Input -->
                                    @error('banner_image_2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="bannerImage3Up" class="col-md-3 @if(isset($project->banner_image_3)) d-none @endif">
                                    <!-- File Attachment Input -->
                                    <label class="custom-file-boxed custom-file-boxed-sm @error('banner_image_3') is-invalid custom-file-boxed-error @enderror" for="banner3ImageUploader">
                                        <img id="banner_image_3" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="featured_image">

                                        <span class="d-block">Browse your file here</span>
                                        <small class="d-block text-muted">Maximum file size 2MB</small>

                                        <input type="file" name="banner_image_3" class="js-file-attach custom-file-boxed-input"
                                               id="banner3ImageUploader"
                                               data-hs-file-attach-options='{
                                                    "textTarget": "#banner_image_3",
                                                    "mode": "image",
                                                    "targetAttr": "src",
                                                    "allowTypes": [".png", ".jpeg", ".jpg"]
                                                 }'>
                                    </label>
                                    <!-- End File Attachment Input -->
                                    @error('banner_image_3')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End File Uploader Media Card -->

                    <!-- Working Process Card Section -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Add Working Process (Optional)</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">

                            <!-- Form Group -->
                            <div class="js-add-field"
                                 data-hs-add-field-options='{
                                    "template": "#addFaqFieldEgTemplate",
                                    "container": "#addFaqFieldEgContainer",
                                    "defaultCreated": 0
                                 }'>

                                @forelse(json_decode($project->working_process, true) as $key => $work_process)
                                    <div id="{{ $key }}">
                                        <div class="form-group mb-0">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="input-label">Title</label>
                                                <input type="text" class="form-control" name="process_title[]" placeholder="Title" value="{{ $work_process['title'] }}">
                                            </div>
                                            <!-- End Form Group -->

                                            <!-- Form Group -->
                                            <div class="form-group mb-0">
                                                <label class="input-label">Description</label>
                                                <textarea class="js-count-characters form-control" name="process_description[]" placeholder="Description" rows="2">{{ $work_process['description'] }}</textarea>
                                            </div>
                                            <!-- End Form Group -->
                                        </div>
                                        <div class="remove-faq text-right mt-1">
                                            <button class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="removeVariant({{ $key }})">
                                                <i class="tio-remove-from-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <div class="form-group mb-0">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Title</label>
                                            <input type="text" class="form-control" name="process_title[]" placeholder="Title">
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-0">
                                            <label class="input-label">Description</label>
                                            <textarea class="js-count-characters form-control" name="process_description[]" placeholder="Description" rows="2"></textarea>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                @endforelse

                                <!-- Container For Input Field -->
                                <div id="addFaqFieldEgContainer"></div>

                                <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary text-right">
                                    <i class="tio-add"></i> Add New
                                </a>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Phone Input Field -->
                            <div id="addFaqFieldEgTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <div class="form-group mb-0">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Title</label>
                                            <input type="text" class="form-control" name="process_title[]" placeholder="Title">
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-0">
                                            <label class="input-label">Description</label>
                                            <textarea class="js-count-characters form-control" name="process_description[]" placeholder="Description" rows="2"></textarea>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End Add Phone Input Field -->

                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Working Process Card Section -->
                </div>

                <div class="col-lg-4">
                    <!-- Other Information Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Others Information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="slug" class="input-label">Slug</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control form-control-light @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="eg. web-landing-page" value="{{ $project->slug }}">
                                    <a class="input-group-append" href="javascript:;" onclick="editSlug()">
                                    <span class="input-group-text">
                                      <span id="slugEditIcon" class="tio-edit"></span>
                                    </span>
                                    </a>
                                </div>
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="service" class="input-label">Select Service</label>
                                <!-- Select -->
                                <select class="form-control @error('service') is-invalid @enderror" name="service" size="1" id="service">
                                    <option label="Choose one.."></option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" @if ($project->service_id === $service->id) selected @endif>{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                <span class="form-text">Add this project to a service so it’s easy to find in your website.</span>
                                @error('service')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="client" class="input-label">Project Client Details</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client" placeholder="eg. Givson Artboard, New York, USA" value="{{ $project->client_name }}">
                                @error('client_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="tools_used" class="input-label">Tools Used</label>
                                <input type="text" class="js-tagify tagify-form-control form-control @error('tools_used') is-invalid @enderror" name="tools_used" id="tools_used" placeholder="Enter used tools name" value="{{ implode(',', json_decode($project->tools_used, true)) }}">
                                @error('tools_used')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="creating_date_label" class="input-label">Project Creating Date</label>
                                <div id="creating_date" class="js-flatpickr flatpickr-custom input-group input-group-merge "
                                     data-hs-flatpickr-options='{
                                        "appendTo": "#creating_date",
                                        "dateFormat": "d/m/Y",
                                        "wrap": true
                                      }'>
                                    <div class="input-group-prepend" data-toggle>
                                        <div class="input-group-text">
                                            <i class="tio-date-range"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="flatpickr-custom-form-control form-control @error('creating_date') is-invalid @enderror" id="creating_date_label" placeholder="Select project creation date" name="creating_date" data-input value="{{ $project->creating_date }}">
                                </div>
                                @error('creating_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Toggle Switch -->
                            <label class="row toggle-switch" for="availabilitySwitch1">
                              <span class="col-8 col-sm-9 toggle-switch-content">
                                <span class="text-dark">Availability</span>
                              </span>
                                <span class="col-4 col-sm-3">
                                <input type="checkbox" class="toggle-switch-input" name="status" id="availabilitySwitch1" @if($project->status) checked @endif>
                                <span class="toggle-switch-label ml-auto">
                                  <span class="toggle-switch-indicator"></span>
                                </span>
                              </span>
                            </label>
                            <!-- End Toggle Switch -->
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Other Information Card -->

                    <!-- SEO Card Section -->
                    <div class="card">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">SEO Details</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="meta_title" class="input-label">SEO Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="eg. Web Development" aria-label="eg. Web Development" value="{{ $project->meta_title }}">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="meta_description" class="input-label">SEO Meta Description</label>
                                    <span id="maxLengthCountCharacters" class="text-muted"></span>
                                </div>
                                <textarea class="js-count-characters form-control" name="meta_description" id="meta_description" placeholder="SEO Meta Description" rows="2" maxlength="160"
                                          data-hs-count-characters-options='{
                                          "output": "#maxLengthCountCharacters"
                                        }'>{{ $project->meta_description }}</textarea>
                            </div>
                            <!-- End Form Group -->

                            <label for="meta_keywords" class="input-label">SEO Meta Tags</label>

                            <input type="text" class="js-tagify tagify-form-control form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter tags here" aria-label="Enter tags here" value="{{ implode(',', json_decode($project->meta_keywords, true)) }}">
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End SEO Card Section -->
                </div>
            </div>
            <!-- End Row -->

            <div class="position-fixed bottom-0 content-centered-x w-100 z-index-99 mb-3" style="max-width: 40rem;">
                <!-- Card -->
                <div class="card card-sm bg-dark border-dark mx-2">
                    <div class="card-body">
                        <div class="row justify-content-center justify-content-sm-between">
                            <div class="col">
                                <a href="{{ route('projects.index') }}" class="btn btn-ghost-danger">Discard</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </form>
    </div>
    <!-- End Content -->

@endsection

@section('script')
    <script>
        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        var quill = $.HSCore.components.HSQuill.init('.js-quill');

        // INITIALIZATION OF FILE ATTACH
        // =======================================================
        $('.js-file-attach').each(function () {
            var customFile = new HSFileAttach($(this)).init();
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

        // INITIALIZATION OF FLATPICKR
        // =======================================================
        $('.js-flatpickr').each(function () {
            $.HSCore.components.HSFlatpickr.init($(this));
        });

        $('#title').keyup(function () {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
            $('#meta_title').val($(this).val());
        });

        function removeImage(id) {
            document.getElementById(`${id}Sec`).remove();
            document.getElementById(`${id}Up`).classList.remove('d-none');
        }

        function removeVariant($key) {
            let element = document.getElementById($key);
            element.remove();
        }

        function editSlug() {
            let slug = document.getElementById('slug');
            let slugEditIcon = document.getElementById('slugEditIcon');
            if (slug.readOnly) {
                slug.readOnly = false;
                slugEditIcon.classList.remove("tio-edit");
                slugEditIcon.classList.add("tio-save");
            } else {
                slug.readOnly = true;
                slugEditIcon.classList.remove("tio-save");
                slugEditIcon.classList.add("tio-edit");
            }
        }

        quill.on('editor-change', function(eventName, ...args) {
            if (eventName === 'selection-change') {
                let textFormat = document.querySelector('.ql-editor').innerHTML;
                let description = document.getElementById('description');
                description.value = null;
                description.value = textFormat;
            }
        });

        $(document).ready(function () {
            let textFormat = document.querySelector('.ql-editor');
            let descriptionVal = document.getElementById('description').value;
            let slug = document.getElementById('slug');
            slug.readOnly = true;
            textFormat.innerHTML = descriptionVal;
        });

    </script>
@endsection
