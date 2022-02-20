<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Our Contact Us Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('page.contact.info') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $option_value = null;
                if (contactPageInfo()) {
                    $option_value = contactPageInfo();
                }
            @endphp

            <!-- Section Title -->
                <div class="contact-section">
                    <!-- Form Group -->
                    <div class="row mb-3">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Contact Section Info</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="contact_form_title" class="input-label">From Title</label>
                                <input type="text" class="form-control" name="contact_form_title" id="contact_form_title" placeholder="eg. Get In Touch" value="{{ $option_value ? $option_value['contact_form_title'] : null }}">
                            </div>
                            <div class="form-group">
                                <label for="contact_with_us_title" class="input-label">Contact Title</label>
                                <input type="text" class="form-control" name="contact_with_us_title" id="contact_with_us_title" placeholder="eg. Direct Contact Us" value="{{ $option_value ? $option_value['contact_with_us_title'] : null }}">
                            </div>
                            <div class="form-group">
                                <label for="contact_location_url" class="input-label">Google Embed Location Url</label>
                                <textarea class="form-control" name="contact_location_url" id="contact_location_url" cols="30" rows="3">{!! $option_value ? $option_value['contact_location_url'] : null !!}</textarea>
                                <small><b>EXMAPLE URL: </b>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116834.00977793337!2d90.3492858391922!3d23.780777744454788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1644746359405!5m2!1sen!2sbd</small>
                                <a href="https://www.google.com/maps/place/Dhaka/@23.7807777,90.3492858,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.810332!4d90.4125181?hl=en" target="_blank">Create URL</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    <div class="js-add-field row form-group"
                         data-hs-add-field-options='{
                            "template": "#contactTemplate",
                            "container": "#contactContainer",
                            "defaultCreated": 0
                          }'>
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Contact Items</label>
                        <div class="col-sm-9">
                            @if($option_value)
                                @foreach(json_decode($option_value['contact_with_us_items'], true) as $key => $info)
                                    <div id="contact_item_{{ $key }}">
                                        <div class="row form-group mb-0">
                                            <div class="col-sm-4">
                                                <label class="input-label">Contact Value 1</label>
                                                <input type="text" class="form-control" name="contact_item_value_1[]" placeholder="eg. (555) 764 890 345" value="{{ $option_value ? $info['value_1'] : null }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="input-label">Contact Value 1</label>
                                                <input type="text" class="form-control" name="contact_item_value_2[]" placeholder="eg. (555) 764 890 345" value="{{ $option_value ? $info['value_2'] : null }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="input-label">Contact Icon</label>
                                                <input type="text" class="form-control" name="contact_item_icon[]" placeholder="eg. flaticon-new-product or fas fa-user" value="{{ $option_value ? $info['icon'] : null }}">
                                            </div>
                                        </div>
                                        <div class="remove-faq text-right mt-1">
                                            <button type="button" class="btn btn-sm btn-no-focus btn-ghost-danger" onclick="document.getElementById('contact_item_{{ $key }}').remove();"><i class="tio-remove-from-trash"></i> Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row form-group mb-0">
                                    <div class="col-sm-4">
                                        <label class="input-label">Contact Value 1</label>
                                        <input type="text" class="form-control" name="contact_item_value_1[]" placeholder="eg. (555) 764 890 345">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="input-label">Contact Value 1</label>
                                        <input type="text" class="form-control" name="contact_item_value_2[]" placeholder="eg. (555) 764 890 345">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="input-label">Contact Icon</label>
                                        <input type="text" class="form-control" name="contact_item_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                    </div>
                                </div>
                            @endif

                        <!-- Container For Input Field -->
                            <div id="contactContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                <i class="tio-add"></i> Add new contact
                            </a>
                        </div>
                    </div>

                    <!-- Add Phone Input Field -->
                    <div id="contactTemplate" style="display: none;">
                        <div class="input-group-add-field">
                            <div class="row form-group mb-0">
                                <div class="col-sm-4">
                                    <label class="input-label">Contact Value 1</label>
                                    <input type="text" class="form-control" name="contact_item_value_1[]" placeholder="eg. (555) 764 890 345">
                                </div>
                                <div class="col-sm-4">
                                    <label class="input-label">Contact Value 1</label>
                                    <input type="text" class="form-control" name="contact_item_value_2[]" placeholder="eg. (555) 764 890 345">
                                </div>
                                <div class="col-sm-4">
                                    <label class="input-label">Contact Icon</label>
                                    <input type="text" class="form-control" name="contact_item_icon[]" placeholder="eg. flaticon-new-product or fas fa-user">
                                </div>
                            </div>

                            <a class="js-delete-field input-group-add-field-delete" href="javascript:;"><i class="tio-clear"></i></a>
                        </div>
                    </div>
                    <!-- End Contact Item Input Field -->
                </div>


            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
