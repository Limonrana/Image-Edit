@extends('admin.layout.layout')

@section('title', 'Admin Login - Car Image Editing')

@section('content')
    <div class="position-fixed top-0 right-0 left-0 bg-img-hero" style="height: 32rem; background-image: url({{ asset('assets/svg/components/abstract-bg-4.svg') }});">
        <!-- SVG Bottom Shape -->
        <figure class="position-absolute right-0 bottom-0 left-0">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                <polygon fill="#fff" points="0,273 1921,273 1921,0 "/>
            </svg>
        </figure>
        <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-10 py-sm-10">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <!-- Card -->
                <div class="card card-lg mb-5">
                    <div class="card-body">
                        <!-- Form -->
                        <form class="js-validate" action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="text-center">
                                <div class="mb-5">
                                    <h1 class="display-4">Admin Login</h1>
                                </div>
                            </div>

                            @error('email')
                                <div class="alert alert-soft-danger text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                            @error('password')
                                <div class="alert alert-soft-danger text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                             @enderror

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="email">Your email</label>
                                <input type="email" name="email" id="email" placeholder="email@address.com" value="{{ $email ? $email : old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror " required />
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="password" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                      Password
                                      <a class="input-label-secondary" href="{{ route('admin.password.request') }}">Forgot Password?</a>
                                    </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg @error('email') is-invalid @enderror " name="password" id="signupSrPassword" value="{{ $password }}" placeholder="8+ characters required" aria-label="8+ characters required" required
                                           data-msg="Your password is invalid. Please try again."
                                           data-hs-toggle-password-options='{
                                             "target": "#changePassTarget",
                                             "defaultClass": "tio-hidden-outlined",
                                             "showClass": "tio-visible-outlined",
                                             "classChangeTarget": "#changePassIcon"
                                           }'>
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:;">
                                            <i id="changePassIcon" class="tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="termsCheckbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label font-size-sm text-muted" for="termsCheckbox"> Remember me</label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->

                <!-- Footer -->
                <div class="text-center">
                    <small class="text-cap mb-4">Trusted by the world's best teams</small>

                    <div class="w-85 mx-auto">
                        <div class="row justify-content-between">
                            <div class="col">
                                <img src="{{ asset('assets/svg/brands/gitlab-gray.svg') }}" class="img-fluid" alt="Image Description">
                            </div>
                            <div class="col">
                                <img src="{{ asset('assets/svg/brands/fitbit-gray.svg') }}" class="img-fluid" alt="Image Description">
                            </div>
                            <div class="col">
                                <img src="{{ asset('assets/svg/brands/flow-xo-gray.svg') }}" class="img-fluid" alt="Image Description">
                            </div>
                            <div class="col">
                                <img src="{{ asset('assets/svg/brands/layar-gray.svg') }}" class="img-fluid" alt="Image Description">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF SHOW PASSWORD
            // =======================================================
            $('.js-toggle-password').each(function () {
                new HSTogglePassword(this).init()
            });


            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this));
            });
        });
    </script>
@endsection
