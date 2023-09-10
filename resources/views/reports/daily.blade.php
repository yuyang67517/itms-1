@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daily Sales Report</h1>

    <!-- Daily Sales Chart -->
    <canvas id="dailySalesChart" width="400" height="200"></canvas>

    <a class="btn btn-secondary" href="{{ url('/reports') }}" role="button">Back</a>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Daily Sales Chart
        var ctxDaily = document.getElementById('dailySalesChart').getContext('2d');
        
        // Extract the dates and sales totals from the PHP data
        var dailyLabels = @json($dailyLabels);
        var dailyData = @json($dailyData);

        var chartDaily = new Chart(ctxDaily, {
            type: 'bar',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Daily Sales',
                    data: dailyData,
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
                            text: 'Date'
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

