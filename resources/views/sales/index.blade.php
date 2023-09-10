@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daily Sales</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Display a form to enter sales data -->
    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cash_sales">Cash Sales:</label>
            <input type="number" name="cash_sales" class="form-control" step="0.01" min="0" required>
        </div>
        <div class="form-group">
            <label for="credit_card_sales">Credit Card Sales:</label>
            <input type="number" name="credit_card_sales" class="form-control" step="0.01" min="0" required>
        </div>
        <div class="form-group">
            <label for="ewallet_sales">E-Wallet Sales:</label>
            <input type="number" name="ewallet_sales" class="form-control" step="0.01" min="0" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <br>
    <br>
    <br>

    <!-- Display existing sales records in a table -->
    <h2>Existing Sales Records</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Cash Sales</th>
                <th>Credit Card Sales</th>
                <th>E-Wallet Sales</th>
                <th>Total Sales</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesRecords as $record)
            <tr>
                <td>{{ $record->date }}</td>
                <td>{{ $record->cash_sales }}</td>
                <td>{{ $record->credit_card_sales }}</td>
                <td>{{ $record->ewallet_sales }}</td>
                <td>{{ $record->total_sales }}</td>
                <td>
                    <a href="{{ route('sales.edit', $record->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
