<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">SEO Meta Sections</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.seo') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                if (homeSeoMetaSection()) {
                    $option_value = homeSeoMetaSection();
                }
            @endphp
            <div class="others-section">
                <!-- Form Group -->
                <div class="row mb-3">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">SEO Meta Details</label>
                    <div class="col-sm-9">
                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="home_meta_title" class="input-label">SEO Meta Title</label>

                            <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="eg. Car Image Editing" value="{{ $option_value ? $option_value['meta_title'] : null }}">
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="home_meta_description" class="input-label">SEO Meta Description</label>
                                <span id="maxLengthCountCharacters" class="text-muted"></span>
                            </div>
                            <textarea class="js-count-characters form-control" name="meta_description" id="meta_description" placeholder="SEO Meta Description" rows="3" maxlength="160"
                                      data-hs-count-characters-options='{
                                          "output": "#maxLengthCountCharacters"
                                        }'>{{ $option_value ? $option_value['meta_description'] : null }}</textarea>
                        </div>
                        <!-- End Form Group -->
                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="home_meta_keywords" class="input-label">SEO Meta Tags</label>
                            <input type="text" class="js-tagify tagify-form-control form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter tags here" aria-label="Enter tags here" value="{{ $option_value ? $option_value['meta_keywords'] : null }}">
                        </div>
                        <!-- End Form Group -->
                    </div>
                </div>
                <!-- End Form Group -->
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
