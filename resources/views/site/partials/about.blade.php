<div class="container mt-5" id="about">
    <div class="row">
        <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-sky">
            <h3 class="text-center mb-0">About me:</h3>
        </div>
        <div class="col-12 col-xl-10">
            <div class="bg-white content pt-3">
                {!! $about->content !!}
                <div class="d-flex justify-content-evenly p-3">
                    <a href="{{ route('cv.download') }}" class="btn btn-primary rounded-0">Save my CV</a> <a
                        href="#contact" class="btn btn-success rounded-0 scrollto">Contact me</a>
                </div>
            </div>
        </div>
    </div>
</div>
