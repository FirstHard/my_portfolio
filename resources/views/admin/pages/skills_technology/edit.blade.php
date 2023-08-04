<!-- resources/views/admin/skills_technology/edit.blade.php -->
@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Edit Skills & Technology Record</h1>
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

    <form action="{{ route('skills-technology.update', $skillsTechnology->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control bg-dark text-white rounded-1"
                value="{{ $skillsTechnology->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control rounded-1 tinymce-editor">{{ $skillsTechnology->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary rounded-1">Update</button>
        <a href="{{ route('skills-technology.index') }}" class="btn btn-outline-secondary rounded-1">Cancel</a>
    </form>
@endsection
