@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daily Sales</h1>

    <!-- Display a summary of recorded sales data -->
    <h2>Recorded Sales Data</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Cash Sales</th>
                <th>Credit Card Sales</th>
                <th>Wallet Sales</th>
                <th>Total Sales</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display charts here (you'll need to implement this using a charting library) -->
    <!-- For example, you can use Chart.js -->

</div>
@endsection
