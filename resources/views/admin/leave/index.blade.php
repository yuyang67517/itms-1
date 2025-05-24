@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Leave Applications</h1>
        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Leave ID</th>
                    <th>User ID</th>
                    <th>Date of Application</th>
                    <th>Date of Return</th>
                    <th>Number of Days</th>
                    <th>Reason for Leave</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveApplications as $leave)
                    <tr>
                        <td>{{ $leave->id }}</td>
                        <td>{{ $leave->user_id }}</td>
                        <td>{{ $leave->date_of_application }}</td>
                        <td>{{ $leave->date_of_return }}</td>
                        <td>{{ $leave->days }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>
                        @if ($leave->status == 'Approved')
                                <span class="text-success">
                                    <i class="fa fa-check"></i> Approved
                                </span>
                            @elseif ($leave->status == 'Rejected')
                                <span class="text-danger">
                                    <i class="fa fa-times"></i> Rejected
                                </span>
                            @else
                                <span class="text-warning">
                                    <i class="fa fa-clock-o"></i>Pending
                                </span>
                            @endif
                        </td>
                        <td>
                       
                        <a href="{{ route('leave.user.show', ['leave_id' => $leave->id]) }}" class="btn btn-primary">Update</a>

                </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



