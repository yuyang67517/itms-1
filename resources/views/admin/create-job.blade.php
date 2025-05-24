@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create a New Job</h2>
    <form method="POST" action="/admin/store-job">
        @csrf
        <!-- Form fields for creating a new job -->
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea name="job_description" class="form-control" rows="9"  required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create Job</button>
    </form>
    <br>
    <br>

    <!-- Display existing jobs in a table -->
    <h2>Existing Jobs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Job Title</th>
                <th>Job Description</th>
                <th>Actions</th> <!-- Column for Edit and Delete buttons -->
            </tr>
        </thead>
        <tbody>
            @foreach($existingJobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->job_description }}</td>
                <td>
                    <a href="{{ route('edit-job', $job->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('delete-job', $job->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
