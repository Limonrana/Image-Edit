@if(count($related_projects) > 0)
    <section class="related-shots-area">
    <div class="container">
        <div class="related-shots-inner">
            <h3>Related Shots</h3>
        </div>
        <div class="row wow fadeInUp portfolio-main-items">
            @foreach($related_projects as $project)
                <div class="col-lg-4 col-sm-6 grid-item c-2 c-4 c-3">
                    <div class="portfolio-item mb-30">
                        <div class="portfolio-item-img p-relative">
                            <img src="{{ asset($project->featured_image->path) }}" alt="{{ $project->title }}">
                            <div class="portfolio-hover-contnet">
                                <div class="portfolio-hover-inner text-center">
                                    <a class="p-h-icon pm-s" href="/projects/{{ $project->slug }}"><i class="fas fa-paper-plane"></i>View Project</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-meta">
                            <div class="project-name">
                                <h5>{{ $project->title }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
