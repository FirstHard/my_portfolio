@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Create New Skills & Technology Record</h1>
        @include('admin.partials.breadcrumb')
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skills-technology.store') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control bg-dark text-white rounded-1"
                value="{{ old('title') }}">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control rounded-1 tinymce-editor">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary rounded-1">Create</button>
    </form>
@endsection
