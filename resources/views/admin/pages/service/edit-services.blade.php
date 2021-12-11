@extends('admin.layout.layout')

@section('title', 'Edit Service - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('service.index') }}">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit service</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Edit Service</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Service information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="title" class="input-label">Service Title Or Name <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Products are the goods or services you sell."></i></label>

                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Web Development" aria-label="Web Development" value="{{ $service->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="icon" class="input-label">Service Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" placeholder="eg. fas-fa-user" aria-label="eg. fas-fa-user" value="{{ $service->icon }}">
                                <small class="form-text">NOTE: Please use icon only from FontAwesome Icon list. Check out all available icons <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2" target="_blank">here <i class="tio-open-in-new"></i></a></small>
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->
                            <div class="form-group mt-4">
                                <label class="input-label" for="description">Description <span class="input-label-secondary">(Optional)</span></label>
                                <textarea name="description" id="description" rows="1" style="display: none;">{!! $service->description !!}</textarea>
                                <!-- Quill -->
                                <div class="quill-custom">
                                    <div class="js-quill" style="min-height: 15rem;"
                                         data-hs-quill-options='{
                                          "placeholder": "Type your description..."
                                         }'>
                                        {!! $service->description !!}
                                    </div>
                                </div>
                                <!-- End Quill -->
                            </div>

                            <div class="form-group mt-4">
                                <label class="input-label" for="short_description">Short Description <span class="input-label-secondary">(Optional)</span></label>
                                <textarea class="form-control" name="short_description" id="short_description" rows="2" placeholder="Write your description for customer order page...">{!! $service->short_description !!}</textarea>
                            </div>

                            <div class="form-group mt-4">
                                <label class="input-label" for="note">Description Note <span class="input-label-secondary">(Optional)</span></label>
                                <textarea class="form-control" name="note" id="note" rows="2" placeholder="Write your note for customer order page...">{!! $service->note !!}</textarea>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Card -->

                    <!-- Media Card -->
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
                                <div class="col-4 mb-3 mb-lg-5">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="featuredImageSrc" class="card-img-top" src="{{ asset(isset($service->featured_image_id) ? $service->featured_image->path :'assets/svg/components/placeholder-img-format.svg') }}" alt="featured_image" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="featuredImageSrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset(isset($service->featured_image_id) ? $service->featured_image->path : 'assets/svg/components/placeholder-img-format.svg') }}"
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

                                <div class="col-4 mb-3 mb-lg-5">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="bannerImage1Src" class="card-img-top" src="{{ asset(isset($service->banner_image_1) ? $service->b_image_1->path : 'assets/svg/components/placeholder-img-format.svg') }}" alt="banner_image_1" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="bannerImage1SrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset(isset($service->banner_image_1) ? $service->b_image_1->path :'assets/svg/components/placeholder-img-format.svg') }}"
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

                                <div class="col-4 mb-3 mb-lg-5">
                                    <!-- Card -->
                                    <div class="card card-sm">
                                        <img id="bannerImage2Src" class="card-img-top" src="{{ asset(isset($service->banner_image_2) ? $service->b_image_2->path : 'assets/svg/components/placeholder-img-format.svg') }}" alt="banner_image_2" width="350px" height="320px">

                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a id="bannerImage2SrcA" class="js-fancybox-item text-body" href="javascript:;" data-toggle="tooltip" data-placement="top" title="View"
                                                       data-src="{{ asset(isset($service->banner_image_2) ? $service->b_image_2->path : 'assets/svg/components/placeholder-img-format.svg') }}"
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
                            </div>
                            <!-- End Gallery -->

                            <!-- File Attachment Input -->
                            <div id="featuredImage" class="featured_image @if(isset($service->featured_image_id)) d-none @endif">
                                <label class="custom-file-boxed @error('featured_image') is-invalid custom-file-boxed-error @enderror" for="featuredImageInputBox">
                                    <span id="featured_image">Browse your device and upload Featured Image</span>
                                    <small class="d-block text-muted">Maximum file size 2MB & Image width 1740PX & height 1140PX (Required)</small>

                                    <input id="featuredImageInputBox" name="featured_image" type="file" oninput="imageUpload('featuredImage', 'featuredImageInputBox')" class="js-file-attach custom-file-boxed-input"
                                           data-hs-file-attach-options='{
                                         "textTarget": "#featured_image"
                                       }' value="{{ old('featured_image') }}">
                                </label>
                                @error('featured_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End File Attachment Input -->

                            <div class="row mt-4">
                                <div id="bannerImage1" class="col-6 @if(isset($service->banner_image_1)) d-none @endif">
                                    <!-- File Attachment Input -->
                                    <label class="custom-file-boxed @error('banner_image_1') is-invalid custom-file-boxed-error @enderror" for="bannerImageInputBox1">
                                        <span id="bannerImage1">Browse your device and upload banner image 1</span>
                                        <small class="d-block text-muted">Maximum file size 2MB & Image width 540PX & height 540PX (Required)</small>

                                        <input id="bannerImageInputBox1" name="banner_image_1" type="file" oninput="imageUpload('bannerImage1', 'bannerImageInputBox1')" class="js-file-attach custom-file-boxed-input"
                                               data-hs-file-attach-options='{
                                                 "textTarget": "#bannerImage1"
                                               }' value="{{ old('banner_image_1') }}">
                                    </label>
                                    @error('banner_image_1')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                                <!-- End File Attachment Input -->
                                </div>
                                <div id="bannerImage2" class="col-6 @if(isset($service->banner_image_2)) d-none @endif">
                                    <!-- File Attachment Input -->
                                    <label class="custom-file-boxed @error('banner_image_2') is-invalid custom-file-boxed-error @enderror" for="bannerImageInputBox2">
                                        <span id="bannerImage2">Browse your device and upload banner image 2</span>
                                        <small class="d-block text-muted">Maximum file size 2MB & Image width 540PX & height 540PX (Required)</small>

                                        <input id="bannerImageInputBox2" name="banner_image_2" type="file" oninput="imageUpload('bannerImage2', 'bannerImageInputBox2')" class="js-file-attach custom-file-boxed-input"
                                               data-hs-file-attach-options='{
                                             "textTarget": "#bannerImage2"
                                           }' value="{{ old('banner_image_2') }}">
                                    </label>
                                    @error('banner_image_2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                <!-- End File Attachment Input -->
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                    <!-- End Media Card -->

                    <!-- Addon Variants Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Service Options</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form Group -->
                            <div class="js-add-field"
                                 data-hs-add-field-options='{
                                    "template": "#addVariantTemplate",
                                    "container": "#addVariantContainer",
                                    "defaultCreated": 0
                                 }'>

                                @forelse(json_decode($service->variants, true) as $key => $variant)
                                    <div id="{{ $key }}">
                                        <div class="form-group mb-0">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="input-label">Option Title</label>

                                                        <input type="text" class="form-control" name="option[]" placeholder="Option Title" required value="{{ $variant['option'] }}">
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-md-5">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="input-label">Option Price</label>

                                                        <input type="text" class="form-control" name="price[]" placeholder="Option Price" required value="{{ $variant['price'] }}">
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <div class="remove-faq text-right mt-1">
                                                <button class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="removeVariant({{ $key }})">
                                                    <i class="tio-remove-from-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Option Title</label>

                                                    <input type="text" class="form-control" name="option[]" placeholder="Option Title" required>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>

                                            <div class="col-md-5">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Option Price</label>

                                                    <input type="text" class="form-control" name="price[]" placeholder="Option Price" required>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                                <!-- Container For Input Field -->
                                <div id="addVariantContainer"></div>

                                <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary text-right">
                                    <i class="tio-add"></i> Add New
                                </a>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Phone Input Field -->
                            <div id="addVariantTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Option Title</label>
                                                    <input type="text" class="form-control add-new-input" name="option[]" placeholder="Option Title">
                                                </div>
                                                <!-- End Form Group -->
                                            </div>

                                            <div class="col-md-5">
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <label class="input-label">Option Price</label>
                                                    <input type="text" class="form-control add-new-input" name="price[]" placeholder="Option Price">
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
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
                    <!-- End Addon Variants Card -->

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
                                    <input type="text" class="form-control form-control-light @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="eg. web-development" aria-label="eg. web-development" value="{{ $service->slug }}">
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
                                <label for="collectionsLabel" class="input-label">Collections</label>
                                <!-- Select -->
                                <select class="form-control @error('collection') is-invalid @enderror" name="collection" size="1" id="collectionsLabel">
                                    <option label="Choose one.."></option>
                                    @foreach($collections as $collection)
                                        <option value="{{ $collection->id }}" @if($service->collection_id === $collection->id ) selected @endif>{{ $collection->name }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                <span class="form-text">Add this service to a collection so it’s easy to find in your website.</span>
                                @error('collection')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Group -->

                            <!-- Toggle Switch -->
                            <label class="row toggle-switch" for="availabilitySwitch{{ $service->status }}">
                              <span class="col-8 col-sm-9 toggle-switch-content">
                                <span class="text-dark">Availability</span>
                              </span>
                                <span class="col-4 col-sm-3">
                                <input type="checkbox" class="toggle-switch-input" name="status" id="availabilitySwitch{{ $service->status }}" @if($service->status) checked @endif>
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
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Add FAQS (Optional)</h4>
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
                                @forelse(json_decode($service->faqs, true) as $key => $faq)
                                    <div id="{{ $key }}">
                                        <div class="form-group mb-1">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label for="meta_title" class="input-label">FAQ Question</label>

                                                <input type="text" class="form-control" name="questions[]" placeholder="FAQ Question" aria-label="FAQ Question" value="{{ $faq['question'] }}">
                                            </div>
                                            <!-- End Form Group -->

                                            <!-- Form Group -->
                                            <div class="form-group mb-0">
                                                <div class="d-flex justify-content-between">
                                                    <label for="meta_description" class="input-label">FAQ Answer</label>
                                                    <span id="maxLengthCountFaq" class="text-muted"></span>
                                                </div>
                                                <textarea class="js-count-characters form-control" name="answers[]" placeholder="FAQ Answer" rows="3" maxlength="160"
                                                          data-hs-count-characters-options='{
                                              "output": "#maxLengthCountFaq"
                                            }'>{{  $faq['answer'] }}</textarea>
                                            </div>
                                            <!-- End Form Group -->
                                        </div>
                                        <div class="remove-faq text-right">
                                            <button class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="removeFaq({{ $key }})">
                                                <i class="tio-remove-from-trash"></i> Remove
                                            </button>
                                        </div>
                                        <hr>
                                    </div>
                                @empty
                                    <div class="form-group mb-4">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="meta_title" class="input-label">FAQ Question</label>

                                            <input type="text" class="form-control" name="questions[]" placeholder="FAQ Question" aria-label="FAQ Question" value="{{ $faq['question'] }}">
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-0">
                                            <div class="d-flex justify-content-between">
                                                <label for="meta_description" class="input-label">FAQ Answer</label>
                                                <span id="maxLengthCountFaq" class="text-muted"></span>
                                            </div>
                                            <textarea class="js-count-characters form-control" name="answers[]" placeholder="FAQ Answer" rows="3" maxlength="160"
                                                      data-hs-count-characters-options='{
                                              "output": "#maxLengthCountFaq"
                                            }'>{{  $faq['answer'] }}</textarea>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <hr>
                                @endforelse

                                <!-- Container For Input Field -->
                                <div id="addFaqFieldEgContainer"></div>

                                <a href="javascript:;" class="js-create-field btn btn-sm btn-no-focus btn-ghost-primary text-right">
                                    <i class="tio-add"></i> Add New FAQ
                                </a>
                            </div>
                            <!-- End Form Group -->

                            <!-- Add Phone Input Field -->
                            <div id="addFaqFieldEgTemplate" style="display: none;">
                                <div class="input-group-add-field">
                                    <div class="form-group mb-4">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="meta_title" class="input-label">FAQ Question</label>

                                            <input type="text" class="form-control" name="questions[]" placeholder="FAQ Question" aria-label="FAQ Question">
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-0">
                                            <div class="d-flex justify-content-between">
                                                <label for="meta_description" class="input-label">FAQ Answer</label>
                                                <span id="maxLengthCountFaq" class="text-muted"></span>
                                            </div>
                                            <textarea class="js-count-characters form-control" name="answers[]" placeholder="FAQ Answer" rows="2" maxlength="160"
                                                      data-hs-count-characters-options='{
                                          "output": "#maxLengthCountFaq"
                                        }'></textarea>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                                <hr>
                            </div>
                            <!-- End Add Phone Input Field -->

                        </div>
                        <!-- End Body -->
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

                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="eg. Web Development" aria-label="eg. Web Development" value="{{ $service->meta_title }}">
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
                                        }'>{{ $service->meta_description }}</textarea>
                            </div>
                            <!-- End Form Group -->

                            <label for="meta_keywords" class="input-label">SEO Meta Tags</label>

                            <input type="text" class="js-tagify tagify-form-control form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter tags here" aria-label="Enter tags here" value="{{ implode(',', json_decode($service->meta_keywords, true)) }}">
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

        function imageUpload(id, inputID) {
            let inputId = document.getElementById(id);
            let getImage = document.getElementById(inputID);
            let imageSrc = document.getElementById(`${id}Src`);
            let imageSrcA = document.getElementById(`${id}SrcA`);

            if (!inputId.classList.contains('d-none')) {
                inputId.classList.add('d-none');
                imageSrc.src = window.URL.createObjectURL(getImage.files[0]);
                imageSrcA.dataset.src = window.URL.createObjectURL(getImage.files[0]);
            }
        }

        function removeImage(id) {
            let inputId = document.getElementById(id);
            let imageSrc = document.getElementById(`${id}Src`);
            let imageSrcA = document.getElementById(`${id}SrcA`);

            if (inputId.classList.contains('d-none')) {
                inputId.classList.remove('d-none');
                imageSrc.src = `{{ env('APP_URL') }}/assets/svg/components/placeholder-img-format.svg`;
                imageSrcA.dataset.src = `{{ env('APP_URL') }}/assets/svg/components/placeholder-img-format.svg`;
            }
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

        function removeVariant($key) {
            let element = document.getElementById($key);
            element.remove();
        }

        function removeFaq($key) {
            let element = document.getElementById($key);
            element.remove();
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
