<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Hero Slider Section</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#sliderAddModal">Add New Slider</button>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.slider.update') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                if (homeSliderSection()) {
                    $option_value = homeSliderSection();
                }
            @endphp

            <!-- Form Group -->
            <div class="row form-group">
                <div class="col-sm-12">
                    @if ($option_value)
                        @foreach ($option_value as $key => $slider)
                            <div id="slider_item_{{ $key + 1 }}">
                                <div class="alert alert-soft-dark card-alert" role="alert">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <div class="title"><strong>Slider {{ $key + 1 }}</strong></div>
                                        <div class="remove-btn">
                                            <button type="button" class="btn btn-sm btn-outline-danger" style="padding: 0.1375rem 0.55625rem;" onclick="deleteSlider({{$key+1}})">X</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Nav -->
                                <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-lg-down-break mb-5" id="sliderContentTab{{$key}}" role="tablist"
                                    data-hs-transform-tabs-to-btn-options='{
                                          "transformResolution": "lg",
                                          "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center mb-3"
                                        }'>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="about-content-tab" data-toggle="tab" href="#hero-content-{{$key}}" role="tab">
                                            <i class="tio-user-outlined mr-1"></i> Slider Content
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-style-tab" data-toggle="tab" href="#hero-btn-{{$key}}" role="tab">
                                            <i class="tio-city mr-1"></i> Slider Button
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-upload-tab" data-toggle="tab" href="#hero-video-btn-{{$key}}" role="tab">
                                            <i class="tio-play-circle-outlined mr-1"></i> Video Button
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-upload-tab" data-toggle="tab" href="#hero-slider-upload-{{$key}}" role="tab">
                                            <i class="tio-image mr-1"></i> Slider Image
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Nav -->
                                <!-- slider-item -->
                                <div class="tab-content" id="sliderContentTab{{$key}}">
                                    <!-- Hero Main Content -->
                                    <div class="tab-pane fade show active" id="hero-content-{{$key}}">
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label input-label">Hero Section Content</label>
                                            <div class="col-sm-9">
                                                <div class="row form-group">
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Title</label>
                                                        <input type="text" class="form-control" name="title[]" placeholder="Hero Section Title..." value="{{ $option_value ? $slider['title'] : null }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Sub-Title</label>
                                                        <input type="text" class="form-control" name="subtitle[]" placeholder="Hero Section Sub-Title..." value="{{ $option_value ? $slider['subtitle'] : null }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Hero Main Content -->

                                    <!-- Hero Content Button Form Group -->
                                    <div class="tab-pane fade" id="hero-btn-{{$key}}">
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label input-label">Hero Content Button</label>
                                            <div class="col-sm-9">
                                                <!-- Form Group -->
                                                <div class="row form-group">
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Button Text</label>
                                                        <input type="text" class="form-control color-picker" name="btn_text[]" placeholder="Button Text..." value="{{ $option_value ? $slider['btn_text'] : null }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Button Url</label>
                                                        <input type="text" class="form-control color-picker" name="btn_url[]" placeholder="eg. /contact" value="{{ $option_value ? $slider['btn_url'] : null }}">
                                                    </div>
                                                </div>
                                                <!-- End Form Group -->

                                                <!-- Form Group -->
                                                <div class="row form-group">
                                                    <div class="col-sm-4">
                                                        <label class="input-label">Button Text Color</label>
                                                        <div id="colorPicker" class="input-group" title="Color">
                                                            <input type="text" class="form-control input-lg" name="btn_text_color[]" value="{{ $option_value ? $slider['btn_text_color'] : '#FF0000' }}"/>
                                                            <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="input-label">Button BG Color</label>
                                                        <div id="colorPicker" class="input-group" title="Color">
                                                            <input type="text" class="form-control input-lg" name="btn_bg_color[]" value="{{ $option_value ? $slider['btn_bg_color'] : '#FF0000' }}"/>
                                                            <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="input-label">Button Hover Color</label>
                                                        <div id="colorPicker" class="input-group" title="Color">
                                                            <input type="text" class="form-control input-lg" name="btn_bg_hover_color[]" value="{{ $option_value ? $slider['btn_bg_hover_color'] : '#FF0000' }}"/>
                                                            <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Hero Content Button Form Group -->

                                    <!-- Hero Video Button Form Group -->
                                    <div class="tab-pane fade" id="hero-video-btn-{{$key}}">
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label input-label">Hero Video Button</label>
                                            <div class="col-sm-9">
                                                <!-- Form Group -->
                                                <div class="row form-group">
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Button Text</label>
                                                        <input type="text" class="form-control color-picker" name="video_btn_text[]" placeholder="Button Text..." value="{{ $option_value ? $slider['video_btn_text'] : null }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Button Video Url</label>
                                                        <input type="text" class="form-control color-picker" name="video_btn_url[]" placeholder="eg. https://youtu.be/Vu_PI00ifoc" value="{{ $option_value ? $slider['video_btn_url'] : null }}">
                                                    </div>
                                                </div>
                                                <!-- End Form Group -->

                                                <!-- Form Group -->
                                                <div class="row form-group">
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Button Icon Color</label>
                                                        <div id="colorPicker" class="input-group" title="Color">
                                                            <input type="text" class="form-control input-lg" name="video_btn_icon_color[]" value="{{ $option_value ? $slider['video_btn_icon_color'] : '#FF0000' }}"/>
                                                            <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="input-label">Button BG & Text Color</label>
                                                        <div id="colorPicker" class="input-group" title="Color">
                                                            <input type="text" class="form-control input-lg" name="video_btn_bg_color[]" value="{{ $option_value ? $slider['video_btn_icon_color'] : '#fff' }}"/>
                                                            <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Hero Video Button Form Group -->

                                    <!-- Hero Upload -->
                                    <div class="tab-pane fade" id="hero-slider-upload-{{$key}}">
                                        <div class="upload-panel">
                                            <div class="hidden-file">
                                                <input type="hidden" name="_shape_image[]" value="{{ $option_value ? $slider['shape_image'] : null }}">
                                                <input type="hidden" name="_banner_image[]" value="{{ $option_value ? $slider['banner_image'] : null }}">
                                            </div>

                                            <!-- Form Group -->
                                            <div class="row mt-3 mb-3">
                                                <div class="col-sm-6">
                                                    <!-- Section Award Upload Form Group -->
                                                    <div class="mb-1">
                                                        <!-- File Attachment Input -->
                                                        <label class="input-label">Hero Slider Image</label>
                                                        <label class="custom-file-boxed custom-file-boxed-sm" for="homeHeroBannerUploader">
                                                            <img id="banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($option_value ? findImagePath($slider['banner_image']) : 'assets/svg/illustrations/browse.svg') }}" alt="image" style="max-height: 3.4rem !important;">
                                                            <span class="d-block">Browse your file here</span>
                                                            <small class="d-block text-muted">Maximum file size 2MB</small>

                                                            <input type="file" name="banner_image[]" class="js-file-attach custom-file-boxed-input" id="homeHeroBannerUploader"
                                                                   data-hs-file-attach-options='{
                                                                    "textTarget": "#banner_image",
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
                                                        <label class="custom-file-boxed custom-file-boxed-sm" for="homeHeroShapeUploader">
                                                            <img id="shape_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($option_value ? findImagePath($slider['shape_image']) : 'assets/svg/illustrations/browse.svg') }}" alt="image" style="max-height: 3.4rem !important;">
                                                            <span class="d-block">Browse your file here</span>
                                                            <small class="d-block text-muted">Maximum file size 2MB</small>

                                                            <input type="file" name="shape_image[]" class="js-file-attach custom-file-boxed-input" id="homeHeroShapeUploader"
                                                                   data-hs-file-attach-options='{
                                                                    "textTarget": "#shape_image",
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
                                    <!-- End Hero Upload -->
                                </div>
                                <!-- End slider-item -->
                            </div>
                        @endforeach
                    @else
                    <!-- Empty -->
                        <div class="card-body card-body-height card-body-centered">
                            <img class="avatar avatar-xxl mb-3" src="{{ asset('assets/svg/illustrations/yelling.svg') }}" alt="yelling">
                            <p class="card-text">No slider to show</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#sliderAddModal">Add New Slider</button>
                        </div>
                        <!-- End Empty -->
                    @endif
                </div>
            </div>
            <!-- End Form Group -->

                @if ($option_value)
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                @endif
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>

<!-- Modal -->
<div id="sliderAddModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sliderAddModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Slider</h5>
                <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <form action="{{ route('page.home.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- slider-item -->
                    <div class="slider-item">
                        <!-- Form Group -->
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label input-label">Hero Section Content</label>
                            <div class="col-sm-9">
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="input-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Hero Section Title..." value="{{ old('home_hero_title') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input-label">Sub-Title</label>
                                        <input type="text" class="form-control" name="subtitle" placeholder="Hero Section Sub-Title..." value="{{ old('home_hero_subtitle') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <hr/>
                        <!-- Form Group -->
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label input-label">Hero Content Button</label>
                            <div class="col-sm-9">
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="input-label">Button Text</label>
                                        <input type="text" class="form-control color-picker" name="btn_text" placeholder="Button Text..." value="{{ old('home_hero_btn_text') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input-label">Button Url</label>
                                        <input type="text" class="form-control color-picker" name="btn_url" placeholder="eg. /contact" value="{{ old('home_hero_btn_url') }}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label class="input-label">Button Text Color</label>
                                        <div id="colorPicker" class="input-group" title="Color">
                                            <input type="text" class="form-control input-lg" name="btn_text_color" value="{{ old('home_hero_btn_text_color') ? old('home_hero_btn_text_color') : '#FF0000' }}"/>
                                            <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="input-label">Button BG Color</label>
                                        <div id="colorPicker" class="input-group" title="Color">
                                            <input type="text" class="form-control input-lg" name="btn_bg_color" value="{{ old('home_hero_btn_bg_color') ? old('home_hero_btn_bg_color') : '#FF0000' }}"/>
                                            <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="input-label">Button Hover Color</label>
                                        <div id="colorPicker" class="input-group" title="Color">
                                            <input type="text" class="form-control input-lg" name="btn_bg_hover_color" value="{{ old('home_hero_btn_bg_hover_color') ? old('home_hero_btn_bg_hover_color') : '#FF0000' }}"/>
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
                            <label class="col-sm-3 col-form-label input-label">Hero Video Button</label>
                            <div class="col-sm-9">
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="input-label">Button Text</label>
                                        <input type="text" class="form-control color-picker" name="video_btn_text" placeholder="Button Text..." value="{{ old('home_hero_video_btn_text') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input-label">Button Video Url</label>
                                        <input type="text" class="form-control color-picker" name="video_btn_url" placeholder="eg. https://youtu.be/Vu_PI00ifoc" value="{{ old('home_hero_video_btn_url') }}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="input-label">Button Icon Color</label>
                                        <div id="colorPicker" class="input-group" title="Color">
                                            <input type="text" class="form-control input-lg" name="video_btn_icon_color" value="{{ old('home_hero_video_btn_icon_color') ? old('home_hero_video_btn_icon_color') : '#FF0000' }}"/>
                                            <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input-label">Button BG & Text Color</label>
                                        <div id="colorPicker" class="input-group" title="Color">
                                            <input type="text" class="form-control input-lg" name="video_btn_bg_color" value="{{ old('home_hero_video_btn_bg_color') ? old('home_hero_video_btn_bg_color') : '#fff' }}"/>
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
                        <div class="upload-panel">
                            <!-- Form Group -->
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <!-- Section Award Upload Form Group -->
                                    <div class="mb-1">
                                        <!-- File Attachment Input -->
                                        <label class="input-label">Hero Slider Image</label>
                                        <label class="custom-file-boxed custom-file-boxed-sm" for="homeHeroBannerUploaderModal">
                                            <img id="banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="image">
                                            <span class="d-block">Browse your file here</span>
                                            <small class="d-block text-muted">Maximum file size 2MB</small>

                                            <input type="file" name="banner_image" class="js-file-attach custom-file-boxed-input" id="homeHeroBannerUploaderModal"
                                                   data-hs-file-attach-options='{
                                                    "textTarget": "#banner_image",
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
                                        <label class="custom-file-boxed custom-file-boxed-sm" for="homeHeroShapeUploaderModal">
                                            <img id="shape_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="image">
                                            <span class="d-block">Browse your file here</span>
                                            <small class="d-block text-muted">Maximum file size 2MB</small>

                                            <input type="file" name="shape_image" class="js-file-attach custom-file-boxed-input" id="homeHeroShapeUploaderModal"
                                                   data-hs-file-attach-options='{
                                                        "textTarget": "#shape_image",
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
                    <!-- End slider-item -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    function deleteSlider(id) {
        let isset = confirm('Are you sure you want to delete this slider? If you delete this slider, then please click on the save changes button.');
        if (isset) {
            let slider_item_id = 'slider_item_' + id;
            let slider_item = document.getElementById(slider_item_id);
            slider_item.remove();
        }
    }
</script>
