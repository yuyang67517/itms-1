@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Leave Application Details</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <tbody>
                <tr>
                    <th>User ID:</th>
                    <td>{{ $leave->id }}</td>
                </tr>
              
                <tr>
                    <th>Date of Application:</th>
                    <td>{{ $leave->date_of_application }}</td>
                </tr>
                <tr>
                    <th>Date of Return:</th>
                    <td>{{ $leave->date_of_return }}</td>
                </tr>
                <tr>
                    <th>Number of Days:</th>
                    <td>{{ $leave->days }}</td>
                </tr>
                <tr>
                    <th>Reason for Leave:</th>
                    <td>{{ $leave->reason }}</td>
                </tr>
                @if ($leave->supported_document)
                    <tr>
                        <th>Supported Document:</th>
                        <td>
                            <a href="{{ asset('storage/' . $leave->supported_document) }}" target="_blank">
                                View Document
                            </a>
                        </td>
                    </tr>

                @else
                <tr>
                    <th>Supported Document</th>
                    <td>N/A</td>
                </tr>

                @endif
                <tr>
                    <th>Status:</th>
                    <td>{{ $leave->status }}</td>
                </tr>
            </tbody>
        </table>

        <br>

        @if (Auth::user()->isAdmin() && $leave->status === 'pending')
            <form action="{{ route('leave.update', $leave->leave_id) }}" method="POST">


                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Update Status:</label>
                    <br>
                    <select class="form-control" id="status" name="status" required>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update Status</button>
                <a href="/admin/leave/index" class="btn btn-secondary">Back</a>
            </form>
        @endif

        @if (Auth::user()->isAdmin() && $leave->status === 'approved'|| $leave->status === 'rejected')
            <form action="{{ route('leave.update', $leave->leave_id) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Update Status:</label>
                    <br>
                    <select class="form-control" id="status" name="status" required>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update Status</button>
                <a href="/admin/leave/index" class="btn btn-secondary">Back</a>
            </form>

        @endif
        
    </div>
@endsection
