@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assign Jobs</h2>
    <form method="POST" action="{{ route('admin.store-assignment') }}">
        @csrf
        <div class="form-group">
            <label for="assignment_date">Assignment Date:</label>
            <input type="date" name="assignment_date" id="assignment_date" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="job_id">Select a Job:</label>
            <select name="job_id" id="job_id" class="form-control">
                @foreach($jobs as $job)
                    <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="user_id">Assign to User:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Assign Job</button>
    </form>
</div>



@endsection
