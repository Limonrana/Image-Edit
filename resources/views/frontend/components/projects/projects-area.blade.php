<section class="portfolio-main pt-150 pb-50">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="button-group portfolio-button portfolio-main-buttons">
                <button class="active" data-filter="*">All Shots</button>
                @foreach($services as $service)
                    <button data-filter=".{{ $service->slug }}">{{ $service->title }}</button>
                @endforeach
            </div>
        </div>
        <div class="row wow fadeInUp grid portfolio-main-items">
            @foreach($projects as $project)
                <div class="col-lg-4 col-sm-6 grid-item {{ $project->service->slug }}">
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
