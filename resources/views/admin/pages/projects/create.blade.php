@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Create New Project</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container mt-4">
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-12 col-md-10">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-white rounded-1"
                        required>
                </div>
                <div class="col-12 col-md-2 d-flex align-items-end">
                    <div class="form-check form-switch mb-2">
                        <input type="checkbox" name="archived" id="archived" class="form-check-input">
                        <label for="archived" class="form-check-label">Is Archived?</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control bg-dark text-white rounded-1 tinymce-editor"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control bg-dark text-white rounded-1">
                </div>
                <div class="col-12 col-md-4">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control bg-dark text-white rounded-1">
                </div>
                <div class="col-12 col-md-4">
                    <label for="gallery" class="form-label">Gallery</label>
                    <input type="file" name="gallery[]" id="gallery" class="form-control bg-dark text-white rounded-1"
                        multiple>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-3">
                    <label for="creation_year" class="form-label">Creation Year</label>
                    <input type="number" name="creation_year" id="creation_year"
                        class="form-control bg-dark text-white rounded-1" required>
                </div>
                <div class="col-12 col-md-3">
                    <label for="domain" class="form-label">Domain</label>
                    <input type="text" name="domain" id="domain" class="form-control bg-dark text-white rounded-1">
                </div>
                <div class="col-12 col-md-3">
                    <label for="cost_from" class="form-label">Cost From</label>
                    <input type="number" name="cost_from" id="cost_from" class="form-control bg-dark text-white rounded-1">
                </div>
                <div class="col-12 col-md-3">
                    <label for="cost_to" class="form-label">Cost To</label>
                    <input type="number" name="cost_to" id="cost_to" class="form-control bg-dark text-white rounded-1">
                </div>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select name="tags[]" id="tags" class="form-control bg-dark text-white rounded-1" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary rounded-1">Create Project</button>
        </form>
    </div>
@endsection
