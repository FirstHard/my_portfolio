@extends('admin.layouts.adminapp')

@section('content')
    <h1>Send Response</h1>

    <form action="{{ route('admin.contact.send-response', $submission->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="response">Response</label>
            <textarea name="response" id="response" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection