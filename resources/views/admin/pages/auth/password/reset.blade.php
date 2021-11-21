@extends('admin.layout.layout')

@section('title', 'Rest password | E-commerce Store')

@section('content')
    <div class="container">
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
        <div class="container py-5 py-sm-7">
            <a class="d-flex justify-content-center mb-5" href="{{ route('admin.dashboard') }}">
                <img class="z-index-2" src="{{ asset('assets/svg/logos/logo.svg') }}" alt="Image Description" style="width: 8rem;">
            </a>

            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <!-- Card -->
                    <div class="card card-lg mb-5">
                        <div class="card-body">
                            <!-- Form -->
                            <form class="js-validate" method="POST" action="{{ route('admin.password.update') }}">
                                @csrf
                                <div class="text-center">
                                    <div class="mb-5">
                                        <h1 class="display-4">Set new password</h1>
                                        <p>Enter the new password, so that reset your password.</p>
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
                                @error('password_confirmation')
                                    <div class="alert alert-soft-danger text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @if (session('status'))
                                    <div class="alert alert-soft-success text-center" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <input type="hidden" name="token" value="{{ $token }}">

                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="input-label" for="email" tabindex="0">Your email</label>
                                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ $email ?? old('email') }}" placeholder="Enter your email address" required>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="input-label" for="password" tabindex="0">New Password</label>
                                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your new password" required autofocus>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="input-label" for="password_confirmation" tabindex="0">Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required autofocus>
                                </div>
                                <!-- End Form Group -->

                                <button type="submit" class="btn btn-lg btn-block btn-primary">Set password</button>

                                <div class="text-center mt-2">
                                    <a class="btn btn-link" href="{{ route('admin.login.form') }}">
                                        <i class="tio-chevron-left"></i> Back to Sign in
                                    </a>
                                </div>
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
                                    <img class="img-fluid" src="{{ asset('assets/svg/brands/gitlab-gray.svg') }}" alt="Image Description">
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="{{ asset('assets/svg/brands/fitbit-gray.svg') }}" alt="Image Description">
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="{{ asset('assets/svg/brands/flow-xo-gray.svg') }}" alt="Image Description">
                                </div>
                                <div class="col">
                                    <img class="img-fluid" src="{{ asset('assets/svg/brands/layar-gray.svg') }}" alt="Image Description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
@endsection
