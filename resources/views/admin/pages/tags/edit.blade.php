@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Edit Tag</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container mt-4">
        <form action="{{ route('tags.update', $tag->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control bg-dark text-white rounded-1"
                    value="{{ $tag->title }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control bg-dark text-white rounded-1"
                    value="{{ $tag->name }}" required>
            </div>
            <button type="submit" class="btn btn-outline-primary rounded-1">Update Tag</button>
        </form>
    </div>
@endsection
