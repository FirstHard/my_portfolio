@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="row">
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
                                        class="btn btn-outline-info text-light rounded-1">Edit
                                        Profile</a>
                                @else
                                    <!-- Create profile button -->
                                    <a href="{{ route('profile.create') }}"
                                        class="btn btn-outline-info text-light rounded-1">Create Profile</a>
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
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h4 class="mb-4">About Me</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-dark text-primary rounded-3">
                                <i class="bi bi-file-earmark-person-fill"></i>
                            </span>
                        </div>
                    </div>
                    <div class="profile-block d-flex justify-content-between">
                        @if ($about)
                            <!-- Edit About button -->
                            <a href="{{ route('about.edit', ['about' => $about->id]) }}"
                                class="btn btn-outline-info text-light rounded-1">Edit
                                About Me</a>
                            @if ($about->cv_file)
                                <a href="{{ route('cv.download') }}"
                                    class="btn btn-outline-primary text-light rounded-1">Download CV</a>
                            @endif
                        @else
                            <!-- Create About button -->
                            <a href="{{ route('about.create') }}"
                                class="btn btn-outline-info text-light rounded-1">Create About Me Section</a>
                        @endif
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
    </div>
@endsection
