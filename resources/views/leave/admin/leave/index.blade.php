@extends('layouts.app')

@section('content')
    <h1>Leave Applications  ffffff</h1>
    @foreach ($leaveApplications as $leave)
        <div>
            <p>Applicant: {{ $leave->user->name }}</p>
            <p>Date of Application: {{ $leave->date_of_application }}</p>
            <p>Days: {{ $leave->days }}</p>
            <p>Reason: {{ $leave->reason }}</p>
            <p>Status: {{ $leave->status }}</p>
            <form method="POST" action="{{ route('admin.leave.approve', $leave->id) }}">
                @csrf
                @method('put')
                <button type="submit">Approve</button>
            </form>
            <form method="POST" action="{{ route('admin.leave.reject', $leave->id) }}">
                @csrf
                @method('put')
                <button type="submit">Reject</button>
            </form>
        </div>
    @endforeach
@endsection
