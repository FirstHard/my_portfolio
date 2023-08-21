@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Create New Experience Record</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="container mt-4">
        <form action="{{ route('experience.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control bg-dark text-white rounded-1" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control bg-dark text-white rounded-1 tinymce-editor"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-6 form-group">
                    <label for="start_date">Start Date</label>
                    <input type="text" name="start_date" id="start_date"
                        class="form-control bg-dark text-white rounded-1" required>
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="end_date">End Date</label>
                    <input type="text" name="end_date" id="end_date" class="form-control bg-dark text-white rounded-1"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary rounded-1">Create Record</button>
        </form>
    </div>
@endsection
