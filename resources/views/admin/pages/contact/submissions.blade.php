@extends('admin.layouts.adminapp')

@section('content')
    <div class="pagetitle">
        <h1 class="text-light">Contact Form Messages</h1>
        @include('admin.partials.breadcrumb')
    </div>
    @include('admin.partials.alert')
    <div class="container">

        @if ($submissions->isEmpty())
            <div class="alert alert-info mt-3">No messages found.</div>
        @else
            <div class="list-group mt-3 rounded-1">
                <div class="row d-none d-xl-flex text-center">
                    <div class="col-1">
                        <h6>#</h6>
                    </div>
                    <div class="col-2">
                        <h6>From:</h6>
                    </div>
                    <div class="col-2">
                        <h6>Subject:</h6>
                    </div>
                    <div class="col-4">
                        <h6>Message:</h6>
                    </div>
                    <div class="col-3">
                        <h6>Actions</h6>
                    </div>
                </div>
                @foreach ($submissions as $submission)
                    <div class="border border-white bg-dark text-light row py-2">
                        <div class="col-12 col-xl-1 d-none d-xl-flex flex-column align-items-center justify-content-center">
                            {{ $submission->id }}
                        </div>
                        <div class="col-12 col-xl-2 d-flex flex-column align-items-center justify-content-center">
                            <div class="mb-1">
                                <span class="text-light d-inline d-xl-none"><b>Date/Time:</b></span>
                                <small>{{ $submission->created_at }}</small>
                            </div>
                            <div class="mb-1 d-flex flex-column align-items-center justify-content-center">
                                <span class="text-light d-inline d-xl-none"><b>From:</b></span>
                                <h5 class="text-center">{{ $submission->name }}</h5>
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <span class="text-light d-inline d-xl-none"><b>Email:</b></span>
                                {{ $submission->email }}
                            </div>
                        </div>
                        <div class="col-12 col-xl-2 d-flex flex-column justify-content-center">
                            <span class="text-light d-inline d-xl-none"><b>Subject:</b></span>
                            <p class="mb-0">{{ $submission->subject }}</p>
                        </div>
                        <div class="col-12 col-xl-4 d-flex flex-column justify-content-center">
                            <span class="text-light d-inline d-xl-none"><b>Message:</b></span>
                            <p class="mb-0">{{ $submission->message }}</p>
                        </div>
                        <div class="col-12 col-xl-3 d-flex align-items-center justify-content-evenly mb-3">
                            <button class="btn btn-outline-danger mt-2 delete-button rounded-1" type="button"
                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $submission->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <nav role="navigation" aria-label="Pagination Navigation"
                class="d-flex align-items-center justify-content-between mt-3">
                <div class="flex justify-between flex-1 sm:hidden">
                    @if ($submissions->currentPage() > 1)
                        <a href="{{ $submissions->previousPageUrl() }}"
                            class="btn btn-outline-primary cursor-pointer leading-5 rounded-1">
                            « Previous
                        </a>
                    @endif

                    @if ($submissions->hasMorePages())
                        <a href="{{ $submissions->nextPageUrl() }}" class="btn btn-outline-primary ml-3 rounded-1">
                            Next »
                        </a>
                    @endif
                </div>

                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-gray-700 leading-5">
                            Showing
                            <span class="font-medium">{{ $submissions->firstItem() }}</span>
                            to
                            <span class="font-medium">{{ $submissions->lastItem() }}</span>
                            of
                            <span class="font-medium">{{ $submissions->total() }}</span>
                            results
                        </p>
                    </div>
                </div>
            </nav>
        @endif
    </div>

    @foreach ($submissions as $submission)
        <div class="modal fade bg-dark" id="deleteModal{{ $submission->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel{{ $submission->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-warning">
                        <h5 class="modal-title" id="deleteModalLabel{{ $submission->id }}">Delete Message</h5>
                        <button type="button" class="btn-close bg-danger text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <span class="text-light d-inline d-xl-none"><b>Date/Time:</b></span>
                            <small>{{ $submission->created_at }}</small>
                        </div>
                        <div class="mb-1 d-flex flex-column align-items-center justify-content-center">
                            <span class="text-light d-inline d-xl-none"><b>From:</b></span>
                            <h5 class="text-center">{{ $submission->name }}</h5>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <span class="text-light d-inline d-xl-none"><b>Email:</b></span>
                            {{ $submission->email }}
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <span class="text-light d-inline d-xl-none"><b>Subject:</b></span>
                            <p class="mb-0">{{ $submission->subject }}</p>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <span class="text-light d-inline d-xl-none"><b>Message:</b></span>
                            <p class="mb-0">{{ $submission->message }}</p>
                        </div>
                        <h3 class="mt-3 text-danger">Are you sure you want to delete this Message?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('messages.destroy', $submission->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
