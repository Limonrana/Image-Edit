<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Hero Slider Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.about') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                $award_image_id = null;
                $lg_banner_image_id = null;
                $sm_banner_image_id = null;
                $award_image = null;
                $lg_banner_image = null;
                $sm_banner_image = null;
                if (homeAboutSection()) {
                    $option_value = homeAboutSection();
                    if (array_key_exists('home_about_award_image', homeAboutSection())) {
                        $award_image_id     = homeAboutSection()['home_about_award_image'];
                        $award_upload = \App\Models\Upload::find($award_image_id);
                        if (isset($award_upload) OR count($award_upload) > 0) {
                            $award_image = $award_upload->path;
                        }
                    }
                    if (array_key_exists('home_about_lg_banner_image', homeAboutSection())) {
                        $lg_banner_image_id = homeAboutSection()['home_about_lg_banner_image'];
                        $lg_banner_upload = \App\Models\Upload::find($lg_banner_image_id);
                        if (isset($lg_banner_upload) OR count($lg_banner_upload) > 0) {
                            $lg_banner_image = $lg_banner_upload->path;
                        }
                    }
                    if (array_key_exists('home_about_sm_banner_image', homeAboutSection())) {
                        $sm_banner_image_id = homeAboutSection()['home_about_sm_banner_image'];
                        $sm_banner_upload = \App\Models\Upload::find($sm_banner_image_id);
                        if (isset($sm_banner_upload) OR count($sm_banner_upload) > 0) {
                            $sm_banner_image = $sm_banner_upload->path;
                        }
                    }
                }
            @endphp

            <!-- Form Group -->
            <div class="js-add-field row form-group"
                 data-hs-add-field-options='{
                        "template": "#heroSliderTemplate",
                        "container": "#heroSliderContainer",
                        "defaultCreated": 0
                 }'>
                @php
                    $i = 0;
                @endphp
                <div class="col-sm-12">
                    <div class="hero-slider">
                        <!-- Nav -->
                        <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-lg-down-break mb-5" id="editUserModalTab" role="tablist"
                            data-hs-transform-tabs-to-btn-options='{
                                  "transformResolution": "lg",
                                  "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center mb-3"
                            }'>
                            <li class="nav-item">
                                <a class="nav-link active" id="slider-content-tab-{{$i}}" data-toggle="tab" href="#slider-content-{{$i}}" role="tab">
                                    <i class="tio-user-outlined mr-1"></i> Content
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="slider-style-tab-{{$i}}" data-toggle="tab" href="#slider-style-{{$i}}" role="tab">
                                    <i class="tio-city mr-1"></i> Style
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="slider-upload-tab-{{$i}}" data-toggle="tab" href="#slider-upload-{{$i}}" role="tab">
                                    <i class="tio-lock-outlined mr-1"></i> Upload
                                </a>
                            </li>
                        </ul>
                        <!-- End Nav -->

                        <!-- Tab Content -->
                        <div class="tab-content" id="sliderTabContent">
                            <div class="tab-pane fade show active" id="slider-content-{{$i}}" role="tabpanel" aria-labelledby="slider-content-tab-{{$i}}">
                                <!-- Form Group -->
                                <div class="row mb-3">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Section Info</label>
                                    <div class="col-sm-9">
                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <label for="home_about_title" class="input-label">Title</label>
                                                <input type="text" class="form-control" name="home_about_title" id="home_about_title" placeholder="About Section Title..." value="{{ $option_value ? $option_value['home_about_title'] : null }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_subtitle" class="input-label">Sub-Title</label>
                                                <input type="text" class="form-control" name="home_about_subtitle" id="home_about_subtitle" placeholder="About Section Sub-Title..." value="{{ $option_value ? $option_value['home_about_subtitle'] : null }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_award_title" class="input-label">Award Title</label>
                                                <input type="text" class="form-control" name="home_about_award_title" id="home_about_award_title" placeholder="About Section Award Title..." value="{{ $option_value ? $option_value['home_about_award_title'] : null }}">
                                            </div>
                                        </div>

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="home_about_description" class="input-label">Description</label>
                                            <textarea rows="3" class="form-control" name="home_about_description" id="home_about_description" placeholder="About Section Description...">{{ $option_value ? $option_value['home_about_description'] : null }}</textarea>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="tab-pane fade" id="slider-style-{{$i}}" role="tabpanel" aria-labelledby="slider-style-tab-{{$i}}">
                                <!-- Form Group -->
                                <div class="row mb-3">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Hero Content Button</label>
                                    <div class="col-sm-9">
                                        <!-- Form Group -->
                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_text_color" class="input-label">Button Text Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_text_color" class="form-control input-lg" name="home_about_btn_text_color" value="{{ $option_value ? $option_value['home_about_btn_text_color'] : '#fff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_bg_color" class="input-label">Button BG Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_bg_color" class="form-control input-lg" name="home_about_btn_bg_color" value="{{ $option_value ? $option_value['home_about_btn_bg_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_icon_color" class="input-label">Button Hover Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_icon_color" class="form-control input-lg" name="home_about_btn_icon_color" value="{{ $option_value ? $option_value['home_about_btn_icon_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- End Form Group -->
                                <hr/>
                                <!-- Form Group -->
                                <div class="row mb-3">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Hero Video Button</label>
                                    <div class="col-sm-9">
                                        <!-- Form Group -->
                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_text_color" class="input-label">Button Text Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_text_color" class="form-control input-lg" name="home_about_btn_text_color" value="{{ $option_value ? $option_value['home_about_btn_text_color'] : '#fff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_bg_color" class="input-label">Button BG Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_bg_color" class="form-control input-lg" name="home_about_btn_bg_color" value="{{ $option_value ? $option_value['home_about_btn_bg_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_icon_color" class="input-label">Button Hover Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_icon_color" class="form-control input-lg" name="home_about_btn_icon_color" value="{{ $option_value ? $option_value['home_about_btn_icon_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="tab-pane fade" id="slider-upload-{{$i}}" role="tabpanel" aria-labelledby="slider-upload-tab-{{$i}}">
                                <div class="hidden-file">
                                    <input type="hidden" name="_award_image" value="{{ $award_image_id }}">
                                    <input type="hidden" name="_lg_banner_image" value="{{ $lg_banner_image_id }}">
                                    <input type="hidden" name="_sm_banner_image" value="{{ $sm_banner_image_id }}">
                                </div>

                                <!-- Form Group -->
                                <div class="row mt-3 mb-3">
                                    <div class="col-sm-6">
                                        <!-- Section Award Upload Form Group -->
                                        <div class="mb-1">
                                            <!-- File Attachment Input -->
                                            <label class="input-label">Slider Image</label>
                                            <label class="custom-file-boxed custom-file-boxed-sm" for="homeAboutBannerLargeUploader">
                                                <img id="home_about_lg_banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($lg_banner_image ? $lg_banner_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                                <span class="d-block">Browse your file here</span>
                                                <small class="d-block text-muted">Maximum file size 2MB</small>

                                                <input type="file" name="home_about_lg_banner_image" class="js-file-attach custom-file-boxed-input" id="homeAboutBannerLargeUploader"
                                                       data-hs-file-attach-options='{
                                                "textTarget": "#home_about_lg_banner_image",
                                                "mode": "image",
                                                "targetAttr": "src",
                                                "allowTypes": [".png", ".jpeg", ".jpg"]
                                           }'>
                                            </label>
                                            <!-- End File Attachment Input -->
                                        </div>
                                        <!-- End Section Award Upload Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Section Award Upload Form Group -->
                                        <div class="mb-1">
                                            <!-- File Attachment Input -->
                                            <label class="input-label">Hero BG Image Shape</label>
                                            <label class="custom-file-boxed custom-file-boxed-sm" for="homeAboutBannerSMUploader">
                                                <img id="home_about_sm_banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($sm_banner_image ? $sm_banner_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                                <span class="d-block">Browse your file here</span>
                                                <small class="d-block text-muted">Maximum file size 2MB</small>

                                                <input type="file" name="home_about_sm_banner_image" class="js-file-attach custom-file-boxed-input" id="homeAboutBannerSMUploader"
                                                       data-hs-file-attach-options='{
                                                "textTarget": "#home_about_sm_banner_image",
                                                "mode": "image",
                                                "targetAttr": "src",
                                                "allowTypes": [".png", ".jpeg", ".jpg"]
                                           }'>
                                            </label>
                                            <!-- End File Attachment Input -->
                                        </div>
                                        <!-- End Section Award Upload Form Group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- Container For Input Field -->
                    <div id="heroSliderContainer"></div>

                    <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                        <i class="tio-add"></i> Add new slider
                    </a>
                </div>
            </div>
            <!-- End Form Group -->

            <!-- Add Phone Input Field -->
            <div id="heroSliderTemplate" style="display: none;">
                <div class="input-group-add-field">
                    <!-- Add Tab Panel -->
                    <div class="hero-slider">
                        <!-- Nav -->
                        <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-lg-down-break mb-5" id="editUserModalTab" role="tablist"
                            data-hs-transform-tabs-to-btn-options='{
                                  "transformResolution": "lg",
                                  "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center mb-3"
                            }'>
                            <li class="nav-item">
                                <a class="nav-link active" id="slider-content-tab-{{$i}}" data-toggle="tab" href="#slider-content-{{$i}}" role="tab">
                                    <i class="tio-user-outlined mr-1"></i> Content
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="slider-style-tab-{{$i}}" data-toggle="tab" href="#slider-style-{{$i}}" role="tab">
                                    <i class="tio-city mr-1"></i> Style
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="slider-upload-tab-{{$i}}" data-toggle="tab" href="#slider-upload-{{$i}}" role="tab">
                                    <i class="tio-lock-outlined mr-1"></i> Upload
                                </a>
                            </li>
                        </ul>
                        <!-- End Nav -->

                        <!-- Tab Content -->
                        <div class="tab-content" id="sliderTabContent">
                            <div class="tab-pane fade show active" id="slider-content-{{$i}}" role="tabpanel" aria-labelledby="slider-content-tab-{{$i}}">
                                <!-- Form Group -->
                                <div class="row mb-3">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Section Info</label>
                                    <div class="col-sm-9">
                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <label for="home_about_title" class="input-label">Title</label>
                                                <input type="text" class="form-control" name="home_about_title" id="home_about_title" placeholder="About Section Title..." value="{{ $option_value ? $option_value['home_about_title'] : null }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_subtitle" class="input-label">Sub-Title</label>
                                                <input type="text" class="form-control" name="home_about_subtitle" id="home_about_subtitle" placeholder="About Section Sub-Title..." value="{{ $option_value ? $option_value['home_about_subtitle'] : null }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_award_title" class="input-label">Award Title</label>
                                                <input type="text" class="form-control" name="home_about_award_title" id="home_about_award_title" placeholder="About Section Award Title..." value="{{ $option_value ? $option_value['home_about_award_title'] : null }}">
                                            </div>
                                        </div>

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="home_about_description" class="input-label">Description</label>
                                            <textarea rows="3" class="form-control" name="home_about_description" id="home_about_description" placeholder="About Section Description...">{{ $option_value ? $option_value['home_about_description'] : null }}</textarea>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="tab-pane fade" id="slider-style-{{$i}}" role="tabpanel" aria-labelledby="slider-style-tab-{{$i}}">
                                <!-- Form Group -->
                                <div class="row mb-3">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Hero Content Button</label>
                                    <div class="col-sm-9">
                                        <!-- Form Group -->
                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_text_color" class="input-label">Button Text Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_text_color" class="form-control input-lg" name="home_about_btn_text_color" value="{{ $option_value ? $option_value['home_about_btn_text_color'] : '#fff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_bg_color" class="input-label">Button BG Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_bg_color" class="form-control input-lg" name="home_about_btn_bg_color" value="{{ $option_value ? $option_value['home_about_btn_bg_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_icon_color" class="input-label">Button Hover Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_icon_color" class="form-control input-lg" name="home_about_btn_icon_color" value="{{ $option_value ? $option_value['home_about_btn_icon_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- End Form Group -->
                                <hr/>
                                <!-- Form Group -->
                                <div class="row mb-3">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Hero Video Button</label>
                                    <div class="col-sm-9">
                                        <!-- Form Group -->
                                        <div class="row form-group">
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_text_color" class="input-label">Button Text Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_text_color" class="form-control input-lg" name="home_about_btn_text_color" value="{{ $option_value ? $option_value['home_about_btn_text_color'] : '#fff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_bg_color" class="input-label">Button BG Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_bg_color" class="form-control input-lg" name="home_about_btn_bg_color" value="{{ $option_value ? $option_value['home_about_btn_bg_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="home_about_btn_icon_color" class="input-label">Button Hover Color</label>
                                                <div id="colorPicker" class="input-group" title="Color">
                                                    <input type="text" id="home_about_btn_icon_color" class="form-control input-lg" name="home_about_btn_icon_color" value="{{ $option_value ? $option_value['home_about_btn_icon_color'] : '#6639ff' }}"/>
                                                    <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="tab-pane fade" id="slider-upload-{{$i}}" role="tabpanel" aria-labelledby="slider-upload-tab-{{$i}}">
                                <div class="hidden-file">
                                    <input type="hidden" name="_award_image" value="{{ $award_image_id }}">
                                    <input type="hidden" name="_lg_banner_image" value="{{ $lg_banner_image_id }}">
                                    <input type="hidden" name="_sm_banner_image" value="{{ $sm_banner_image_id }}">
                                </div>

                                <!-- Form Group -->
                                <div class="row mt-3 mb-3">
                                    <div class="col-sm-6">
                                        <!-- Section Award Upload Form Group -->
                                        <div class="mb-1">
                                            <!-- File Attachment Input -->
                                            <label class="input-label">Slider Image</label>
                                            <label class="custom-file-boxed custom-file-boxed-sm" for="homeAboutBannerLargeUploader">
                                                <img id="home_about_lg_banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($lg_banner_image ? $lg_banner_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                                <span class="d-block">Browse your file here</span>
                                                <small class="d-block text-muted">Maximum file size 2MB</small>

                                                <input type="file" name="home_about_lg_banner_image" class="js-file-attach custom-file-boxed-input" id="homeAboutBannerLargeUploader"
                                                       data-hs-file-attach-options='{
                                                "textTarget": "#home_about_lg_banner_image",
                                                "mode": "image",
                                                "targetAttr": "src",
                                                "allowTypes": [".png", ".jpeg", ".jpg"]
                                           }'>
                                            </label>
                                            <!-- End File Attachment Input -->
                                        </div>
                                        <!-- End Section Award Upload Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Section Award Upload Form Group -->
                                        <div class="mb-1">
                                            <!-- File Attachment Input -->
                                            <label class="input-label">Hero BG Image Shape</label>
                                            <label class="custom-file-boxed custom-file-boxed-sm" for="homeAboutBannerSMUploader">
                                                <img id="home_about_sm_banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($sm_banner_image ? $sm_banner_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                                <span class="d-block">Browse your file here</span>
                                                <small class="d-block text-muted">Maximum file size 2MB</small>

                                                <input type="file" name="home_about_sm_banner_image" class="js-file-attach custom-file-boxed-input" id="homeAboutBannerSMUploader"
                                                       data-hs-file-attach-options='{
                                                "textTarget": "#home_about_sm_banner_image",
                                                "mode": "image",
                                                "targetAttr": "src",
                                                "allowTypes": [".png", ".jpeg", ".jpg"]
                                           }'>
                                            </label>
                                            <!-- End File Attachment Input -->
                                        </div>
                                        <!-- End Section Award Upload Form Group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Tab Panel -->
                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                        <i class="tio-clear"></i>
                    </a>
                </div>
            </div>
            <!-- End Add Phone Input Field -->

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
