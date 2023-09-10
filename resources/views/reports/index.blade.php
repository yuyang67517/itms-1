@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reports</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daily Sales Report</h5>
                    <p class="card-text">View daily sales data.</p>
                    <a href="{{ route('daily-report') }}" class="btn btn-primary">View Report</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monthly Sales Report</h5>
                    <p class="card-text">View monthly sales data.</p>
                    <a href="{{ route('monthly-report') }}" class="btn btn-primary">View Report</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
