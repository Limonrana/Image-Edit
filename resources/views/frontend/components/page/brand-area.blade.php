<div class="brand-area pt-100 pb-100">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-12">
                <div class="swiper-container brand-active">
                    <div class="swiper-wrapper">
                        @foreach($brands as $br) {{-- Start Foreach --}}
                            <div class="swiper-slide">
                            <div class="single-brand">
                                <a href="javascript:;"><img src="{{ asset($br->image->path) }}" alt="{{ $br->name }}"></a>
                                <a href="javascript:;"><img src="{{ asset($br->image->path) }}" alt="{{ $br->name }}"></a>
                            </div>
                        </div>
                        @endforeach {{-- End Foreach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
