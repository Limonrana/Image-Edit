<div class="col-lg-4">
    <div class="blog-sidebar">
        <div class="bs-widget mb-30 sidebar-search">
            <form class="search-form" action="{{ route('store.blogs') }}" method="GET">
                <div class="search-input-field bss">
                    <input type="text" name="search" placeholder="Search Keywords">
                    <button type="submit"><i class="far fa-search"></i>Search</button>
                </div>
            </form>
        </div>
        <div class="bs-widget mb-30">
            <div class="bs-widget-title mb-40">
                <h5>Categories</h5>
            </div>
            <ul class="bs-category-list">
                @if (count($categories) > 0)
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('store.blogs', ['category' => $category->slug, 'cid' => $category->id ]) }}">
                                <p>{{ $category->name }}</p><span>({{ count($category->posts) }})</span>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li>
                        <p>OOPS! Category is empty!</p>
                    </li>
                @endif
            </ul>
        </div>
        <div class="bs-widget mb-30">
            <div class="bs-widget-title mb-40">
                <h5>Recent Posts</h5>
            </div>
            <ul class="bs-post">
                @if (count($recent_blogs) > 0)
                    @foreach($recent_blogs as $recent_blog)
                        <li class="bs-post-single">
                            <div class="bs-post-img">
                                <a href="{{ route('store.blog.show', $recent_blog->slug) }}">
                                    <img src="{{ asset($recent_blog->image->path) }}" alt="{{ $recent_blog->title }}">
                                </a>
                            </div>
                            <div class="bs-post-content">
                                <h6><a href="{{ route('store.blog.show', $recent_blog->slug) }}">{{ $recent_blog->title }}</a></h6>
                                <span>{{ $recent_blog->created_at->format('d M Y') }} </span>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class="bs-post-single">
                        <div class="bs-post-content">
                            <h6>OOPS! Recent post is empty!</h6>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <div class="bs-widget mb-30 widget-tag">
            <div class="bs-widget-title mb-40">
                <h5>Popular Tags</h5>
            </div>
            <ul class="bs-tags">
                @if (count($tags) > 0)
                    @foreach($tags as $tag)
                        <li><a class="grb-tag" href="{{ route('store.blogs', ['tag' => $tag->slug, 'tid' => $tag->id ]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                @else
                    <li>
                        <p>OOPS! Tag is empty!</p>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
