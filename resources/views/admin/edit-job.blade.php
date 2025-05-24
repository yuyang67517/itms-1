@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job</h2>
    <form method="POST" action="{{ route('update-job', $job->id) }}">
        @csrf
        @method('PUT') <!-- Use the PUT method for updating data -->

        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ $job->job_title }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea name="job_description" class="form-control" rows="9" required>{{ $job->job_description }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
