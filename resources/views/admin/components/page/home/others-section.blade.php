<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Others Sections</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.others') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                if (homeOthersSection()) {
                    $option_value = homeOthersSection();
                }
            @endphp
            <div class="others-section">
                <!-- Form Group -->
                <div class="row mb-3">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Testimonial Section Info</label>
                    <div class="col-sm-9">
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="home_testimonial_title" class="input-label">Title</label>
                                <input type="text" class="form-control" name="home_testimonial_title" id="home_testimonial_title" placeholder="Title..." value="{{ $option_value ? $option_value['home_testimonial_title'] : null }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="home_testimonial_subtitle" class="input-label">Sub Title</label>
                                <input type="text" class="form-control" name="home_testimonial_subtitle" id="home_testimonial_subtitle" placeholder="Sub-Title..." value="{{ $option_value ? $option_value['home_testimonial_subtitle'] : null }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Group -->
                <hr/>

                <!-- Form Group -->
                <div class="row mb-3">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Portfolio Section Info</label>
                    <div class="col-sm-9">
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="home_portfolio_title" class="input-label">Title</label>
                                <input type="text" class="form-control" name="home_portfolio_title" id="home_portfolio_title" placeholder="Title..." value="{{ $option_value ? $option_value['home_portfolio_title'] : null }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="home_portfolio_subtitle" class="input-label">Sub Title</label>
                                <input type="text" class="form-control" name="home_portfolio_subtitle" id="home_portfolio_subtitle" placeholder="Sub-Title..." value="{{ $option_value ? $option_value['home_portfolio_subtitle'] : null }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="home_portfolio_btn_text" class="input-label">Button Text</label>
                                <input type="text" class="form-control" name="home_portfolio_btn_text" id="home_portfolio_btn_text" placeholder="eg. All Projects" value="{{ $option_value ? $option_value['home_portfolio_btn_text'] : null }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="home_portfolio_btn_url" class="input-label">Button URL</label>
                                <input type="text" class="form-control" name="home_portfolio_btn_url" id="home_portfolio_btn_url" placeholder="eg. /projects" value="{{ $option_value ? $option_value['home_portfolio_btn_url'] : null }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Group -->
                <hr/>

                <!-- Form Group -->
                <div class="row mb-3">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Blog Section Info</label>
                    <div class="col-sm-9">
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="home_blog_title" class="input-label">Title</label>
                                <input type="text" class="form-control" name="home_blog_title" id="home_blog_title" placeholder="Title..." value="{{ $option_value ? $option_value['home_blog_title'] : null }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="home_blog_subtitle" class="input-label">Sub Title</label>
                                <input type="text" class="form-control" name="home_blog_subtitle" id="home_blog_subtitle" placeholder="Sub-Title..." value="{{ $option_value ? $option_value['home_blog_subtitle'] : null }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="home_blog_btn_text" class="input-label">Button Text</label>
                                <input type="text" class="form-control" name="home_blog_btn_text" id="home_blog_btn_text" placeholder="eg. All Blogs" value="{{ $option_value ? $option_value['home_blog_btn_text'] : null }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="home_blog_btn_url" class="input-label">Button URL</label>
                                <input type="text" class="form-control" name="home_blog_btn_url" id="home_blog_btn_url" placeholder="eg. /blogs" value="{{ $option_value ? $option_value['home_blog_btn_url'] : null }}">
                            </div>
                        </div>
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
