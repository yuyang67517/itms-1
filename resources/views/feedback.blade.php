@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Anonymous Feedback</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="post" action="/feedback">
        @csrf
        <div class="form-group">
            <label for="type">Type:</label><br>
            <select name="type" class="form-control">
                <option value="suggestion">Suggestion</option>
                <option value="complaint">Complaint</option>
                <option value="issue">Issue</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="message">Your Feedback:</label><br>
            <textarea name="message" class="form-control" rows="4"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>

</div>

@endsection
