<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Our Services Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.home.service') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                $services = \App\Models\Service::latest()->get();
                if (homeServiceSection()) {
                    $option_value = homeServiceSection();
                }
            @endphp
            <!-- Tab Content -->
                <div class="tab-pane fade show active" id="service-content" role="tabpanel" aria-labelledby="service-content-tab">
                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Service Section Info</label>
                        <div class="col-sm-9">
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="home_service_title" class="input-label">Title</label>
                                    <input type="text" class="form-control" name="home_service_title" id="home_service_title" placeholder="eg. Our Best Services" value="{{ $option_value ? $option_value['home_service_title'] : null }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="home_service_subtitle" class="input-label">Sub-Title</label>
                                    <input type="text" class="form-control" name="home_service_subtitle" id="home_service_subtitle" placeholder="eg. Our Services" value="{{ $option_value ? $option_value['home_service_subtitle'] : null }}">
                                </div>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="home_service_description" class="input-label">Description</label>
                                <textarea rows="3" class="form-control" name="home_service_description" id="home_service_description" placeholder="Service Section Description...">{{ $option_value ? $option_value['home_service_description'] : null }}</textarea>
                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Service Select</label>
                        <div class="col-sm-9">
                            <!-- Form Group -->
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="home_service_btn_text" class="input-label">Button text</label>
                                    <input type="text" class="form-control" name="home_service_btn_text" id="home_service_btn_text" placeholder="eg. Our Best Service" value="{{ $option_value ? $option_value['home_service_btn_text'] : null }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="home_service_btn_icon" class="input-label">Button icon</label>
                                    <input type="text" class="form-control" name="home_service_btn_icon" id="home_service_btn_icon" placeholder="EG. fas fa-plus" value="{{ $option_value ? $option_value['home_service_btn_icon'] : null }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="home_service_list" class="input-label">Select Best Services</label>
                                <!-- Select2 -->
                                <select class="js-select2-custom custom-select" multiple size="1" style="opacity: 0;" name="home_service_list[]" id="home_service_list"
                                        data-hs-select2-options='{
                                          "minimumResultsForSearch": "Infinity"
                                        }'>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $option_value && in_array($service->id, $option_value['home_service_list']) ? 'selected' : null }}>{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select2 -->
                            </div>
                            <!-- End Form Group -->
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
