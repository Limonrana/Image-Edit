<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h4 class="card-title">Social accounts</h4>
    </div>

    <!-- Body -->
    <div class="card-body">
        <form action="{{ route('appearance.update', 'social-account') }}" method="POST">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                if (appearance('social-account')) {
                    $option_value = json_decode(appearance('social-account')->option_value, true);
                }
            @endphp
            <div class="row">
                <div class="col-3">
                    <h5>
                        <span><i class="tio-facebook list-group-icon mt-1"></i></span>
                        <span class="mb-0">Facebook</span>
                    </h5>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <input type="text" id="social_fb_url" class="form-control @error('social_fb_url') is-invalid @enderror" name="social_fb_url" placeholder="eg. www.example.com/page" value="{{ $option_value ? $option_value['social_fb_url'] : null }}" />
                        @error('social_fb_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <h5>
                        <span><i class="tio-twitter list-group-icon mt-1"></i></span>
                        <span class="mb-0">Twitter</span>
                    </h5>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <input type="text" id="social_twitter_url" class="form-control @error('social_twitter_url') is-invalid @enderror" name="social_twitter_url" placeholder="eg. www.example.com/page" value="{{ $option_value ? $option_value['social_twitter_url'] : null }}" />
                        @error('social_twitter_url')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <h5>
                        <span><i class="tio-linkedin list-group-icon mt-1"></i></span>
                        <span class="mb-0">Linkedin</span>
                    </h5>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <input type="text" id="social_linkedin_url" class="form-control @error('social_linkedin_url') is-invalid @enderror" name="social_linkedin_url" placeholder="eg. www.example.com/page" value="{{ $option_value ? $option_value['social_linkedin_url'] : null }}" />
                        @error('social_linkedin_url')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <h5>
                        <span><i class="tio-instagram list-group-icon mt-1"></i></span>
                        <span class="mb-0">Instagram</span>
                    </h5>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <input type="text" id="social_instagram_url" class="form-control @error('social_instagram_url') is-invalid @enderror" name="social_instagram_url" placeholder="eg. www.example.com/page" value="{{ $option_value ? $option_value['social_instagram_url'] : null }}" />
                        @error('social_instagram_url')
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
    </div>
    <!-- End Body -->
</div>
