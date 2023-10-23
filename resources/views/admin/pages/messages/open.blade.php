@extends('admin.pages.messages.index')

@section('messages')
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column">
                <div class="d-flex aling-items-start justify-content-between">
                    <span class="image-text">HF</span>
                    <div class="d-flex flex-column flex-grow-1 mx-3">
                        <span class="fw-semibold">{{ $message->subject }}</span>
                        <div class="">
                            <span>{{ $message->name }}</span>
                            <small class="text-muted"> - {{ $message->email }}</small>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-end">
                        <small class="text-dark">{{ convertStringDate(substr($message->created_at, 0, 10)) }}</small>
                        <small class="text-primary">{{ $message->phone }}</small>
                    </div>
                </div>
                <hr class="hr">
                <p>{{ $message->message }}</p>
            </div>
        </div>
    </div>
@endsection
