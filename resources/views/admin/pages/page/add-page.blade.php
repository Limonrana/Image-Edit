@extends('admin.layout.layout')

@section('title', 'Add New Page - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('pages.index') }}">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new page</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Add New Page</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Page information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="title" class="input-label">Page Title <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Products are the goods or services you sell."></i></label>

                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Privacy Policy" aria-label="Privacy Policy" value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <label class="input-label" for="description">Page Content</label>
                            <textarea name="description" id="description" rows="1" style="display: none;">{!! old('description') !!}</textarea>
                            <!-- Quill -->
                            <div class="quill-custom">
                                <div class="js-quill" style="min-height: 25rem;"
                                     data-hs-quill-options='{
                                      "placeholder": "Type your description..."
                                     }'>
                                    {!! old('description') !!}
                                </div>
                            </div>
                            <!-- End Quill -->
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-4">
                    <!-- Card -->
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
                                    <input type="text" class="form-control form-control-light @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="eg. privacy-policy" aria-label="eg. privacy-policy" value="{{ old('slug') }}" style="background: #ebebeb; color: #747474;">
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

                            <!-- Toggle Switch -->
                            <label class="row toggle-switch" for="availabilitySwitch1">
                              <span class="col-8 col-sm-9 toggle-switch-content">
                                <span class="text-dark">Availability</span>
                              </span>
                                <span class="col-4 col-sm-3">
                                <input type="checkbox" class="toggle-switch-input" name="status" id="availabilitySwitch1" checked>
                                <span class="toggle-switch-label ml-auto">
                                  <span class="toggle-switch-indicator"></span>
                                </span>
                              </span>
                            </label>
                            <!-- End Toggle Switch -->
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
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

                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="eg. Web Development" aria-label="eg. Web Development" value="{{ old('meta_title') }}">
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
                                        }'>{{ old('meta_description') }}</textarea>
                            </div>
                            <!-- End Form Group -->

                            <label for="meta_keywords" class="input-label">SEO Meta Tags</label>

                            <input type="text" class="js-tagify tagify-form-control form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter tags here" aria-label="Enter tags here" value="{{ old('meta_keywords') }}">
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Row -->

            <div class="position-fixed bottom-0 content-centered-x w-100 z-index-99 mb-3" style="max-width: 40rem;">
                <!-- Card -->
                <div class="card card-sm bg-dark border-dark mx-2">
                    <div class="card-body">
                        <div class="row justify-content-center justify-content-sm-between">
                            <div class="col">
                                <a href="{{ route('service.index') }}" class="btn btn-ghost-danger">Discard</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Save</button>
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

        // INITIALIZATION OF DROPZONE FILE ATTACH MODULE
        // =======================================================
        $('.js-dropzone').each(function () {
            var dropzone = $.HSCore.components.HSDropzone.init('#' + $(this).attr('id'));
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

        $('#title').keyup(function () {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
            $('#meta_title').val($(this).val());
        });

        function editSlug() {
            let slug = document.getElementById('slug');
            let slugEditIcon = document.getElementById('slugEditIcon');
            if (slug.readOnly) {
                slug.readOnly = false;
                slugEditIcon.classList.remove("tio-edit");
                slugEditIcon.classList.add("tio-save");
                slug.style.background = "#ffffff";
                slug.style.color = "#424242";
            } else {
                slug.readOnly = true;
                slugEditIcon.classList.remove("tio-save");
                slugEditIcon.classList.add("tio-edit");
                slug.style.background = "#ebebeb";
                slug.style.color = "#747474";
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
