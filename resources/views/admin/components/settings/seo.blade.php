<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">SEO Settings Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('settings.seo.update') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" placeholder="eg. Car Image Edit" value="{{ $settings !== null && isset($settings->meta_title) ? $settings->meta_title : null }}" required />
                        @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="meta_author">Meta Author</label>
                        <input type="text" id="meta_author" class="form-control @error('meta_author') is-invalid @enderror" name="meta_author" placeholder="eg. Jon Doe" value="{{ $settings !== null && isset($settings->meta_author) ? $settings->meta_author : null }}" required />
                        @error('meta_author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label class="input-label" for="meta_description">Meta Description</label>
                            <span id="maxLengthCountCharacters" class="text-muted"></span>
                        </div>
                        <textarea class="js-count-characters form-control @error('meta_description') is-invalid @enderror" name="meta_description" id="meta_description" placeholder="SEO Meta Description" rows="2" maxlength="160"
                                  data-hs-count-characters-options='{
                                          "output": "#maxLengthCountCharacters"
                                  }'>{{ $settings !== null && isset($settings->meta_description) ? $settings->meta_description : null }}</textarea>
                        @error('app_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="meta_keywords">Meta Keywords</label>
                        <input type="text" id="meta_keywords" class="js-tagify tagify-form-control form-control @error('app_admin_email') is-invalid @enderror" name="meta_keywords" placeholder="Enter Your Meta Keywords" value="{{ $settings !== null && isset($settings->meta_keywords) ? $settings->meta_keywords : null }}" required />
                        @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Others Meta Tag Content (HTML META TAGS)</span>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="meta_content">Meta Content (HTML CODE ONLY)</label>
                        <textarea class="form-control form-control-light form-control-hover-light @error('meta_content') is-invalid @enderror" name="meta_content" id="meta_content" placeholder="NOTE: Content must be HTML Code" rows="5"
                            >{{ $settings !== null && isset($settings->meta_content) ? $settings->meta_content : null }}</textarea>
                        @error('meta_content')
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
