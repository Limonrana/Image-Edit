<section class="page-title-area" data-background="{{ asset($page_bg_image ? $page_bg_image : 'img/bg/page-title-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <div class="page-title-heading">
                        <h1>{{ $page->title }}</h1>
                    </div>
                    <nav class="grb-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
