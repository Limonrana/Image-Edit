<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Our Achievement Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.achievement') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                // Banner Image
                $achievement_banner_image = null;
                $achievement_banner_image_id = null;
                // BG Image
                $achievement_background_image = null;
                $achievement_background_image_id = null;
                if (homeAchievementSection()) {
                    $option_value = homeAchievementSection();
                    if (array_key_exists('home_achievement_background_image', $option_value)) {
                        $achievement_background_image_id = $option_value['home_achievement_background_image'];
                        $achievement_background_image_upload = \App\Models\Upload::find($achievement_background_image_id);
                        if (isset($achievement_background_image_upload) OR count($achievement_background_image_upload) > 0) {
                            $achievement_background_image = $achievement_background_image_upload->path;
                        }
                    }
                    if (array_key_exists('home_achievement_banner_image', $option_value)) {
                        $achievement_banner_image_id = $option_value['home_achievement_banner_image'];
                        $achievement_banner_image_upload = \App\Models\Upload::find($achievement_banner_image_id);
                        if (isset($achievement_banner_image_upload) OR count($achievement_banner_image_upload) > 0) {
                            $achievement_banner_image = $achievement_banner_image_upload->path;
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
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Achievement Contact Section Info</label>
                        <div class="col-sm-9">
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label for="home_achievement_contact_title" class="input-label">Title</label>
                                    <input type="text" class="form-control" name="home_achievement_contact_title" id="home_achievement_contact_title" placeholder="Title..." value="{{ $option_value ? $option_value['home_achievement_contact_title'] : null }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="home_achievement_contact_btn_text" class="input-label">Button Text</label>
                                    <input type="text" class="form-control" name="home_achievement_contact_btn_text" id="home_achievement_contact_btn_text" placeholder="eg. Contact us" value="{{ $option_value ? $option_value['home_achievement_contact_btn_text'] : null }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="home_achievement_contact_btn_url" class="input-label">Button URL</label>
                                    <input type="text" class="form-control" name="home_achievement_contact_btn_url" id="home_achievement_contact_btn_url" placeholder="eg. /contact-us" value="{{ $option_value ? $option_value['home_achievement_contact_btn_url'] : null }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Achievement Section Info</label>
                        <div class="col-sm-9">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="home_achievement_title" class="input-label">Title</label>
                                    <input type="text" class="form-control" name="home_achievement_title" id="home_achievement_title" placeholder="Title..." value="{{ $option_value ? $option_value['home_achievement_title'] : null }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="home_achievement_experience" class="input-label">How many years experience?</label>
                                    <input type="text" class="form-control" name="home_achievement_experience" id="home_achievement_experience" placeholder="eg. 25+" value="{{ $option_value ? $option_value['home_achievement_experience'] : null }}">
                                </div>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="home_achievement_description" class="input-label">Description</label>
                                <textarea rows="3" class="form-control" name="home_achievement_description" id="home_achievement_description" placeholder="Description...">{{ $option_value ? $option_value['home_achievement_description'] : null }}</textarea>
                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <div class="js-add-field row form-group"
                         data-hs-add-field-options='{
                            "template": "#achievementCounterTemplate",
                            "container": "#achievementCounterContainer",
                            "defaultCreated": 0
                          }'>
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Achievement Counter Items</label>
                        <div class="col-sm-9">
                            @if($option_value)
                                @foreach(json_decode($option_value['home_achievement_counters'], true) as $key => $info)
                                    <div id="counters_{{ $key }}">
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <label for="home_achievement_counters_title_{{ $key }}" class="input-label">Counter title</label>
                                                <input type="text" class="form-control" name="home_achievement_counters_title[]" id="home_achievement_title_{{ $key }}" placeholder="eg. Happy Clients" value="{{ $option_value ? $info['title'] : null }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="home_achievement_counters_value_{{ $key }}" class="input-label">Counter value</label>
                                                <input type="text" class="form-control" name="home_achievement_counters_value[]" id="home_achievement_counters_value_{{ $key }}" placeholder="eg. 53k+" value="{{ $option_value ? $info['value'] : null }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="home_achievement_counters_icon_{{ $key }}" class="input-label">Counter icon</label>
                                                <input type="text" class="form-control" name="home_achievement_counters_icon[]" id="home_achievement_counters_icon_{{ $key }}" placeholder="eg. flaticon-new-product or fas fa-user" value="{{ $option_value ? $info['icon'] : null }}">
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
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="home_achievement_counters_title" class="input-label">Counter title</label>
                                        <input type="text" class="form-control" name="home_achievement_counters_title[]" id="home_achievement_title" placeholder="eg. Happy Clients">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="home_achievement_counters_value" class="input-label">Counter value</label>
                                        <input type="text" class="form-control" name="home_achievement_counters_value[]" id="home_achievement_counters_value" placeholder="eg. 53k+">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="home_achievement_counters_icon" class="input-label">Counter icon</label>
                                        <input type="text" class="form-control" name="home_achievement_counters_icon[]" id="home_achievement_counters_icon" placeholder="eg. flaticon-new-product or fas fa-user">
                                    </div>
                                </div>
                        @endif

                        <!-- Container For Input Field -->
                            <div id="achievementCounterContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                <i class="tio-add"></i> Add new counter
                            </a>
                        </div>
                    </div>

                    <!-- Add Phone Input Field -->
                    <div id="achievementCounterTemplate" style="display: none;">
                        <div class="input-group-add-field">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label class="input-label">Counter title</label>
                                    <input type="text" class="form-control" name="home_achievement_counters_title[]" placeholder="eg. Happy Clients">
                                </div>
                                <div class="col-sm-3">
                                    <label class="input-label">Counter value</label>
                                    <input type="text" class="form-control" name="home_achievement_counters_value[]" placeholder="eg. 53k+">
                                </div>
                                <div class="col-sm-3">
                                    <label class="input-label">Counter icon</label>
                                    <input type="text" class="form-control" name="home_achievement_counters_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                </div>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                <i class="tio-clear"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Add Phone Input Field -->
                </div>

                <div class="tab-pane fade" id="achievement-upload" role="tabpanel" aria-labelledby="achievement-upload-tab">
                    <div class="hidden-file">
                        <input type="hidden" name="_achievement_background_image" value="{{ $achievement_background_image_id }}">
                        <input type="hidden" name="_achievement_banner_image" value="{{ $achievement_banner_image_id }}">
                    </div>

                    <hr/>

                    <!-- Form Group -->
                    <div class="row mt-3 mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Achievement Section Image</label>

                        <div class="col-sm-9">
                            <!-- Section Award Upload Form Group -->
                            <div class="mb-1">
                                <!-- File Attachment Input -->
                                <label class="input-label">Background Image</label>
                                <label class="custom-file-boxed custom-file-boxed-sm" for="homeAchievementBackgroundUploader">
                                    <img id="home_achievement_background_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($achievement_background_image ? $achievement_background_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                    <span class="d-block">Browse your file here</span>
                                    <small class="d-block text-muted">Maximum file size 2MB</small>

                                    <input type="file" name="home_achievement_background_image" class="js-file-attach custom-file-boxed-input" id="homeAchievementBackgroundUploader"
                                           data-hs-file-attach-options='{
                                            "textTarget": "#home_achievement_background_image",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "allowTypes": [".png", ".jpeg", ".jpg"]
                                       }'>
                                </label>
                                <!-- End File Attachment Input -->
                            </div>

                            <div class="mb-1">
                                <!-- File Attachment Input -->
                                <label class="input-label">Banner Image</label>
                                <label class="custom-file-boxed custom-file-boxed-sm" for="homeAchievementBannerUploader">
                                    <img id="home_achievement_banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($achievement_banner_image ? $achievement_banner_image : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">
                                    <span class="d-block">Browse your file here</span>
                                    <small class="d-block text-muted">Maximum file size 2MB</small>

                                    <input type="file" name="home_achievement_banner_image" class="js-file-attach custom-file-boxed-input" id="homeAchievementBannerUploader"
                                           data-hs-file-attach-options='{
                                            "textTarget": "#home_achievement_banner_image",
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
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
