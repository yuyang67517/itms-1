@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="display-4">All Feedback</h1>

    <br>
    <form action="{{ route('feedback.filter') }}" method="GET">
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="">Select Status</option>
                <option value="read">Read</option>
                <option value="unread">Unread</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>Message</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedback as $item)
                <tr>
                    <td>{{ $item->type }}</td>
                    <td>
                        {{ Str::limit($item->message, 50) }}
                        @if (strlen($item->message) > 50)
                            <a href="{{ route('feedback.show', ['feedback' => $item->id]) }}" >Read More</a>
                        @endif
                    </td>
                    <td>{{ $item->status }}
                        @if ($item->status === 'read')
                            <span class="text-success">
                                <i class="fa fa-check"></i> 
                            </span>
                        @elseif ($item->status === 'unread')
                            <span class="text-danger">
                                <i class="fa fa-times"></i> 
                            </span>
                        @endif
                    </td>
                    <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                    <td>
                        @if ($item->status === 'unread')
                            <form action="{{ route('feedback.markAsRead', ['feedback' => $item->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> Mark as Read</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($feedback as $item)
        <!-- Modal for displaying full message -->
        <div class="modal fade" id="feedbackModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel{{ $item->id }}">Full Feedback Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $item->message }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection
