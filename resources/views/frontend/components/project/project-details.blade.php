<section class="portfolio-details-area pt-150 pb-80">
    <div class="container">
        <div class="portfolio-details-content">
            <div class="row wow fadeInUp">
                <div class="col-lg-6">
                    <div class="portfolio-details-title mb-25">
                        <h4>{{ $project->title }}</h4>
                        <span class="portfolio-details-category">{{ $project->service->title }}</span>
                        <span class="portfolio-details-date">{{ $project->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="portfolio-details-img">
                <div class="row wow fadeInUp">
                    <div class="col-lg-9">
                        <div class="portfolio-details-img-left">
                            <div class="portfolio-details-single-img">
                                <img src="{{ asset($project->featured_image->path) }}" alt="{{ $project->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="portfolio-details-img-right">
                            <div class="row">
                                @if($project->b_image_1 !== null)
                                    <div class="col-lg-12 col-sm-6">
                                        <div class="portfolio-details-single-img">
                                            <img src="{{ asset($project->b_image_1->path) }}" alt="{{ $project->title }}">
                                        </div>
                                    </div>
                                @endif
                                @if($project->b_image_2 !== null)
                                    <div class="col-lg-12 col-sm-6">
                                        <div class="portfolio-details-single-img">
                                            <img src="{{ asset($project->b_image_1->path) }}" alt="{{ $project->title }}">
                                        </div>
                                    </div>
                                @endif
                                @if($project->b_image_3 !== null)
                                    <div class="col-lg-12 col-sm-6">
                                        <div class="portfolio-details-single-img">
                                            <img src="{{ asset($project->b_image_1->path) }}" alt="{{ $project->title }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp">
                <div class="col-lg-8">
                    <h5 class="mb-15">Description</h5>
                    <div class="mb-40">{!! $project->description !!}</div>
                    @if($project->working_process !== null)
                        <h5 class="mb-20">Working Process</h5>
                        <div class="choosing__information portfolio-w-p">
                            <ul>
                                @foreach (json_decode($project->working_process, true) as $key => $process)
                                    <li>
                                    <div class="choosing__number">
                                        <span>{{ $key + 1 }}</span>
                                    </div>
                                    <div class="choosing__text">
                                        <h5>{{ $process['title'] }}</h5>
                                        <p>{{ $process['description'] }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-sidebar-widget mb-30">
                                    @if($project->tools_used !== null)
                                        <div class="ps-widget-meta">
                                            <h5>Tools Used</h5>
                                            <ul class="used-tools">
                                                @foreach (json_decode($project->tools_used, true) as $key => $tool)
                                                    <li><a class="tools-{{ $key }}" href="javascript:;">{{ $tool }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="ps-widget-meta">
                                        <h5>Creating Date</h5>
                                        <ul class="widget-meta-dt">
                                            <li>{{ $project->created_at->format('d M Y') }}</li>
                                            <li>{{ $project->created_at->format('h:i A') }}</li>
                                        </ul>
                                    </div>
                                    <div class="ps-widget-meta">
                                        <h5>Client's Name</h5>
                                        <div class="clients-name">
                                            <span>{{ $project->client_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
