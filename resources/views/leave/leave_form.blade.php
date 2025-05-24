@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Leave Application Form</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="form-group">
                <label for="date_of_application">From:</label>
                <input type="date" class="form-control" id="date_of_application" name="date_of_application" required>
            </div>

            <div class="form-group">
                <label for="date_of_return">To:</label>
                <input type="date" class="form-control" id="date_of_return" name="date_of_return" required>
            </div>


            <div class="form-group">
                <label for="days">Number of Days:</label>
                <input type="number" class="form-control" id="days" name="days" required>
            </div>

            <div class="form-group">
                <label for="reason">Reason for Leave:</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
            </div>
            <!--
            <div class="form-group">
                <label for="supported_document">Supported Document (Optional):</label>
                <input type="file" class="form-control-file" id="supported_document" name="supported_document">
            </div>
-->
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <br>
        <br>

        <!-- Display leave application history in a table -->
    <h2>My Leave Application History</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date of Application</th>
                <th>Number of Days</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveApplications as $leave)
            <tr>
                <td>{{ $leave->date_of_application }}</td>
                <td>{{ $leave->days }}</td>
                <td>{{ $leave->reason }}</td>
           
                <td>
                        @if ($leave->status == 'approved')
                                <span class="text-success">
                                    <i class="fa fa-check"></i> Approved
                                </span>
                            @elseif ($leave->status == 'rejected')
                                <span class="text-danger">
                                    <i class="fa fa-times"></i> Rejected
                                </span>
                            @else
                                <span class="text-warning">
                                    <i class="fa fa-clock-o"></i>Pending
                                </span>
                            @endif
                        </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>


@endsection
