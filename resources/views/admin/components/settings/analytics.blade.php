<div class="card mb-3 mb-lg-5">
    <div class="card-header">
        <h2 class="card-title h4">Analytics Tools Section</h2>
    </div>

    <!-- Body -->
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('settings.analytics.update') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <span class="divider">Google Analytics (Script Code)</span>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="google_analytics">Analytics Code (SCRIPT CODE ONLY)</label>
                        <textarea class="form-control form-control-light form-control-hover-light @error('meta_content') is-invalid @enderror" name="google_analytics" id="google_analytics" placeholder="NOTE: Content must be Script Code" rows="6"
                            >{{ $settings !== null && isset($settings->google_analytics) ? $settings->google_analytics : null }}</textarea>
                        @error('google_analytics')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <span class="divider">Bing Analytics (Script Code)</span>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label" for="bing_analytics">Bing Code (SCRIPT CODE ONLY)</label>
                        <textarea class="form-control form-control-light form-control-hover-light @error('meta_content') is-invalid @enderror" name="bing_analytics" id="bing_analytics" placeholder="NOTE: Content must be Script Code" rows="6"
                        >{{ $settings !== null && isset($settings->bing_analytics) ? $settings->bing_analytics : null }}</textarea>
                        @error('bing_analytics')
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
