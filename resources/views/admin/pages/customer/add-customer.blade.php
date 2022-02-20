@extends('admin.layout.layout')

@section('title', 'Add New Customer - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('customers.index') }}">Customers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new customer</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Add New Customer</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Step Form -->
            <form class="js-step-form js-validate py-md-5"
                  data-hs-step-form-options='{
                    "progressSelector": "#validationFormProgress",
                    "stepsSelector": "#validationFormContent",
                    "endSelector": "#validationFormFinishBtn",
                    "isValidate": true
                  }' action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <!-- Step -->
                        <ul id="validationFormProgress" class="js-step-progress step step-sm step-icon-sm step-inline step-item-between mb-7">
                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;"
                                   data-hs-step-form-next-options='{
                                      "targetSelector": "#validationFormAccount"
                                    }'>
                                    <span class="step-icon step-icon-soft-dark">1</span>
                                    <div class="step-content">
                                        <span class="step-title">Account</span>
                                    </div>
                                </a>
                            </li>

                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;"
                                   data-hs-step-form-next-options='{
                                       "targetSelector": "#validationFormProfile"
                                     }'>
                                    <span class="step-icon step-icon-soft-dark">2</span>
                                    <div class="step-content">
                                        <span class="step-title">Profile</span>
                                    </div>
                                </a>
                            </li>

                            <li class="step-item">
                                <a class="step-content-wrapper" href="javascript:;"
                                   data-hs-step-form-next-options='{
                                       "targetSelector": "#validationFormAddress"
                                     }'>
                                    <span class="step-icon step-icon-soft-dark">3</span>
                                    <div class="step-content">
                                        <span class="step-title">Address</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End Step -->

                        <!-- Content Step Form -->
                        <div id="validationFormContent">
                            <div id="validationFormAccount" class="card card-lg active">
                                <div class="card-body">
                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormEmailLabel" class="col-sm-3 col-form-label input-label">Email Address</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="validationFormEmailLabel" placeholder="Email Address" aria-label="Email Address" required data-msg="Please enter your email address." value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormPhoneLabel" class="col-sm-3 col-form-label input-label">Phone number</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <div class="input-group input-group-sm-down-break align-items-center">
                                                    <input type="text" class="js-masked-input form-control @error('phone') is-invalid @enderror" name="phone" id="validationFormPhoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="{{ old('phone') }}"
                                                           data-hs-mask-options='{
                                                              "template": "+0(000)000-00-00"
                                                           }' required data-msg="Please enter your valid phone number.">
                                                    @error('phone')
                                                        <div class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormNewPasswordLabel" class="col-sm-3 col-form-label input-label">New password</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationFormNewPasswordLabel" placeholder="New password" aria-label="New password" required data-msg="Your password is invalid. Please try again.">
                                                @error('password')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormCurrentPasswordLabel" class="col-sm-3 col-form-label input-label">Confirm password</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" id="validationFormCurrentPasswordLabel" placeholder="Current password" aria-label="Current password" required data-msg="Password does not match the confirm password.">
                                                @error('confirmPassword')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <!-- Footer -->
                                <div class="card-footer d-flex align-items-center">
                                    <div class="ml-auto">
                                        <button type="button" class="btn btn-primary"
                                                data-hs-step-form-next-options='{
                                                    "targetSelector": "#validationFormProfile"
                                                }'>
                                            Next <i class="tio-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Footer -->
                             </div>

                            <div id="validationFormProfile" class="card card-lg" style="display: none;">
                                <div class="card-body">
                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label class="col-sm-3 col-form-label input-label">Avatar</label>

                                        <div class="col-sm-9">
                                            <div class="d-flex align-items-center">
                                                <!-- Avatar -->
                                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                                    <img id="avatarImg" class="avatar-img" src="{{ asset('assets/img/160x160/img1.jpg') }}" alt="Image Description">

                                                    <input type="file" class="js-file-attach avatar-uploader-input" id="avatarUploader"
                                                           data-hs-file-attach-options='{
                                                                              "textTarget": "#avatarImg",
                                                                              "mode": "image",
                                                                              "targetAttr": "src",
                                                                              "resetTarget": ".js-file-attach-reset-img",
                                                                              "resetImg": "{{ asset('assets/img/160x160/img1.jpg') }}",
                                                                              "allowTypes": [".png", ".jpeg", ".jpg"]
                                                                           }' name="avatar" value="{{ old('avatar') }}">

                                                    <span class="avatar-uploader-trigger">
                                                          <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                                    </span>
                                                </label>
                                                <!-- End Avatar -->

                                                <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                            </div>
                                            @error('avatar')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormFirstNameLabel" class="col-sm-3 col-form-label input-label">First name</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="validationFormFirstNameLabel" placeholder="First name" aria-label="First name" required data-msg="Please enter your first name." value="{{ old('firstName') }}">
                                                @error('firstName')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormLastNameLabel" class="col-sm-3 col-form-label input-label">Last name</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="validationFormLastNameLabel" placeholder="Last name" aria-label="Last name" required data-msg="Please enter your last name." value="{{ old('lastName') }}">
                                                @error('lastName')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <!-- Footer -->
                                <div class="card-footer d-flex align-items-center">
                                    <button type="button" class="btn btn-ghost-secondary mr-2"
                                            data-hs-step-form-prev-options='{
                                             "targetSelector": "#validationFormAccount"
                                           }'>
                                        <i class="tio-chevron-left"></i> Previous step
                                    </button>

                                    <div class="ml-auto">
                                        <button type="button" class="btn btn-primary"
                                                data-hs-step-form-next-options='{
                                                    "targetSelector": "#validationFormAddress"
                                                  }'>
                                            Next <i class="tio-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>

                            <div id="validationFormAddress" class="card card-lg" style="display: none;">
                                <div class="card-body">
                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="locationLabel" class="col-sm-3 col-form-label input-label">Location</label>

                                        <div class="col-sm-9">
                                            <!-- Select -->
                                            <div class="mb-3">
                                                <div class="js-form-message">
                                                    <select class="js-select2-custom custom-select" size="1" style="opacity: 0;" id="locationLabel"
                                                            data-hs-select2-options='{
                                                                "placeholder": "Select country",
                                                                "searchInputPlaceholder": "Search a country"
                                                            }' name="country" aria-label="Country name" required data-msg="Please select your country name.">
                                                        <option label="empty"></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}" @if(old('country') === $country->id) selected @endif>
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                        <div class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Select -->

                                            <div class="js-form-message">
                                                <select class="js-select2-custom custom-select" name="state" required size="1" style="opacity: 0;" id="editLocationModalState"
                                                        data-hs-select2-options='{
                                                        "customClass": "custom-select",
                                                        "placeholder": "Select state",
                                                        "searchInputPlaceholder": "Search a state"
                                                    }' data-msg="Please select your state name.">
                                                    <option label="empty"></option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" @if(old('state') == $state->id) selected @endif>
                                                            {{ $state->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('state')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="js-form-message">
                                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="cityLabel" placeholder="City" aria-label="City" data-msg="Please select your city name." value="{{ old('city') }}">
                                                    @error('city')
                                                        <div class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormAddress1Label" class="col-sm-3 col-form-label input-label">Address 1</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" id="validationFormAddress1Label" placeholder="Address 1" aria-label="Address 1" data-msg="Please enter your address." value="{{ old('address1') }}">
                                                @error('address1')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="validationFormAddress2Label" class="col-sm-3 col-form-label input-label">Address 2 <span class="input-label-secondary">(Optional)</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address2" id="validationFormAddress2Label" placeholder="Address 2" aria-label="Address 2" value="{{ old('address1') }}">
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row">
                                        <label for="zipCodeLabel" class="col-sm-3 col-form-label input-label">Zip code <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="text" class="js-masked-input form-control @error('zipCode') is-invalid @enderror" name="zipCode" id="zipCodeLabel" placeholder="Your zip code" aria-label="Your zip code"
                                                       data-hs-mask-options='{
                                                         "template": "000000"
                                                       }' data-msg="Please select your zip code." value="{{ old('zipCode') }}">
                                                @error('zipCode')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <!-- Footer -->
                                <div class="card-footer d-flex align-items-center">
                                    <button type="button" class="btn btn-ghost-secondary mb-3 mb-sm-0 mr-2"
                                            data-hs-step-form-prev-options='{
                                             "targetSelector": "#validationFormProfile"
                                           }'>
                                        <i class="tio-chevron-left"></i> Previous step
                                    </button>

                                    <div class="d-flex justify-content-end ml-auto">
                                        <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>
                        </div>
                        <!-- End Content Step Form -->
                    </div>
                </div>
            </form>
            <!-- End Step Form -->


        </div>
        <!-- End Content -->
    </div>
    <!-- End Content -->

@endsection

@section('script')
    <script>
        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function() {
            $.HSCore.components.HSValidation.init($(this));
        });


        // INITIALIZATION OF STEP FORM
        // =======================================================
        $('.js-step-form').each(function () {
            var stepForm = new HSStepForm($(this), {
                finish: function() {
                    $("#validationFormProgress").hide();
                    $("#validationFormContent").hide();
                    $("#validationFormSuccessMessage").show();
                }
            }).init();
        });

        // INITIALIZATION OF MASKED INPUT
        // =======================================================
        $('.js-masked-input').each(function () {
            var mask = $.HSCore.components.HSMask.init($(this));
        });

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
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

        // $('#title').keyup(function () {
        //     $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        //     $('#meta_title').val($(this).val());
        // });

    </script>
@endsection
