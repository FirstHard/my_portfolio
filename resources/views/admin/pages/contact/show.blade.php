@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1>Contact Form Message</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container">
        <div class="card">
            <div class="card-header">
                From: {{ $contactForm->name }} ({{ $contactForm->email }})
            </div>
            <div class="card-body">
                <p>{{ $contactForm->message }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h2>Respond to Message</h2>
            <form method="post" action="{{ route('admin.contact.respond', $contactForm->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="response_message" class="form-label">Response Message</label>
                    <textarea class="form-control" id="response_message" name="response_message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Response</button>
            </form>
        </div>
    </div>
@endsection
