@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Tags</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container mt-4">
        <a href="{{ route('tags.create') }}" class="btn btn-outline-primary rounded-1 mb-3">Create New Tag</a>

        @if ($tags->isEmpty())
            <div class="alert alert-info mt-3">No records found.</div>
        @else
        <div class="row">
            @foreach ($tags as $tag)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tag->title }}</h5>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this tag?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
