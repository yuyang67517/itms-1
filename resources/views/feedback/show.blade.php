@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Feedback</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Type: {{ $feedback->type }}</h5>
            <br>
            <p class="card-text">Content: <br>{{ $feedback->message }}</p>
            <p class="card-text"><small class="text-muted">Created At: {{ date('Y-m-d', strtotime($feedback->created_at)) }}</small></p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
