
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create a New Job</h2>
    <form method="POST" action="/admin/store-job">
        @csrf
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea name="job_description" class="form-control" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create Job</button>
    </form>
</div>
@endsection
