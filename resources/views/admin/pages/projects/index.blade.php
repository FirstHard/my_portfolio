@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Projects</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container mt-4">
        <a href="{{ route('projects.create') }}" class="btn btn-outline-primary rounded-1">Add New Project</a>

        @if ($projects->isEmpty())
            <div class="alert alert-info mt-3">No projects found.</div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                @foreach ($projects as $project)
                    <div class="col">
                        <div class="card">
                            @if ($project->image_path)
                                <img src="{{ asset('storage/projects/' . $project->image_path) }}" alt="{{ $project->title }}"
                                    class="card-img-top">
                            @else
                                <div class="card-body">
                                    No Image
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="badge bg-dark text-white rounded-1"><a href="//{{ $project->domain }}"
                                                target=_blank>{{ $project->domain }}</a></span>
                                        <span class="badge bg-dark text-white rounded-1">Cost: ${{ $project->cost_from }}
                                            @if ($project->cost_to)
                                                - ${{ $project->cost_to }}
                                            @endif
                                        </span>
                                    </div>
                                    <div>
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="btn btn-outline-info text-white rounded-1">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
