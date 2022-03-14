@extends('admin.layout.layout')

@section('title', 'Edit User - Car Image Editing')

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">
                <!-- Profile Cover -->
                <div class="profile-cover">
                    <div class="profile-cover-img-wrapper">
                        <img id="profileCoverImg" class="profile-cover-img" src="{{ asset('assets/img/1920x400/img2.jpg') }}" alt="{{$user->name}}-cover">
                    </div>
                </div>
                <!-- End Profile Cover -->

                <!-- Profile Header -->
                <div class="text-center mb-5">
                    <!-- Avatar -->
                    <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar" for="avatarUploader">
                        <img id="avatarImg" class="avatar-img" src="{{$user->profile_photo_path ? asset($user->image->path) : 'https://ui-avatars.com/api/?name='.$user->name.'&color=7F9CF5&background=EBF4FF' }}" alt="{{$user->name}}">
                    </label>
                    <!-- End Avatar -->

                    <h1 class="page-header-title">{{$user->name}} <i class="tio-verified tio-lg text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h1>

                    <!-- List -->
                    <ul class="list-inline list-inline-m-1">
                        <li class="list-inline-item">
                            <i class="tio-city mr-1"></i>
                            <span>{{ env('APP_NAME') }} Ltd.</span>
                        </li>

                        <li class="list-inline-item">
                            <i class="tio-date-range mr-1"></i>
                            <span>Joined {{ $user->created_at->format('M Y')}}</span>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>
                <!-- End Profile Header -->

                <!-- Nav -->
                <div class="mb-5">

                    <ul class="nav align-items-center">
                        <li class="nav-item ml-auto">
                            <a class="btn btn-sm btn-white mr-2" href="{{ route('users.edit', $user->id) }}">
                                <i class="tio-edit mr-1"></i> Edit profile
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <div class="row">
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h2 class="card-header-title h5">Profile</h2>

                                <a class="btn btn-sm btn-white" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
                                    <li class="py-0">
                                        <small class="card-subtitle">About</small>
                                    </li>

                                    <li>
                                        <i class="tio-user-outlined nav-icon"></i>
                                        {{$user->name}}
                                    </li>
                                    <li>
                                        <i class="tio-briefcase-outlined nav-icon"></i>
                                        {{$user->is_admin ? 'Super Admin' : 'Admin'}}
                                    </li>
                                    <li>
                                        <i class="tio-city nav-icon"></i>
                                        {{ env('APP_NAME') }} Ltd.
                                    </li>

                                    <li class="pt-2 pb-0">
                                        <small class="card-subtitle">Contacts</small>
                                    </li>

                                    <li>
                                        <i class="tio-online nav-icon"></i>
                                        {{ $user->email }}
                                    </li>
                                </ul>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card card-lg mb-3 mb-lg-5">
                            <!-- Body -->
                            <div class="card-body text-center">
                                <div class="w-50 mx-auto mb-4">
                                    <img class="img-fluid" src="{{ asset('assets/svg/illustrations/unlock.svg') }}" alt="Image Description">
                                </div>

                                <div class="mb-3">
                                    <h3>Role & Permission Management</h3>
                                    <p>Protect your application menu now and enable Roles & Permission in the settings.</p>
                                </div>

                                <a class="btn btn-primary" href="javascript:;">COMMING SOON</a>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>

                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h2 class="card-header-title h5">Activity stream</h2>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body card-body-height card-body-centered">
                                <img class="avatar avatar-xxl mb-3" src="{{ asset('assets/svg/illustrations/yelling.svg') }}" alt="Image Description">
                                <p class="card-text">No data to show</p>
                                <a class="btn btn-sm btn-white" href="javascript:;">Start your Activity</a>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h2 class="card-header-title h5">Projects</h2>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body card-body-height card-body-centered">
                                <img class="avatar avatar-xxl mb-3" src="{{ asset('assets/svg/illustrations/yelling.svg') }}" alt="Image Description">
                                <p class="card-text">No data to show</p>
                                <a class="btn btn-sm btn-white" href="javascript:;">Start your Projects</a>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
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

        // INITIALIZATION OF LEAFLET
        // =======================================================
        $('#map').each(function () {
            var leaflet = $.HSCore.components.HSLeaflet.init($(this)[0]);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                id: 'mapbox/light-v9'
            }).addTo(leaflet);
        });

    </script>
@endsection
