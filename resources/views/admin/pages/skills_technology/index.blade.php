@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Skills & Technology Records</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container skills-technology mt-4">
        <a href="{{ route('skills-technology.create') }}" class="btn btn-success">Create New Record</a>

        @if ($skillsTechnologies->isEmpty())
            <div class="alert alert-info mt-3">No records found.</div>
        @else
            <div class="row mt-3">
                @foreach ($skillsTechnologies as $record)
                    <div class="col-12 col-xl-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $record->title }}</h5>
                                <div class="card-text">{!! $record->content !!}</div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('skills-technology.edit', $record->id) }}" class="btn btn-outline-primary rounded-1">Edit</a>
                                    <form action="{{ route('skills-technology.destroy', $record->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger rounded-1" onclick="return confirm('Are you sure?')">Delete</button>
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
