<div class="container mt-5" id="skills">
    <div class="row justify-content-evenly">
        <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-green">
            <h3 class="text-center mb-0">Skills & technology:</h3>
        </div>
        <div class="col-12 col-xl-10">
            <div class="row">
                @foreach ($skills as $skill)
                    <div class="col-12 col-xl-4 skill-item-wrapper mb-3">
                        <div class="skill-item bg-white">
                            <h6>{{ $skill->title }}</h6>
                            {!! $skill->content !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
