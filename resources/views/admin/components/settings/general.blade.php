<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">General Setting Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('settings.general.update') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="app_name">Site Title</label>
                        <input type="text" id="app_name" class="form-control @error('app_name') is-invalid @enderror" name="app_name" placeholder="eg. Car Image Edit" value="{{ $settings !== null && isset($settings->app_name) ? $settings->app_name : env('APP_NAME', null) }}" required />
                        @error('app_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="app_tagline">Site Tagline</label>
                        <input type="text" id="app_tagline" class="form-control @error('app_tagline') is-invalid @enderror" name="app_tagline" placeholder="eg. Our best platform" value="{{ $settings !== null && isset($settings->app_tagline) ? $settings->app_tagline : env('APP_TAGLINE', null) }}" required />
                        @error('app_tagline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="app_url">Site Address (URL) (Required)</label>
                        <input type="text" id="app_url" class="form-control @error('app_url') is-invalid @enderror" name="app_url" placeholder="eg. https://example.com" value="{{ $settings !== null && isset($settings->app_url) ? $settings->app_url : env('APP_URL') }}" required />
                        @error('app_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="app_admin_email">Admin Email Address (Required)</label>
                        <input type="text" id="app_admin_email" class="form-control @error('app_admin_email') is-invalid @enderror" name="app_admin_email" placeholder="eg. admin@example.com" value="{{ $settings !== null && isset($settings->app_admin_email) ? $settings->app_admin_email : env('APP_ADMIN_EMAIL', null) }}" required />
                        @error('app_admin_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Pusher Settings (Live Chat)</span>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="pusher_app_id">Pusher App Id</label>
                        <input type="text" id="pusher_app_id" class="form-control @error('pusher_app_id') is-invalid @enderror" name="pusher_app_id" placeholder="eg. fg45g54gt54g4" value="{{ $settings !== null && isset($settings->pusher_app_id) ? $settings->pusher_app_id : env('PUSHER_APP_ID', null) }}" />
                        @error('pusher_app_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="pusher_app_key">Pusher App Key</label>
                        <input type="text" id="pusher_app_key" class="form-control @error('pusher_app_key') is-invalid @enderror" name="pusher_app_key" placeholder="eg. 3424232432" value="{{ $settings !== null && isset($settings->pusher_app_key) ? $settings->pusher_app_key : env('PUSHER_APP_KEY', null) }}" />
                        @error('pusher_app_key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="pusher_app_secret">Pusher App Secret</label>
                        <input type="text" id="pusher_app_secret" class="form-control @error('pusher_app_secret') is-invalid @enderror" name="pusher_app_secret" placeholder="eg. gfghds665sdf67f5675fs76" value="{{ $settings !== null && isset($settings->pusher_app_secret) ? $settings->pusher_app_secret : env('PUSHER_APP_SECRET', null) }}" />
                        @error('pusher_app_secret')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="pusher_app_cluster">Pusher App Cluster</label>
                        <input type="text" id="pusher_app_cluster" class="form-control @error('pusher_app_cluster') is-invalid @enderror" name="pusher_app_cluster" placeholder="eg. mt1" value="{{ $settings !== null && isset($settings->pusher_app_cluster) ? $settings->pusher_app_cluster : env('PUSHER_APP_CLUSTER', 'mt1') }}" />
                        @error('pusher_app_cluster')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Other Core Settings</span>
                </div>
                <div class="col-12">
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Application Mode</label>
                        <div class="col-sm-9">
                            <div class="js-form-message input-group input-group-sm-down-break">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="app_env" id="app_env_dev" value="local" @if ($settings !== null && $settings->app_env && $settings->app_env === 'local') checked @elseif (env('APP_ENV') == 'local') checked @endif>
                                        <label class="custom-control-label" for="app_env_dev">Development</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="app_env" id="app_env_prod" value="production" @if ($settings !== null && $settings->app_env && $settings->app_env === 'production') checked @elseif (env('APP_ENV') == 'production') checked @endif>
                                        <label class="custom-control-label" for="app_env_prod">Production</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                </div>
                <div class="col-12">
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Application Debug Mode</label>
                        <div class="col-sm-9">
                            <div class="js-form-message input-group input-group-sm-down-break">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="app_debug" id="app_debug_true" value="true" @if (env('APP_DEBUG')) checked @endif>
                                        <label class="custom-control-label" for="app_debug_true">Enable</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="app_debug" id="app_debug_false" value="false" @if (!env('APP_DEBUG')) checked @endif>
                                        <label class="custom-control-label" for="app_debug_false">Disable</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
    <!-- End Body -->
</div>
