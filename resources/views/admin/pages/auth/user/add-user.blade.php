@extends('admin.layout.layout')

@section('title', 'Add New User - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new User</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Add New User</h1>
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
                  }' action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationFormCurrentPasswordLabel" placeholder="Current password" aria-label="Current password" required data-msg="Password does not match the confirm password.">
                                                @error('password_confirmation')
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
                                        <label for="validationFormFirstNameLabel" class="col-sm-3 col-form-label input-label">Full name</label>

                                        <div class="col-sm-9">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="validationFormFirstNameLabel" placeholder="Full name" aria-label="Full name" required data-msg="Please enter your full name." value="{{ old('name') }}">
                                                @error('name')
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
                                             "targetSelector": "#validationFormAccount"
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
