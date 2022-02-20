@php
    $page_bg_image = null;
    if (appearance('theme-option')) {
        if (array_key_exists('page_bg_image', json_decode(appearance('footer')->option_value, true))) {
            $logo_id = json_decode(appearance('footer')->option_value, true)['page_bg_image'];
            $upload = \App\Models\Upload::find($logo_id);
            if (isset($upload) OR count($upload) > 0) {
                $page_bg_image = $upload->path;
            }
        }
    }
@endphp

<section class="page-title-area" data-background="{{ asset($page_bg_image ? $page_bg_image : 'img/bg/page-title-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <div class="page-title-heading">
                        <h1>Contact Us</h1>
                    </div>
                    <nav class="grb-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
