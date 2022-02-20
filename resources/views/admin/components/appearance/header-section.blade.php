<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Header Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('appearance.update', 'header') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $logo_id = null;
                $option_value = null;
                $logo = null;
                if (appearance('header')) {
                    $option_value = json_decode(appearance('header')->option_value, true);
                    if (array_key_exists('header_logo', json_decode(appearance('header')->option_value, true))) {
                        $logo_id = json_decode(appearance('header')->option_value, true)['header_logo'];
                        $upload = \App\Models\Upload::find($logo_id);
                        if (isset($upload)) {
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
                        <label>Header logo</label>
                        <label class="custom-file-boxed custom-file-boxed-sm @error('header_logo') is-invalid custom-file-boxed-error @enderror" for="headerLogoUploader">
                            <img id="header_logo" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset($logo ? $logo : 'assets/svg/illustrations/browse.svg') }}" alt="featured_image">

                            <span class="d-block">Browse your file here</span>
                            <small class="d-block text-muted">Maximum file size 2MB</small>

                            <input type="file" name="header_logo" class="js-file-attach custom-file-boxed-input" id="headerLogoUploader"
                                   data-hs-file-attach-options='{
                                        "textTarget": "#header_logo",
                                        "mode": "image",
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg"]
                                   }'>
                        </label>
                        <!-- End File Attachment Input -->
                        @error('header_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="header_logo_width">Logo width</label>
                        <input type="text" id="header_logo_width" class="form-control @error('header_logo_width') is-invalid @enderror" name="header_logo_width" placeholder="eg. 120px" value="{{ $option_value ?  $option_value['header_logo_width'] : null }}" />
                        @error('header_logo_width')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="header_logo_height">Logo height</label>
                        <input type="text" id="logo_height" class="form-control @error('header_logo_height') is-invalid @enderror" name="header_logo_height" placeholder="eg. 120px" value="{{ $option_value ?  $option_value['header_logo_height'] : null }}" />
                        @error('header_logo_height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <span class="divider">Top Bar Section</span>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="top_bar_phone">TopBar phone number</label>
                        <input type="text" id="top_bar_phone" class="form-control @error('top_bar_phone') is-invalid @enderror" name="top_bar_phone" placeholder="eg. (555) 674 890 556" value="{{ $option_value ?  $option_value['top_bar_phone'] : null }}" />
                        @error('top_bar_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="top_bar_phone">TopBar email address</label>
                        <input type="text" id="top_bar_email" class="form-control @error('top_bar_email') is-invalid @enderror" name="top_bar_email" placeholder="eg. support@domain.com" value="{{ $option_value ? $option_value['top_bar_email'] : null }}" />
                        @error('top_bar_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label class="input-label" for="top_bar_service_hours">TopBar service hours</label>
                        <input type="text" id="top_bar_service_hours" class="form-control @error('top_bar_service_hours') is-invalid @enderror" name="top_bar_service_hours" placeholder="eg. 9:30 AM - 6:30 PM" value="{{ $option_value ? $option_value['top_bar_service_hours'] : null }}" />
                        @error('top_bar_service_hours')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="input-label" for="top_bar_icon_color">TopBar icon color</label>
                        <div id="colorPicker" class="input-group" title="Top Bar Icon Color">
                            <input type="text" id="top_bar_icon_color" class="form-control input-lg" name="top_bar_icon_color" value="{{ array_key_exists('top_bar_icon_color', $option_value) ? $option_value['top_bar_icon_color'] : '#6639ff' }}"/>
                            <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </span>
                        </div>
                        @error('top_bar_icon_color')
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
