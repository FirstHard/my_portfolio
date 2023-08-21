@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Add About Entry</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="container">
        <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control bg-dark text-white rounded-1 tinymce-editor" rows="5">{{ old('content') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="cv_file">CV File (PDF, max 2 MB):</label>
                <input type="file" name="cv_file" id="cv_file" class="form-control-file form-control bg-dark text-white rounded-1">
            </div>

            <button type="submit" class="btn btn-primary">Add Entry</button>
        </form>
    </div>
@endsection
