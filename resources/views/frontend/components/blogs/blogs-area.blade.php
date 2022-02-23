<div class="col-lg-8">
    <div class="blog-main">
        @if(count($blogs) > 0)
            @foreach($blogs as $blog)
                <div class="blog-main-single mb-60">
                    <div class="bms-img mb-30">
                        <a href="{{ route('store.blog.show', $blog->slug) }}"><img src="{{ asset($blog->image->path) }}" alt="{{ $blog->title }}"></a>
                    </div>
                    <div class="bms-content">
                        <div class="fix mb-30">
                            <div class="blog-date bms-date">
                                <i class="fal fa-calendar-alt"></i>
                                <span>{{ $blog->created_at->format('d') }}</span>
                                <p>{{ $blog->created_at->format('M Y') }}</p>
                            </div>
                            <div class="bms-title">
                                <ul class="project-like-view bms-lv">
                                    <li><a href="{{ route('store.blog.show', $blog->slug) }}"><i
                                                class="fas fa-folder-open"></i>{{ $blog->category->name }}</a></li>
                                    <li><i class="fas fa-comments-alt"></i>45
                                        Comments</li>
                                    <li><a href="{{ route('store.blog.show', $blog->slug) }}"><i class="fas fa-eye"></i>{{ $blog->views }} Views</a>
                                    </li>
                                </ul>
                                <h4><a href="{{ route('store.blog.show', $blog->slug) }}">{{ $blog->title }}</a></h4>
                            </div>
                        </div>
                        <p>{!! \Illuminate\Support\Str::limit($blog->description, 350) !!}</p>
                        <div class="bms-btn mt-45">
                            <a href="{{ route('store.blog.show', $blog->slug) }}" class="grb-border-btn st-1">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @include('frontend.components.common.empty-state')
        @endif
    </div>
    <div class="blog-paginate">
        {{ $blogs->links() }}
    </div>
</div>
