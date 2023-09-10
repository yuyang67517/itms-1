@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Monthly Sales Report</h1>

    <!-- Monthly Sales Chart -->
    <canvas id="monthlySalesChart" width="400" height="200"></canvas>

    <a class="btn btn-secondary" href="{{ url('/reports') }}" role="button">Back</a>
</div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {

        console.log('Monthly Labels:', @json($monthlyLabels));
        console.log('Monthly Data:', @json($monthlyData));
        // Monthly Sales Chart
        var ctxMonthly = document.getElementById('monthlySalesChart').getContext('2d');

        // Extract the data passed from the controller
        var labels = @json($monthlyLabels);
        var data = @json($monthlyData);

        var chartMonthly = new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Sales',
                    data: data,
                    backgroundColor: 'rgba(255, 0, 0, 0.8);',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                       
                    
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Sales (RM)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
