@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Edit About Me Section</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="container">
        <form action="{{ route('about.update', ['about' => $about->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control bg-dark text-white rounded-1 tinymce-editor" id="content" name="content">{{ $about->content }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="cv_file">CV File (PDF, max 2 MB):</label>
                    <input type="file" name="cv_file" id="cv_file"
                        class="form-control-file form-control bg-dark text-white rounded-1">
                </div>
            </div>

            <button type="submit" class="btn btn-primary rounded-1">Update</button>
        </form>
    </div>
@endsection
