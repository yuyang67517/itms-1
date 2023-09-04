@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Timetable</h2>

    <!-- Date Filter Form -->
    <form method="GET" action="{{ route('assigned-jobs.index') }}" class="mb-4">
        <div class="form-group">
            <label for="date_filter">Filter by Date:</label>
            <select name="date_filter" id="date_filter" class="form-control">
                <option value="today" {{ $dateFilter === 'today' ? 'selected' : '' }}>
                    Today
                </option>
                @foreach ($uniqueDates as $date)
                    <option value="{{ $date }}" {{ $dateFilter == $date ? 'selected' : '' }}>
                        {{ $date }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Apply Filter</button>
    </form>

    <!-- Job Assignments Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Job Title</th>
                <th>Job Description</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jobAssignments as $assignment)
                <tr>
                    <td>{{ $assignment->assignment_date }}</td>
                    <td>{{ $assignment->job->job_title }}</td>
                    <td>{{ $assignment->job->job_description }}</td>
                    <td>{{ $assignment->user->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No assigned jobs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
