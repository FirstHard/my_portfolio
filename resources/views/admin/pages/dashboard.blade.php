@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        @include('admin.partials.breadcrumb')
    </div>

    @include('admin.partials.alert')
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h4 class="mb-4">Profile</h4>
                        <div class="profile-block">
                            @if ($profile)
                                <!-- Edit profile button -->
                                <a href="{{ route('profile.edit', ['profile' => $profile->id]) }}"
                                    class="btn btn-outline-secondary text-light rounded-1">Edit
                                    Profile</a>
                            @else
                                <!-- Create profile button -->
                                <a href="{{ route('profile.create') }}" class="btn btn-secondary text-light rounded-1">Create Profile</a>
                            @endif
                        </div>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-dark text-primary rounded-3">
                            <i class="ri-user-3-line font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div>
@endsection
