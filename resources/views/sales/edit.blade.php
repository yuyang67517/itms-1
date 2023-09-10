@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sales Record</h1>
    <br>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    
    @endif

    <form method="POST" action="{{ route('sales.update', $salesRecord->id) }}">
        @csrf
        @method('PUT')

        <div>
        <p>Updated by ID: {{ $salesRecord->user_id }}
            <br>
            Last Updated Time: {{ $salesRecord->updated_at }}
        </p>
    </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" value="{{ $salesRecord->date }}" required>
        </div>
        <div class="form-group">
            <label for="cash_sales">Cash Sales:</label>
            <input type="number" name="cash_sales" class="form-control" step="0.01" min="0" value="{{ $salesRecord->cash_sales }}" required>
        </div>
        <div class="form-group">
            <label for="credit_card_sales">Credit Card Sales:</label>
            <input type="number" name="credit_card_sales" class="form-control" step="0.01" min="0" value="{{ $salesRecord->credit_card_sales }}" required>
        </div>
        <div class="form-group">
            <label for="ewallet_sales">E-Wallet Sales:</label>
            <input type="number" name="ewallet_sales" class="form-control" step="0.01" min="0" value="{{ $salesRecord->ewallet_sales }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
