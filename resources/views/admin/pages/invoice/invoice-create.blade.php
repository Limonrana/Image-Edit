@extends('admin.layout.layout')

@section('title', 'Invoice Generator - Car Image Edit')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-9 mb-5 mb-lg-0">
                <!-- Card -->
                <div class="card card-lg">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="row justify-content-md-between">
                            <div class="col-md-4">
                                <!-- Logo -->
                                <label class="custom-file-boxed custom-file-boxed-sm" for="logoUploader">
                                    <img id="logoImg" class="avatar avatar-xl avatar-4by3 avatar-centered h-100 mb-2" src="{{ asset('assets/svg/illustrations/browse.svg') }}" alt="Image Description">

                                    <span class="d-block">Browse your file here</span>

                                    <input type="file" class="js-file-attach custom-file-boxed-input" id="logoUploader"
                                           data-hs-file-attach-options='{
                                "textTarget": "#logoImg",
                                "mode": "image",
                                "targetAttr": "src",
                                "allowTypes": [".png", ".jpeg", ".jpg"]
                             }'>
                                </label>
                                <!-- End Logo -->
                            </div>

                            <div class="col-md-5 text-md-right">
                                <h2>Invoice #</h2>

                                <!-- Form Group -->
                                <div class="form-group d-md-flex justify-content-md-end">
                                    <input type="text" class="form-control w-auto" placeholder="" aria-label="" value="0982131">
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Who is this invoice from?" id="invoiceAddressFromLabel" aria-label="Who is this invoice from?" rows="3"></textarea>
                                </div>
                                <!-- End Form Group -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <hr class="my-5">

                        <div class="row mb-3">
                            <div class="col-md-5">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label for="invoiceAddressToLabel" class="input-label">Bill to:</label>
                                    <textarea class="form-control" placeholder="Who is this invoice from?" id="invoiceAddressToLabel" aria-label="Who is this invoice from?" rows="3"></textarea>
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="col-md-7 align-self-md-end">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <dl class="row align-items-sm-center mb-3">
                                        <dt class="col-sm-4 col-md text-sm-right mb-2 mb-sm-0">Invoice date:</dt>
                                        <dd class="col-sm-8 col-md-auto mb-0">
                                            <!-- Flatpickr -->
                                            <div id="invoiceDateFlatpickr" class="js-flatpickr flatpickr-custom input-group input-group-merge"
                                                 data-hs-flatpickr-options='{
                                "appendTo": "#invoiceDateFlatpickr",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                              }'>
                                                <div class="input-group-prepend" data-toggle>
                                                    <div class="input-group-text">
                                                        <i class="tio-date-range"></i>
                                                    </div>
                                                </div>

                                                <input type="text" class="flatpickr-custom-form-control form-control" placeholder="Select dates" data-input value="29/06/2020">
                                            </div>
                                            <!-- End Flatpickr -->
                                        </dd>
                                    </dl>

                                    <dl class="row align-items-sm-center">
                                        <dt class="col-sm-4 col-md text-sm-right mb-2 mb-sm-0">Due date:</dt>
                                        <dd class="col-sm-8 col-md-auto mb-0">
                                            <!-- Flatpickr -->
                                            <div id="invoiceDueDateFlatpickr" class="js-flatpickr flatpickr-custom input-group input-group-merge"
                                                 data-hs-flatpickr-options='{
                                "appendTo": "#invoiceDueDateFlatpickr",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                              }'>
                                                <div class="input-group-prepend" data-toggle>
                                                    <div class="input-group-text">
                                                        <i class="tio-date-range"></i>
                                                    </div>
                                                </div>

                                                <input type="text" class="flatpickr-custom-form-control form-control" placeholder="Select dates" data-input value="29/06/2020">
                                            </div>
                                            <!-- End Flatpickr -->
                                        </dd>
                                    </dl>
                                </div>
                                <!-- End Form Group -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <div class="js-add-field"
                             data-hs-add-field-options='{
                                "template": "#addInvoiceItemTemplate",
                                "container": "#addInvoiceItemContainer",
                                "defaultCreated": 0
                              }'>
                            <!-- Title -->
                            <div class="bg-light border-bottom p-2 mb-3">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h6 class="card-title text-cap">Item</h6>
                                    </div>
                                    <div class="col-sm-3 d-none d-sm-inline-block">
                                        <h6 class="card-title text-cap">Quantity</h6>
                                    </div>
                                    <div class="col-sm-2 d-none d-sm-inline-block">
                                        <h6 class="card-title text-cap">Rate</h6>
                                    </div>
                                    <div class="col-sm-2 d-none d-sm-inline-block">
                                        <h6 class="card-title text-cap">Amount</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- End Title -->

                            <!-- Content -->
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control mb-3" placeholder="Item name" aria-label="Item name">
                                    <input type="text" class="form-control mb-3" placeholder="Description" aria-label="Description">
                                </div>

                                <div class="col-12 col-sm-auto col-md-3">
                                    <!-- Quantity Counter -->
                                    <div class="js-quantity-counter input-group-quantity-counter mb-3">
                                        <input type="number" class="js-result form-control input-group-quantity-counter-control" value="1">

                                        <div class="input-group-quantity-counter-toggle">
                                            <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                                <i class="tio-remove"></i>
                                            </a>
                                            <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                                <i class="tio-add"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Quantity Counter -->
                                </div>

                                <div class="col-12 col-sm col-md-2">
                                    <!-- Input Group -->
                                    <div class="mb-3">
                                        <input type="number" class="form-control" placeholder="00" aria-label="00">
                                    </div>
                                    <!-- End Input Group -->
                                </div>

                                <div class="col col-md-2">
                                    <input type="number" class="form-control-plaintext mb-3" placeholder="$0.00" aria-label="$0.00">
                                </div>
                            </div>
                            <!-- End Content -->

                            <!-- Container For Input Field -->
                            <div id="addInvoiceItemContainer"></div>

                            <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                <i class="tio-add"></i> Add item
                            </a>

                            <!-- Add Phone Input Field -->
                            <div id="addInvoiceItemTemplate" style="display: none;">
                                <!-- Content -->
                                <div class="input-group-add-field">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control mb-3" placeholder="Item name" aria-label="Item name">
                                            <input type="text" class="form-control mb-3" placeholder="Description" aria-label="Description">
                                        </div>

                                        <div class="col-12 col-sm-auto col-md-3">
                                            <!-- Quantity Counter -->
                                            <div class="js-quantity-counter input-group-quantity-counter mb-3">
                                                <input type="number" class="js-result form-control input-group-quantity-counter-control" value="1">

                                                <div class="input-group-quantity-counter-toggle">
                                                    <a class="js-minus btn btn-icon btn-xs btn-white rounded-circle" href="javascript:;">
                                                        <i class="tio-remove"></i>
                                                    </a>
                                                    <a class="js-plus btn btn-icon btn-xs btn-white rounded-circle" href="javascript:;">
                                                        <i class="tio-add"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Quantity Counter -->
                                        </div>

                                        <div class="col-12 col-sm col-md-2">
                                            <!-- Input Group -->
                                            <div class="mb-3">
                                                <input type="number" class="form-control" placeholder="00" aria-label="00">
                                            </div>
                                            <!-- End Input Group -->
                                        </div>

                                        <div class="col col-md-2">
                                            <input type="number" class="form-control-plaintext mb-3" placeholder="$0.00" aria-label="$0.00">
                                        </div>
                                    </div>
                                    <!-- End Row -->

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Remove item">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                                <!-- End Content -->
                            </div>
                            <!-- End Add Phone Input Field -->
                        </div>

                        <hr class="my-5">

                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-8 col-lg-7">
                                <dl class="row text-sm-right">
                                    <dt class="col-sm-6">Subtotal:</dt>
                                    <dd class="col-sm-6">$0.00</dd>
                                    <dt class="col-sm-6">Total:</dt>
                                    <dd class="col-sm-6">$0.00</dd>
                                    <dt class="col-sm-6 mb-1 mb-sm-0">Tax:</dt>
                                    <dd class="col-sm-6">
                                        <!-- Input Group -->
                                        <div class="select2-custom">
                                            <div id="taxSelect" class="input-group input-group-merge">
                                                <input type="number" class="form-control" placeholder="0.00" aria-label="0.00">
                                                <div class="input-group-append">
                                                    <!-- Select -->
                                                    <select class="js-select2-custom select2-custom-right custom-select" size="1" style="opacity: 0;"
                                                            data-hs-select2-options='{
                                                                "minimumResultsForSearch": "Infinity",
                                                                "dropdownAutoWidth": true,
                                                                "dropdownWidth": "9rem"
                                                              }'>
                                                        <option value="discount2Filter1">Flat ($)</option>
                                                        <option value="discount2Filter2" selected>Percent (%)</option>
                                                    </select>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input Group -->
                                    </dd>
                                    <dt class="col-sm-6 mb-1 mb-sm-0">Amount paid:</dt>
                                    <dd class="col-sm-6">
                                        <!-- Input Group -->
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-dollar-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" placeholder="0.00" aria-label="0.00">
                                        </div>
                                        <!-- End Input Group -->
                                    </dd>
                                    <dt class="col-sm-6">Due balance:</dt>
                                    <dd class="col-sm-6">$0.00</dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="invoiceNotesLabel" class="input-label">Notes &amp; terms</label>
                            <textarea class="form-control" placeholder="Who is this invoice to?" id="invoiceNotesLabel" aria-label="Who is this invoice to?" rows="3"></textarea>
                        </div>
                        <!-- End Form Group -->

                        <p class="font-size-sm mb-0">&copy; Front. 2020 Htmlstream.</p>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>

            <div id="stickyBlockStartPoint" class="col-lg-3">
                <div class="js-sticky-block"
                     data-hs-sticky-block-options='{
                   "parentSelector": "#stickyBlockStartPoint",
                   "breakpoint": "lg",
                   "startPoint": "#stickyBlockStartPoint",
                   "endPoint": "#stickyBlockEndPoint",
                   "stickyOffsetTop": 20
                 }'>
                    <a class="btn btn-block btn-primary mb-3" href="javascript:;">
                        <i class="tio-send mr-1"></i> Send invoice
                    </a>

                    <a class="btn btn-block btn-white mb-3" href="javascript:;">
                        <i class="tio-download-to mr-1"></i> Download
                    </a>

                    <div class="form-row">
                        <div class="col-sm mb-3 mb-sm-0">
                            <a class="btn btn-block btn-white" href="javascript:;">Preview</a>
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-block btn-white" href="javascript:;">Save</a>
                        </div>
                    </div>
                    <!-- End Row -->

                    <hr class="my-4">

                    <!-- Form Group -->
                    <div class="form-group">
                        <label for="currencyLabel" class="input-label">Currency</label>

                        <!-- Select -->
                        <select class="js-select2-custom custom-select" size="1" style="opacity: 0;" id="currencyLabel"
                                data-hs-select2-options='{
                          "minimumResultsForSearch": "Infinity",
                          "placeholder": "Select currency"
                        }'>
                            <option label="empty"></option>
                            <option value="currency1" selected data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Image description" width="16"/><span>USD (United States Dollar)</span></span>'>USD (United States Dollar)</option>
                            <option value="currency2" data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/gb.svg') }}" alt="Image description" width="16"/><span>GBP (United Kingdom Pound)</span></span>'>GBP (United Kingdom Pound)</option>
                            <option value="currency3" data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle mr-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/eu.svg') }}" alt="Image description" width="16"/><span>Euro (Euro Member Countries)</span></span>'>Euro (Euro Member Countries)</option>
                        </select>
                        <!-- End Select -->
                    </div>
                    <!-- End Form Group -->

                    <!-- Toggle Switch -->
                    <label class="row form-group toggle-switch" for="invoicePaymentTermsSwitch">
                        <span class="col-8 col-sm-9 toggle-switch-content ml-0">Payment terms</span>
                        <span class="col-4 col-sm-3">
                  <input type="checkbox" class="toggle-switch-input" id="invoicePaymentTermsSwitch" checked>
                  <span class="toggle-switch-label ml-auto">
                    <span class="toggle-switch-indicator"></span>
                  </span>
                </span>
                    </label>
                    <!-- End Toggle Switch -->

                    <!-- Toggle Switch -->
                    <label class="row form-group toggle-switch" for="invoiceClientNotesSwitch">
                        <span class="col-8 col-sm-9 toggle-switch-content ml-0">Client notes</span>
                        <span class="col-4 col-sm-3">
                  <input type="checkbox" class="toggle-switch-input" id="invoiceClientNotesSwitch" checked>
                  <span class="toggle-switch-label ml-auto">
                    <span class="toggle-switch-indicator"></span>
                  </span>
                </span>
                    </label>
                    <!-- End Toggle Switch -->

                    <!-- Toggle Switch -->
                    <label class="row form-group toggle-switch" for="invoiceAttachPDFSwitch">
                        <span class="col-8 col-sm-9 toggle-switch-content ml-0">Attach PDF in mail</span>
                        <span class="col-4 col-sm-3">
                  <input type="checkbox" class="toggle-switch-input" id="invoiceAttachPDFSwitch">
                  <span class="toggle-switch-label ml-auto">
                    <span class="toggle-switch-indicator"></span>
                  </span>
                </span>
                    </label>
                    <!-- End Toggle Switch -->
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection

@section('scripts')
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            $('.js-file-attach').each(function () {
                var customFile = new HSFileAttach($(this)).init();
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });


            // INITIALIZATION OF FLATPICKR
            // =======================================================
            $('.js-flatpickr').each(function () {
                $.HSCore.components.HSFlatpickr.init($(this));
            });


            // INITIALIZATION OF QUANTITY COUNTER
            // =======================================================
            $('.js-quantity-counter').each(function () {
                var quantityCounter = new HSQuantityCounter($(this)).init();
            });


            // INITIALIZATION OF ADD INPUT FILED
            // =======================================================
            $('.js-add-field').each(function () {
                new HSAddField($(this), {
                    addedField: function() {
                        $('.js-add-field .js-select2-custom-dynamic').each(function () {
                            var select2dynamic = $.HSCore.components.HSSelect2.init($(this));
                        });
                    }
                }).init();
            });
        });
    </script>
@endsection
