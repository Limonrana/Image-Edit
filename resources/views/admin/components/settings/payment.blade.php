<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Payment Method Setup Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('settings.payment.update') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <span class="divider">Paypal Setup</span>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="paypal_email">Paypal Email</label>
                        <input type="text" id="paypal_email" class="form-control @error('paypal_email') is-invalid @enderror" name="paypal_email" placeholder="eg. email@example.com" value="{{ $settings !== null && isset($settings->paypal_email) ? $settings->paypal_email : env('PAYPAL_EMAIL', null) }}" required />
                        @error('paypal_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="paypal_client_id">Paypal Client IDD</label>
                        <input type="text" id="paypal_client_id" class="form-control @error('paypal_client_id') is-invalid @enderror" name="paypal_client_id" placeholder="eg. sfr33f34f343_fr34rf3f34" value="{{ $settings !== null && isset($settings->paypal_client_id) ? $settings->paypal_client_id : env('PAYPAL_CLIENT_ID', null) }}" required />
                        @error('paypal_client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Stripe Setup</span>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="stripe_key">Stripe API Key</label>
                        <input type="text" id="stripe_key" class="form-control @error('stripe_key') is-invalid @enderror" name="stripe_key" placeholder="eg. pk_test_yLs7aj48caHjjruntvFqPMMF00yAa5Xg" value="{{ $settings !== null && isset($settings->stripe_key) ? $settings->stripe_key : env('STRIPE_KEY', null) }}" />
                        @error('stripe_key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="stripe_secret">Stripe API Secret</label>
                        <input type="text" id="stripe_secret" class="form-control @error('stripe_secret') is-invalid @enderror" name="stripe_secret" placeholder="eg. sk_test_qnnna5ure3rdKoNmR486tiMH00fzxw2" value="{{ $settings !== null && isset($settings->stripe_secret) ? $settings->stripe_secret : env('STRIPE_SECRET', null) }}" />
                        @error('stripe_secret')
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
