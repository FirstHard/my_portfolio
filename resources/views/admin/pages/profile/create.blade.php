@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Create Profile</h1>
        @include('admin.partials.breadcrumb')
    </div>
    <div class="container">
        <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="profile" value="{{ $profile->id }}">
            @csrf
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <div class="input-group">
                            <input type="file" class="form-control bg-dark text-white rounded-1" id="photo" name="photo">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control bg-dark text-white rounded-1" id="position" name="position">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control bg-dark text-white rounded-1" id="location" name="location">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control bg-dark text-white rounded-1" id="email" name="email">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="skype" class="form-label">Skype</label>
                        <input type="text" class="form-control bg-dark text-white rounded-1" id="skype" name="skype">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label for="telegram" class="form-label">Telegram</label>
                        <input type="text" class="form-control bg-dark text-white rounded-1" id="telegram" name="telegram">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-1">Create</button>
        </form>
    </div>
@endsection
