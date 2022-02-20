<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Footer Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('appearance.update', 'footer') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $logo_id = null;
                $option_value = null;
                $logo = null;
                if (appearance('footer')) {
                    $option_value = json_decode(appearance('footer')->option_value, true);
                    if (array_key_exists('footer_logo', json_decode(appearance('footer')->option_value, true))) {
                        $logo_id = json_decode(appearance('footer')->option_value, true)['footer_logo'];
                        $upload = \App\Models\Upload::find($logo_id);
                        if (isset($upload) OR count($upload) > 0) {
                            $logo = $upload->path;
                        }
                    }
                }
            @endphp
            <input type="hidden" name="_logo" value="{{ $logo_id }}">
            <div class="row">
                <div  class="col-12">
                    <div class="form-group">
                        <!-- File Attachment Input -->
                        <label>Footer logo</label>
                        <label class="custom-file-boxed custom-file-boxed-sm @error('footer_logo') is-invalid custom-file-boxed-error @enderror" for="footerLogoUploader">
                            <img id="footer_logo" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($logo ? $logo : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">

                            <span class="d-block">Browse your file here</span>
                            <small class="d-block text-muted">Maximum file size 2MB</small>

                            <input type="file" name="footer_logo" class="js-file-attach custom-file-boxed-input" id="footerLogoUploader"
                                   data-hs-file-attach-options='{
                                        "textTarget": "#footer_logo",
                                        "mode": "image",
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg"]
                                   }'>
                        </label>
                        <!-- End File Attachment Input -->
                        @error('footer_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="footer_logo_width">Logo width</label>
                        <input type="text" id="logo_width" class="form-control @error('footer_logo_width') is-invalid @enderror" name="footer_logo_width" placeholder="eg. 120px" value="{{ $option_value ? $option_value['footer_logo_width'] : null }}" />
                        @error('footer_logo_width')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="footer_logo_height">Logo height</label>
                        <input type="text" id="logo_height" class="form-control @error('footer_logo_height') is-invalid @enderror" name="footer_logo_height" placeholder="eg. 120px" value="{{ $option_value ?  $option_value['footer_logo_height'] : null }}" />
                        @error('footer_logo_height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Newsletter Section</span>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="newsletter_title">Newsletter title</label>
                        <input type="text" id="newsletter_title" class="form-control @error('newsletter_title') is-invalid @enderror" name="newsletter_title" placeholder="eg. Subscribe Us For Newsletter" value="{{ $option_value ?  $option_value['newsletter_title'] : null }}" />
                        @error('newsletter_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="newsletter_btn_text">Newsletter button text</label>
                        <input type="text" id="newsletter_btn_text" class="form-control @error('newsletter_btn_text') is-invalid @enderror" name="newsletter_btn_text" placeholder="eg. Subscribe Us" value="{{ $option_value ?  $option_value['newsletter_btn_text'] : null }}" />
                        @error('newsletter_btn_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label class="input-label" for="newsletter_description">Newsletter description</label>
                        <input type="text" id="newsletter_description" class="form-control @error('newsletter_description') is-invalid @enderror" name="newsletter_description" placeholder="eg. Newsletter Description" value="{{ $option_value ?  $option_value['newsletter_description'] : null }}" />
                        @error('newsletter_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="input-label" for="newsletter_btn_bg">Newsletter button BG color</label>
                        <div id="colorPicker2" class="input-group" title="Newsletter Button Background Color">
                            <input type="text" id="newsletter_btn_bg" class="form-control input-lg" name="newsletter_btn_bg" value="{{ $option_value ? $option_value['newsletter_btn_bg'] : '#6639ff' }}"/>
                            <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </span>
                        </div>
                        @error('newsletter_btn_bg')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Main Footer Section</span>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="footer_about_us">About company</label>
                        <textarea class="form-control @error('footer_about_us') is-invalid @enderror" name="footer_about_us" rows="3" placeholder="About your company" id="footer_about_us">{{ $option_value ? $option_value['footer_about_us'] : null }}</textarea>
                        @error('footer_about_us')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="footer_contact_info">Contact info</label>
                        <input type="text" id="footer_contact_info" class="form-control @error('footer_contact_info') is-invalid @enderror" name="footer_contact_info" placeholder="eg. Street House, Greater London NW1 8JR, UK" value="{{ $option_value ? $option_value['footer_contact_info'] : null }}" />
                        @error('footer_contact_info')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="input-label" for="footer_social_btn_bg">Social button BG color</label>
                        <div id="colorPicker3" class="input-group" title="Social Button Background Color">
                            <input type="text" id="footer_social_btn_bg" class="form-control input-lg" name="footer_social_btn_bg" value="{{ $option_value ? $option_value['footer_social_btn_bg'] : '#6639ff' }}"/>
                            <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </span>
                        </div>
                        @error('footer_social_btn_bg')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="input-label" for="footer_social_btn_color">Social button color</label>
                        <div id="colorPicker4" class="input-group" title="Social Button Color">
                            <input type="text" id="footer_social_btn_color" class="form-control input-lg" name="footer_social_btn_color" value="{{ $option_value ? $option_value['footer_social_btn_color'] : '#fff' }}"/>
                            <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </span>
                        </div>
                        @error('footer_social_btn_color')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="footer_copyright">Copyright text</label>
                        <input type="text" id="footer_copyright" class="form-control @error('footer_copyright') is-invalid @enderror" name="footer_copyright" placeholder="eg. Copyright @2021 Web Soft King LTD | All Rights Reserved" value="{{ $option_value ? $option_value['footer_copyright'] : null }}" />
                        @error('footer_copyright')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
