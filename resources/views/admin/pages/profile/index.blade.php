@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        @include('admin.partials.breadcrumb')
    </div>
        @if($profile)
            <!-- Display profile information -->
            <div class="profile-info">
                <img src="{{ asset('storage/photos/' . $profile->photo) }}" class="img-wluid" style="max-width: 200px" alt="Profile Photo">
                <h2>{{ $profile->position }}</h2>
                <p>Location: {{ $profile->location }}</p>
                <p>Email: {{ $profile->email }}</p>
                <p>Skype: {{ $profile->skype }}</p>
                <p>Telegram: {{ $profile->telegram }}</p>
                <!-- Add any other profile information here -->
            </div>

            <!-- Edit profile button -->
            <a href="{{ route('profile.edit', ['profile' => $profile->id]) }}" class="btn btn-primary rounded-1">Edit Profile</a>
        @else
            <!-- Create profile button -->
            <a href="{{ route('profile.create') }}" class="btn btn-primary rounded-1">Create Profile</a>
        @endif
@endsection
