@extends('admin.layout.layout')

@section('title', 'Add New Blog - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('blogs.index') }}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new blog</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Add New Blog</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Blog information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="title" class="input-label">Title Or Name <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Products are the goods or services you sell."></i></label>

                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Web Development" aria-label="Web Development" value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <label class="input-label" for="description">Description <span class="input-label-secondary">(Optional)</span></label>
                            <textarea name="description" id="description" rows="1" style="display: none;">{!! old('description') !!}</textarea>
                            <!-- Quill -->
                            <div class="quill-custom">
                                <div class="js-quill" style="min-height: 15rem;"
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

                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Media</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- File Attachment Input -->
                            <label class="custom-file-boxed @error('featured_image') is-invalid custom-file-boxed-error @enderror" for="featuredImageInputBox">
                                <span id="featured_image">Browse your device and upload Featured Image</span>
                                <small class="d-block text-muted">Minimum file size 2MB & Image width 770PX & height 440PX (Required)</small>

                                <input id="featuredImageInputBox" name="featured_image" type="file" class="js-file-attach custom-file-boxed-input"
                                       data-hs-file-attach-options='{
                                     "textTarget": "#featured_image"
                                   }' value="{{ old('featured_image') }}">
                            </label>
                            @error('featured_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- End File Attachment Input -->
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
                                    <input type="text" class="form-control form-control-light @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="eg. web-development" aria-label="eg. web-development" value="{{ old('slug') }}">
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
                                <label for="collectionsLabel" class="input-label">Category</label>
                                <!-- Select -->
                                <select class="form-control @error('category') is-invalid @enderror" name="category" size="1" id="collectionsLabel">
                                    <option label="Choose one.."></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                <span class="form-text">Add this service to a collection so it’s easy to find in your website.</span>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="collectionsLabel" class="input-label">Tags</label>
                                <!-- Select2 -->
                                <select class="js-select2-custom custom-select @error('tags') is-invalid @enderror" name="tags[]" multiple size="1" style="opacity: 0;"
                                        data-hs-select2-options='{
                                          "minimumResultsForSearch": "Infinity"
                                        }'>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select2 -->
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Group -->

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
