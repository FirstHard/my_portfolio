@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Edit Profile</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="container">
        <form action="{{ route('profile.update', ['profile' => $profile->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($profile->photo)
                <img src="{{ asset('storage/photos/' . $profile->photo) }}" class="img-fluid" style="max-width: 200px"
                    alt="Profile Photo">
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control bg-dark text-white rounded-1" id="photo" name="photo">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control bg-dark text-white rounded-1" id="position" name="position"
                        value="{{ $profile->position }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control bg-dark text-white rounded-1" id="location" name="location"
                        value="{{ $profile->location }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control bg-dark text-white rounded-1" id="email" name="email"
                        value="{{ $profile->email }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="skype" class="form-label">Skype</label>
                    <input type="text" class="form-control bg-dark text-white rounded-1" id="skype" name="skype"
                        value="{{ $profile->skype }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telegram" class="form-label">Telegram</label>
                    <input type="text" class="form-control bg-dark text-white rounded-1" id="telegram" name="telegram"
                        value="{{ $profile->telegram }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary rounded-1">Update</button>
        </form>
    </div>
@endsection
