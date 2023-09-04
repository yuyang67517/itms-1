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

            <div class="form-group">
                <label for="supported_document">Supported Document (Optional):</label>
                <input type="file" class="form-control-file" id="supported_document" name="supported_document">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <br>
        <br>

        <!-- Display leave application history in a table -->
    <h2>Leave Application History</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date of Application</th>
                <th>Number of Days</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Supported Document</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveApplications as $leave)
            <tr>
                <td>{{ $leave->date_of_application }}</td>
                <td>{{ $leave->days }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->status }}</td>
                <td> 
                    @if ($leave->supported_document)
                        <a href="{{ asset('storage/' . $leave->supported_document) }}" target="_blank">View Document</a>
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>


@endsection
