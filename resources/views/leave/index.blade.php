@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Leave Applications</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Date of Application</th>
                    <th>Number of Days</th>
                    <th>Reason for Leave</th>
                    <th>Status</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveApplications as $leave)
                    <tr>
                        <td>{{ $leave->date_of_application }}</td>
                        <td>{{ $leave->days }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>{{ $leave->status }}</td>
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



