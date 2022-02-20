<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Our About Us Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.about.about-us') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                // BG Image
                $background_image = null;
                $background_image_id = null;
                if (aboutAboutSection()) {
                    $option_value = aboutAboutSection();
                    if (array_key_exists('about_about_us_bg_image', $option_value)) {
                        $background_image_id = $option_value['about_about_us_bg_image'];
                        $bg_image_upload = \App\Models\Upload::find($background_image_id);
                        if (isset($bg_image_upload) OR count($bg_image_upload) > 0) {
                            $background_image = $bg_image_upload->path;
                        }
                    }
                }
            @endphp
            <!-- Nav -->
            <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-lg-down-break mb-5" id="editUserModalTab" role="tablist"
                data-hs-transform-tabs-to-btn-options='{
                  "transformResolution": "lg",
                  "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center mb-3"
                }'>
                <li class="nav-item">
                    <a class="nav-link active" id="achievement-content-tab" data-toggle="tab" href="#achievement-content" role="tab">
                        <i class="tio-user-outlined mr-1"></i> Content
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="achievement-upload-tab" data-toggle="tab" href="#achievement-upload" role="tab">
                        <i class="tio-lock-outlined mr-1"></i> Upload
                    </a>
                </li>
            </ul>
            <!-- End Nav -->

            <!-- Tab Content -->
            <div class="tab-content" id="editUserModalTabContent">
                <div class="tab-pane fade show active" id="achievement-content" role="tabpanel" aria-labelledby="achievement-content-tab">
                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Section Info</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="about_about_us_title" class="input-label">Title</label>
                                <input type="text" class="form-control" name="about_about_us_title" id="about_about_us_title" placeholder="Title..." value="{{ $option_value ? $option_value['about_about_us_title'] : null }}">
                            </div>
                            <div class="form-group">
                                <label for="about_about_us_descriptions" class="input-label">Description</label>
                                <textarea class="form-control" name="about_about_us_descriptions" id="about_about_us_descriptions" cols="30" rows="3" placeholder="Description">{!! $option_value ? $option_value['about_about_us_descriptions'] : null !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Box Content</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="about_about_us_box_title" class="input-label">Title</label>
                                <input type="text" class="form-control" name="about_about_us_box_title" id="about_about_us_box_title" placeholder="Title..." value="{{ $option_value ? $option_value['about_about_us_box_title'] : null }}">
                            </div>
                            <div class="form-group">
                                <label for="about_about_us_box_descriptions" class="input-label">Description</label>
                                <textarea class="form-control" name="about_about_us_box_descriptions" id="about_about_us_box_descriptions" cols="30" rows="3" placeholder="Description">{!! $option_value ? $option_value['about_about_us_box_descriptions'] : null !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <div class="js-add-field row form-group"
                         data-hs-add-field-options='{
                            "template": "#pointTemplate",
                            "container": "#pointContainer",
                            "defaultCreated": 0
                          }'>
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Point Items</label>
                        <div class="col-sm-9">
                            @if($option_value)
                                @foreach(json_decode($option_value['about_about_us_points'], true) as $key => $info)
                                    <div id="point_{{ $key }}">
                                        <div class="row form-group mb-0">
                                            <div class="col-sm-6">
                                                <label for="point_title_{{ $key }}" class="input-label">Title</label>
                                                <input type="text" class="form-control" name="point_title[]" id="point_title_{{ $key }}" placeholder="eg. One Stop Business" value="{{ $option_value ? $info['title'] : null }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="point_icon_{{ $key }}" class="input-label">Icon</label>
                                                <input type="text" class="form-control" name="point_icon[]" id="point_icon_{{ $key }}" placeholder="eg. flaticon-new-product or fas fa-user" value="{{ $option_value ? $info['icon'] : null }}">
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <label for="point_description_{{ $key }}" class="input-label">Description</label>
                                                <textarea class="form-control" name="point_description[]" id="point_description_{{ $key }}" cols="30" rows="2" placeholder="Description...">{{ $option_value ? $info['description'] : null }}</textarea>
                                            </div>
                                        </div>
                                        <div class="remove-faq text-right mt-1">
                                            <button type="button" class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="document.getElementById('point_{{ $key }}').remove();">
                                                <i class="tio-remove-from-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row form-group mb-0">
                                    <div class="col-sm-6">
                                        <label class="input-label">Title</label>
                                        <input type="text" class="form-control" name="point_title[]" placeholder="eg. One Stop Business">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input-label">Icon</label>
                                        <input type="text" class="form-control" name="point_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <label class="input-label">Description</label>
                                        <textarea class="form-control" name="point_description[]" cols="30" rows="2" placeholder="Description..."></textarea>
                                    </div>
                                </div>
                            @endif

                        <!-- Container For Input Field -->
                            <div id="pointContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                <i class="tio-add"></i> Add new point
                            </a>
                        </div>
                    </div>

                    <!-- Add Phone Input Field -->
                    <div id="pointTemplate" style="display: none;">
                        <div class="input-group-add-field">
                            <div class="row form-group mb-0">
                                <div class="col-sm-6">
                                    <label class="input-label">Title</label>
                                    <input type="text" class="form-control" name="point_title[]" placeholder="eg. One Stop Business">
                                </div>
                                <div class="col-sm-6">
                                    <label class="input-label">Icon</label>
                                    <input type="text" class="form-control" name="point_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <label class="input-label">Description</label>
                                    <textarea class="form-control" name="point_description[]" cols="30" rows="2" placeholder="Description..."></textarea>
                                </div>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;"><i class="tio-clear"></i></a>
                        </div>
                    </div>
                    <!-- End Add Phone Input Field -->

                    <hr/>

                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Skill Content</label>
                        <div class="col-sm-9">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="about_about_skill_title" class="input-label">Title</label>
                                    <input type="text" class="form-control" name="about_about_skill_title" id="about_about_skill_title" placeholder="Title..." value="{{ $option_value ? $option_value['about_about_skill_title'] : null }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="about_about_skill_experience" class="input-label">How many experience?</label>
                                    <input type="text" class="form-control" name="about_about_skill_experience" id="about_about_skill_experience" placeholder="eg. 25+" value="{{ $option_value ? $option_value['about_about_skill_experience'] : null }}">
                                </div>
                                <div class="col-sm-12">
                                    <label for="about_about_skill_descriptions" class="input-label">Description</label>
                                    <textarea class="form-control" name="about_about_skill_descriptions" id="about_about_skill_descriptions" cols="30" rows="3" placeholder="Description">{!! $option_value ? $option_value['about_about_skill_descriptions'] : null !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <div class="js-add-field row form-group"
                         data-hs-add-field-options='{
                            "template": "#skillProgressTemplate",
                            "container": "#skillProgressContainer",
                            "defaultCreated": 0
                          }'>
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Skills Progress Items</label>
                        <div class="col-sm-9">
                            @if($option_value)
                                @foreach(json_decode($option_value['about_about_us_skills'], true) as $key => $info)
                                    <div id="skill_{{ $key }}">
                                        <div class="row form-group mb-0">
                                            <div class="col-sm-6">
                                                <label class="input-label">Skill name</label>
                                                <input type="text" class="form-control" name="skill_progress_name[]" placeholder="eg. UI/UX DESIGNS" value="{{ $option_value ? $info['name'] : null }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="input-label">Skill Percent</label>
                                                <input type="text" class="form-control" name="skill_progress_value[]" placeholder="eg. 95" value="{{ $option_value ? $info['value'] : null }}">
                                            </div>
                                        </div>
                                        <div class="remove-faq text-right mt-1">
                                            <button type="button" class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="document.getElementById('skill_{{ $key }}').remove();">
                                                <i class="tio-remove-from-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row form-group mb-0">
                                    <div class="col-sm-6">
                                        <label class="input-label">Skill name</label>
                                        <input type="text" class="form-control" name="skill_progress_name[]" placeholder="eg. UI/UX DESIGNS">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="input-label">Skill Percent</label>
                                        <input type="text" class="form-control" name="skill_progress_value[]" placeholder="eg. 95">
                                    </div>
                                </div>
                        @endif

                        <!-- Container For Input Field -->
                            <div id="skillProgressContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                <i class="tio-add"></i> Add new progress
                            </a>
                        </div>
                    </div>

                    <!-- Add Phone Input Field -->
                    <div id="skillProgressTemplate" style="display: none;">
                        <div class="input-group-add-field">
                            <div class="row form-group mb-0">
                                <div class="col-sm-6">
                                    <label class="input-label">Skill name</label>
                                    <input type="text" class="form-control" name="skill_progress_name[]" placeholder="eg. UI/UX DESIGNS">
                                </div>
                                <div class="col-sm-6">
                                    <label class="input-label">Skill Percent</label>
                                    <input type="text" class="form-control" name="skill_progress_value[]" placeholder="eg. 95">
                                </div>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;"><i class="tio-clear"></i></a>
                        </div>
                    </div>
                    <!-- End Add Phone Input Field -->

                    <hr/>

                    <div class="js-add-field row form-group"
                         data-hs-add-field-options='{
                            "template": "#aboutCounterTemplate",
                            "container": "#aboutCounterContainer",
                            "defaultCreated": 0
                          }'>
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Counter Items</label>
                        <div class="col-sm-9">
                            @if($option_value)
                                @foreach(json_decode($option_value['about_about_us_counters'], true) as $key => $info)
                                    <div id="counters_{{ $key }}">
                                        <div class="row form-group mb-0">
                                            <div class="col-sm-6">
                                                <label for="about_counters_title_{{ $key }}" class="input-label">Counter title</label>
                                                <input type="text" class="form-control" name="about_counters_title[]" id="about_counters_title_{{ $key }}" placeholder="eg. Happy Customers" value="{{ $option_value ? $info['title'] : null }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="about_counters_value_{{ $key }}" class="input-label">Counter value</label>
                                                <input type="text" class="form-control" name="about_counters_value[]" id="about_counters_value_{{ $key }}" placeholder="eg. 50k+" value="{{ $option_value ? $info['value'] : null }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="about_counters_icon_{{ $key }}" class="input-label">Counter icon</label>
                                                <input type="text" class="form-control" name="about_counters_icon[]" id="about_counters_icon_{{ $key }}" placeholder="eg. flaticon-new-product or fas fa-user" value="{{ $option_value ? $info['icon'] : null }}">
                                            </div>
                                        </div>
                                        <div class="remove-faq text-right mt-1">
                                            <button type="button" class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="document.getElementById('counters_{{ $key }}').remove();">
                                                <i class="tio-remove-from-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row form-group mb-0">
                                    <div class="col-sm-6">
                                        <label class="input-label">Counter title</label>
                                        <input type="text" class="form-control" name="about_counters_title[]" placeholder="eg. Happy Customers">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="input-label">Counter value</label>
                                        <input type="text" class="form-control" name="about_counters_value[]" placeholder="eg. 53k+">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="input-label">Counter icon</label>
                                        <input type="text" class="form-control" name="about_counters_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                    </div>
                                </div>
                            @endif

                        <!-- Container For Input Field -->
                            <div id="aboutCounterContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary"><i class="tio-add"></i> Add new counter</a>
                        </div>
                    </div>

                    <!-- Add Phone Input Field -->
                    <div id="aboutCounterTemplate" style="display: none;">
                        <div class="input-group-add-field">
                            <div class="row form-group mb-0">
                                <div class="col-sm-6">
                                    <label class="input-label">Counter title</label>
                                    <input type="text" class="form-control" name="about_counters_title[]" placeholder="eg. Happy Customers">
                                </div>
                                <div class="col-sm-3">
                                    <label class="input-label">Counter value</label>
                                    <input type="text" class="form-control" name="about_counters_value[]" placeholder="eg. 53k+">
                                </div>
                                <div class="col-sm-3">
                                    <label class="input-label">Counter icon</label>
                                    <input type="text" class="form-control" name="about_counters_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                </div>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;"><i class="tio-clear"></i></a>
                        </div>
                    </div>
                    <!-- End Add Phone Input Field -->
                </div>

                <div class="tab-pane fade" id="achievement-upload" role="tabpanel" aria-labelledby="achievement-upload-tab">
                    <div class="hidden-file">
                        <input type="hidden" name="_bg_image_id" value="{{ $background_image_id }}">
                    </div>
                    <!-- Form Group -->
                    <div class="row mt-3 mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">About Section Image</label>

                        <div class="col-sm-9">
                            <!-- Section Award Upload Form Group -->
                            <div class="mb-1">
                                <!-- File Attachment Input -->
                                <label class="input-label">Background Image</label>
                                <label class="custom-file-boxed custom-file-boxed-sm" for="aboutBackgroundUploader">
                                    <img id="about_about_us_bg_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($background_image ? $background_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                    <span class="d-block">Browse your file here</span>
                                    <small class="d-block text-muted">Maximum file size 2MB</small>

                                    <input type="file" name="about_about_us_bg_image" class="js-file-attach custom-file-boxed-input" id="aboutBackgroundUploader"
                                           data-hs-file-attach-options='{
                                            "textTarget": "#about_about_us_bg_image",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "allowTypes": [".png", ".jpeg", ".jpg"]
                                       }'>
                                </label>
                                <!-- End File Attachment Input -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
