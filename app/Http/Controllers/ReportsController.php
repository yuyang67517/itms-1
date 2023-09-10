<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;


class ReportsController extends Controller
{
    public function index()
    {
        // Enable query logging
        DB::enableQueryLog();
    
        
        return view('reports.index');
    }

    public function monthlyReport()
{
    // Enable query logging (you can remove this line if not needed)
    DB::enableQueryLog();

    // Fetch daily sales data
    $dailySales = Sales::selectRaw('DATE(date) as date, SUM(total_sales) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    // Calculate monthly totals from daily data
    $monthlySales = $dailySales->groupBy(function ($item) {
        return Carbon::parse($item->date)->format('Y-m'); // Group by year and month
    })->map(function ($group) {
        return $group->sum('total'); // Calculate the sum for each month
    });

    // Debugging: Log the SQL query
    $queries = DB::getQueryLog();
    \Log::info($queries);

    // Debugging: Log the fetched data
    \Log::info($monthlySales);

    // Prepare data for Chart.js
    $monthlyLabels = $monthlySales->keys(); // Extract month labels
    $monthlyData = $monthlySales->values();   // Extract monthly totals as data

    // Pass the data to the view
    return view('reports.monthly', compact('monthlyLabels', 'monthlyData'));
}

 
    public function dailyReport()
{
    // Enable query logging
    DB::enableQueryLog();

    // Fetch daily sales data
    $dailySales = Sales::selectRaw('DATE(date) as date, SUM(total_sales) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    // Debugging: Log the SQL query
    $queries = DB::getQueryLog();
    \Log::info($queries);

    // Debugging: Log the fetched data
    \Log::info($dailySales);

    // Prepare data for Chart.js
    $dailyLabels = $dailySales->pluck('date'); // Extract date numbers as labels
    $dailyData = $dailySales->pluck('total');   // Extract total sales as data

    // Pass the data to the view
    return view('reports.daily', compact('dailyLabels', 'dailyData'));
}



    
}
