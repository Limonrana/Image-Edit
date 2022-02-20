<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Why Choose Us Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.choose.us') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                $why_choose_us_image_id = null;
                $why_choose_us_image = null;
                if (homeChooseUsSection()) {
                    $option_value = homeChooseUsSection();
                    if (array_key_exists('home_choose_us_banner_image', homeChooseUsSection())) {
                        $why_choose_us_image_id     = homeChooseUsSection()['home_choose_us_banner_image'];
                        $why_choose_us_upload = \App\Models\Upload::find($why_choose_us_image_id);
                        if (isset($why_choose_us_upload) OR count($why_choose_us_upload) > 0) {
                            $why_choose_us_image = $why_choose_us_upload->path;
                        }
                    }
                }
            @endphp
            <!-- Tab Content -->
                <div class="tab-pane fade show active" id="service-content" role="tabpanel" aria-labelledby="service-content-tab">
                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Section Info</label>
                        <div class="col-sm-9">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="home_choose_us_title" class="input-label">Title</label>
                                    <input type="text" class="form-control" name="home_choose_us_title" id="home_choose_us_title" placeholder="eg. Our Best Services" value="{{ $option_value ? $option_value['home_choose_us_title'] : null }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="home_choose_us_subtitle" class="input-label">Sub-Title</label>
                                    <input type="text" class="form-control" name="home_choose_us_subtitle" id="home_choose_us_subtitle" placeholder="eg. Our Services" value="{{ $option_value ? $option_value['home_choose_us_subtitle'] : null }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <!-- Form Group -->
                    <div class="row mt-3 mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Why Choose Us Banner</label>

                        <div class="col-sm-9">
                            <input type="hidden" name="_home_choose_us_banner_image" value="{{ $why_choose_us_image_id }}">
                            <!-- Section Award Upload Form Group -->
                            <div class="choose-us-section">
                                <div class="form-group">
                                    <!-- File Attachment Input -->
                                    <label class="input-label">Banner Image</label>
                                    <label class="custom-file-boxed custom-file-boxed-sm" for="homeChooseUsBannerImageUploader">
                                        <img id="home_choose_us_banner_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($why_choose_us_image ? $why_choose_us_image : 'assets/svg/illustrations/browse.svg') }}" alt="why_choose_us_image">
                                        <span class="d-block">Browse your file here</span>
                                        <small class="d-block text-muted">Maximum file size 2MB</small>

                                        <input type="file" name="home_choose_us_banner_image" class="js-file-attach custom-file-boxed-input" id="homeChooseUsBannerImageUploader"
                                               data-hs-file-attach-options='{
                                                    "textTarget": "#home_choose_us_banner_image",
                                                    "mode": "image",
                                                    "targetAttr": "src",
                                                    "allowTypes": [".png", ".jpeg", ".jpg"]
                                               }'>
                                    </label>
                                    <!-- End File Attachment Input -->
                                </div>
                            </div>
                            <!-- End Section Award Upload Form Group -->
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <hr/>

                    <!-- Form Group -->
                    <div class="js-add-field row form-group"
                         data-hs-add-field-options='{
                            "template": "#chooseUsInfoTemplate",
                            "container": "#chooseUsInfoContainer",
                            "defaultCreated": 0
                          }'>
                        <label for="home_choose_us_info_title" class="col-sm-3 col-form-label input-label">Why Choose Us Information</label>
                        <div class="col-sm-9">
                            @if($option_value)
                                @foreach(json_decode($option_value['home_choose_us_info'], true) as $key => $info)
                                    <div id="{{ $key }}">
                                        <div class="form-group">
                                            <label for="home_choose_us_info_description" class="input-label">Information title</label>
                                            <input type="text" class="form-control" name="home_choose_us_info_title[]" id="home_choose_us_info_title" placeholder="Info Title" value="{{ $option_value ? $info['title'] : null }}">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="home_choose_us_info_description" class="input-label">Information description</label>
                                            <textarea rows="2" class="form-control" name="home_choose_us_info_description[]" id="home_choose_us_info_description" placeholder="Description...">{{ $option_value ? $info['description'] : null }}</textarea>
                                        </div>
                                        <div class="remove-faq text-right mt-1">
                                            <button class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="document.getElementById({{ $key }}).remove();">
                                                <i class="tio-remove-from-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <div class="form-group">
                                        <label for="home_choose_us_info_description" class="input-label">Information title</label>
                                        <input type="text" class="form-control" name="home_choose_us_info_title[]" id="home_choose_us_info_title" placeholder="Info Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_choose_us_info_description" class="input-label">Information description</label>
                                        <textarea rows="2" class="form-control" name="home_choose_us_info_description[]" id="home_choose_us_info_description" placeholder="Description..."></textarea>
                                    </div>
                                </div>
                            @endif

                            <!-- Container For Input Field -->
                            <div id="chooseUsInfoContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                <i class="tio-add"></i> Add new information
                            </a>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Add Phone Input Field -->
                    <div id="chooseUsInfoTemplate" style="display: none;">
                        <div class="input-group-add-field">
                            <div class="form-group">
                                <label class="input-label">Information title</label>
                                <input type="text" class="form-control" name="home_choose_us_info_title[]" placeholder="Info Title">
                            </div>
                            <div class="form-group">
                                <label class="input-label">Information description</label>
                                <textarea rows="2" class="form-control" name="home_choose_us_info_description[]" placeholder="Description..."></textarea>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                <i class="tio-clear"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Add Phone Input Field -->
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
