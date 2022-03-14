<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Email Setting Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('settings.email.update') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="mail_host">SMTP Host</label>
                        <input type="text" id="mail_host" class="form-control @error('mail_host') is-invalid @enderror" name="mail_host" placeholder="eg. smtp.gmail.com" value="{{ $settings !== null && isset($settings->mail_host) ? $settings->mail_host : env('MAIL_HOST') }}" required />
                        @error('mail_host')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="input-label" for="mail_mailer">SMTP Mailer</label>
                        <input type="text" id="mail_mailer" class="form-control @error('mail_mailer') is-invalid @enderror" name="mail_mailer" placeholder="eg. smtp" value="{{ $settings !== null && isset($settings->mail_mailer) ? $settings->mail_mailer : env('MAIL_MAILER', null) }}" required />
                        @error('mail_mailer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="input-label" for="mail_port">SMTP Port</label>
                        <input type="text" id="mail_port" class="form-control @error('mail_port') is-invalid @enderror" name="mail_port" placeholder="eg. 587" value="{{ $settings !== null && isset($settings->mail_port) ? $settings->mail_port : env('MAIL_PORT', null) }}" required />
                        @error('mail_port')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="mail_username">SMTP UserName</label>
                        <input type="text" id="mail_username" class="form-control @error('mail_username') is-invalid @enderror" name="mail_username" placeholder="eg. admin@example.com" value="{{ $settings !== null && isset($settings->mail_username) ? $settings->mail_username : env('MAIL_USERNAME', null) }}" required />
                        @error('mail_username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="mail_password">SMTP Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="mail_password" class="js-toggle-password form-control @error('mail_password') is-invalid @enderror" name="mail_password" placeholder="eg. *********" value="{{ $settings !== null && isset($settings->mail_password) ? $settings->mail_password : env('MAIL_PASSWORD', null) }}"
                                   data-hs-toggle-password-options='{
                                   "target": "#ChangePassTarget",
                                   "defaultClass": "tio-hidden-outlined",
                                   "showClass": "tio-visible-outlined",
                                   "classChangeTarget": "#ChangePassIcon"
                                 }' required />
                            <div id="ChangePassTarget" class="input-group-append">
                                <a class="input-group-text" href="javascript:;">
                                    <i id="ChangePassIcon" class="tio-visible-outlined"></i>
                                </a>
                            </div>
                        </div>
                        @error('mail_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="mail_from_address">Email From Address</label>
                        <input type="email" id="mail_from_address" class="form-control @error('mail_from_address') is-invalid @enderror" name="mail_from_address" placeholder="eg. admin@example.com" value="{{ $settings !== null && isset($settings->mail_from_address) ? $settings->mail_from_address : env('MAIL_FROM_ADDRESS', null) }}" required />
                        @error('mail_from_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="input-label" for="mail_from_name">Email From Name</label>
                        <input type="text" id="mail_from_name" class="form-control @error('mail_from_name') is-invalid @enderror" name="mail_from_name" placeholder="eg. Car Image Editing" value="{{ $settings !== null && isset($settings->mail_from_name) ? $settings->mail_from_name : env('MAIL_FROM_NAME', null) }}" required />
                        @error('mail_from_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
