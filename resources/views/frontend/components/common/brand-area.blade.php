<div class="brand-area pt-100 pb-100">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-12">
                <div class="swiper-container brand-active">
                    <div class="swiper-wrapper">
                        @foreach($brands as $brand)
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a><img src="{{ asset($brand->image->path) }}" alt="{{ $brand->name }}"></a>
                                    <a><img src="{{ asset($brand->image->path) }}" alt="{{ $brand->name }}"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
