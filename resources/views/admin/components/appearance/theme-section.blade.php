<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h4 class="card-title">Theme Option</h4>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('appearance.update', 'theme-option') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $image_id = null;
                $option_value = null;
                $image = null;
                if (appearance('theme-option')) {
                    $option_value = json_decode(appearance('theme-option')->option_value, true);
                    if (array_key_exists('page_bg_image', json_decode(appearance('theme-option')->option_value, true))) {
                        $image_id = json_decode(appearance('theme-option')->option_value, true)['page_bg_image'];
                        $upload = \App\Models\Upload::find($image_id);
                        if (isset($upload) OR count($upload) > 0) {
                            $image = $upload->path;
                        }
                    }
                }
            @endphp
            <input type="hidden" name="_logo" value="{{ $image_id }}">
            <!-- Form Group Heading Element -->
            <div class="row form-group">
                <label class="col-sm-3 col-form-label input-label">Heading Element</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="theme_heading_font_size">Font Size</label>
                                <input type="text" id="heading_font_size" class="form-control @error('theme_heading_font_size') is-invalid @enderror" name="theme_heading_font_size" placeholder="eg. 20px" value="{{ $option_value ? $option_value['theme_heading_font_size'] : null }}" />
                                @error('theme_heading_font_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="theme_heading_font_color">Font Color</label>
                                <div id="colorPicker3" class="input-group @error('theme_heading_font_color') is-invalid @enderror" title="Font Color">
                                    <input type="text" id="theme_heading_font_color" class="form-control input-lg" name="theme_heading_font_color" value="{{ $option_value ? $option_value['theme_heading_font_color'] : '#040021' }}"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                    </span>
                                </div>
                                @error('theme_heading_font_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Group Heading Element -->

            <!-- Form Group Sub-heading Element -->
            <div class="row form-group">
                <label class="col-sm-3 col-form-label input-label">Sub-heading Element</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="theme_subheading_font_size">Font Size</label>
                                <input type="text" id="theme_subheading_font_size" class="form-control @error('theme_subheading_font_size') is-invalid @enderror" name="theme_subheading_font_size" placeholder="eg. 20px" value="{{ $option_value ? $option_value['theme_subheading_font_size'] : null }}" />
                                @error('theme_subheading_font_size')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="theme_subheading_font_color">Font Color</label>
                                <div id="colorPicker3" class="input-group @error('theme_subheading_font_color') is-invalid @enderror" title="Font Color">
                                    <input type="text" id="theme_subheading_font_color" class="form-control input-lg" name="theme_subheading_font_color" value="{{ $option_value ? $option_value['theme_subheading_font_color'] : '#6639ff' }}"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                    </span>
                                </div>
                                @error('theme_subheading_font_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Group Sub-heading Element -->

            <!-- Form Group Paragraph Element -->
            <div class="row form-group">
                <label class="col-sm-3 col-form-label input-label">Paragraph Element</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="theme_paragraph_font_size">Font Size</label>
                                <input type="text" id="theme_paragraph_font_size" class="form-control @error('theme_paragraph_font_size') is-invalid @enderror" name="theme_paragraph_font_size" placeholder="eg. 20px" value="{{ $option_value ? $option_value['theme_paragraph_font_size'] : null }}" />
                                @error('theme_paragraph_font_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label" for="theme_paragraph_font_color">Font Color</label>
                                <div id="colorPicker3" class="input-group @error('theme_paragraph_font_color') is-invalid @enderror" title="Font Color">
                                    <input type="text" id="theme_paragraph_font_color" class="form-control input-lg" name="theme_paragraph_font_color" value="{{ $option_value ? $option_value['theme_paragraph_font_color'] : '#8f98a8' }}"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                    </span>
                                </div>
                                @error('theme_paragraph_font_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Group Paragraph Element -->

            <div class="col-12 mb-3">
                <span class="divider">Theme Option Section</span>
            </div>

            <div class="row">
                <div  class="col-12">
                    <div class="form-group">
                        <!-- File Attachment Input -->
                        <label>Page Background Image</label>
                        <label class="custom-file-boxed custom-file-boxed-sm @error('page_bg_image') is-invalid custom-file-boxed-error @enderror" for="pageBgImageUploader">
                            <img id="page_bg_image" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($image ? $image : 'assets/svg/illustrations/browse.svg') }}" alt="page_bg_image">

                            <span class="d-block">Browse your file here</span>
                            <small class="d-block text-muted">Maximum file size 2MB</small>

                            <input type="file" name="page_bg_image" class="js-file-attach custom-file-boxed-input" id="pageBgImageUploader"
                                   data-hs-file-attach-options='{
                                        "textTarget": "#page_bg_image",
                                        "mode": "image",
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg"]
                                   }'>
                        </label>
                        <!-- End File Attachment Input -->
                        @error('page_bg_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="theme_primary_color">Theme primary color</label>
                        <div id="colorPicker3" class="input-group @error('theme_primary_color') is-invalid @enderror" title="Color">
                            <input type="text" id="footer_social_btn_bg" class="form-control input-lg" name="theme_primary_color" value="{{ $option_value ? $option_value['theme_primary_color'] : '#6639ff' }}"/>
                            <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </span>
                        </div>
                        @error('theme_primary_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="theme_secondary_color">Theme secondary color</label>
                        <div id="colorPicker3" class="input-group @error('theme_secondary_color') is-invalid @enderror" title="Color">
                            <input type="text" id="theme_secondary_color" class="form-control input-lg" name="theme_secondary_color" value="{{ $option_value ? $option_value['theme_secondary_color'] : '#040021' }}"/>
                            <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </span>
                        </div>
                        @error('theme_secondary_color')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
