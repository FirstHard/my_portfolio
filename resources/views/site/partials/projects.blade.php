<div class="container mt-5" id="portfolio">
    <div class="row justify-content-evenly">
        <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-sky">
            <h3 class="text-center mb-0">Portfolio:</h3>
        </div>
        <div class="col-12 col-xl-10">
            <div class="container portfolio pt-3 bg-white">
                <div class="row">
                    <div class="col-12">
                        <ul class="portfolio-filter ps-0">
                            <li class="filter active" data-filter="*">All</li>
                            @foreach ($tags as $tag)
                                <li class="filter" data-filter="{{ $tag->name }}">{{ $tag->title }}</li>
                            @endforeach
                        </ul>
                        <div class="row portfolio-container">
                            @foreach ($projects as $project)
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3 work"
                                    data-tags="{{ $project->tags->pluck('name')->join(',') }}">
                                    <div class="portfolio-item-content" data-bs-toggle="modal"
                                        data-bs-target="#{{ str_replace(['-', '.'], '_', $project->domain) }}">
                                        <img src="{{ asset('storage/projects/' . $project->image_path) }}"
                                            class="img-fluid" alt="{{ $project->title }}">
                                        <div class="portfolio-item-description p-2 text-center">
                                            <h6 class="fw-bold">{{ $project->title }}, {{ $project->creation_year }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($projects as $project)
        <div class="modal fade" id="{{ str_replace(['-', '.'], '_', $project->domain) }}" tabindex="-1"
            aria-labelledby="{{ str_replace(['-', '.'], '_', $project->domain) }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{ str_replace(['-', '.'], '_', $project->domain) }}Label">
                            {{ $project->title }}, {{ $project->creation_year }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row modal-body">
                        <div class="col-12 col-lg-3 project-gallery">
                            <div id="carouselFor{{ str_replace(['-', '.'], '_', $project->domain) }}"
                                class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    {{ $firstItem = true }}
                                    @foreach ($project->getMedia('gallery') as $index => $media)
                                        <div class="carousel-item {{ $firstItem ? 'active' : '' }}">
                                            <img src="{{ $media->getUrl() }}" class="d-block w-100"
                                                alt="{{ $project->title }}">
                                        </div>
                                        {{ $firstItem = false }}
                                    @endforeach
                                </div>
                                @if (count($project->getMedia('gallery')) > 1)
                                    <button class="carousel-control-prev bg-dark" type="button"
                                        data-bs-target="#carouselFor{{ str_replace(['-', '.'], '_', $project->domain) }}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next bg-dark" type="button"
                                        data-bs-target="#carouselFor{{ str_replace(['-', '.'], '_', $project->domain) }}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="project-logo my-3 my-lg-0 text-center">
                                <img src="{{ asset('storage/projects/' . $project->logo_path) }}" class="img-fluid" alt="{{ $project->title }} logo">
                            </div>
                            <div class="project-description">
                                {{ $project->description }}
                            </div>
                            <div class="project-cost">
                                <p><b><i>Cost such us this project from: {{ $project->cost_from }} USD</i></b></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success rounded-0 btn-order-site">Order such a
                            site</button>
                        @if (!$project->archived)
                            <a href="//{{ $project->domain }}" type="button" class="btn btn-primary rounded-0"
                                target="_blank">Visit this site</a>
                        @endif
                        <button type="button" class="btn btn-secondary rounded-0"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
