@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Edit Experience Record</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="container mt-4">
        <form action="{{ route('experience.update', $experience->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control bg-dark text-white rounded-1"
                    value="{{ $experience->title }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control bg-dark text-white rounded-1 tinymce-editor">{!! $experience->description !!}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="start_date">Start Date</label>
                <input type="text" name="start_date" id="start_date" class="form-control bg-dark text-white rounded-1"
                    value="{{ $experience->start_date }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="end_date">End Date</label>
                <input type="text" name="end_date" id="end_date" class="form-control bg-dark text-white rounded-1"
                    value="{{ $experience->end_date }}" required>
            </div>
            <button type="submit" class="btn btn-outline-primary rounded-1">Update Record</button>
        </form>
    </div>
@endsection
