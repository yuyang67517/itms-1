<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class SalesController extends Controller
{

    public function index()
    {
        // Display sales data and form for admin
        $salesRecords = Sales::all();
        $salesRecords = Sales::orderBy('date', 'desc')->get();

        return view('sales.index', compact('salesRecords'));
    }
    
/*
    public function index(Request $request)
    {
        // Display sales data and form for admin
        $salesRecords = Sales::all();
        return view('sales.index', compact('salesRecords'));

        // Get the start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query sales records based on the date range
        $query = Sales::query();

        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $salesRecords = $query->get();

        return view('sales.index', compact('salesRecords'));
    }*/


    public function store(Request $request)
    {
        $userId = Auth::id();
        
        // Validate the incoming data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'cash_sales' => 'required|numeric|min:0',
            'credit_card_sales' => 'required|numeric|min:0',
            'ewallet_sales' => 'required|numeric|min:0',
        ]);

        // Calculate the total sales
        $totalSales = $validatedData['cash_sales'] + $validatedData['credit_card_sales'] + $validatedData['ewallet_sales'];

        // Create a new Sales record
        $salesRecord = new Sales([
            'date' => $validatedData['date'],
            'cash_sales' => $validatedData['cash_sales'],
            'credit_card_sales' => $validatedData['credit_card_sales'],
            'ewallet_sales' => $validatedData['ewallet_sales'],
            'total_sales' => $totalSales,
            'user_id' => $userId,
        ]);

        // Save the record to the database
        $salesRecord->save();

        // Redirect back to the sales page with a success message
        return redirect()->route('sales.index')->with('success', 'Sales record added successfully.');
    }

    public function show($id)
    {
        // Retrieve the sales record with the given ID
        $salesRecord = Sales::find($id);

        // Check if the record was found
        if (!$salesRecord) {
            // Handle the case where the record was not found, e.g., show an error message or redirect
            return redirect()->route('sales.index')->with('error', 'Sales record not found.');
        }

        // Load a view to display the sales record details
        return view('sales.show', compact('salesRecord'));
    }


    public function edit($id)
    {
        $salesRecord = Sales::findOrFail($id);

        return view('sales.edit', compact('salesRecord',));
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'cash_sales' => 'required|numeric|min:0',
            'credit_card_sales' => 'required|numeric|min:0',
            'ewallet_sales' => 'required|numeric|min:0',
        ]);

        $totalSales = $validatedData['cash_sales'] + $validatedData['credit_card_sales'] + $validatedData['ewallet_sales'];

        $salesRecord = Sales::findOrFail($id);
        $salesRecord->date = $validatedData['date'];
        $salesRecord->cash_sales = $validatedData['cash_sales'];
        $salesRecord->credit_card_sales = $validatedData['credit_card_sales'];
        $salesRecord->ewallet_sales = $validatedData['ewallet_sales'];
        $salesRecord->total_sales = $totalSales;
        $salesRecord->save();

        return redirect()->route('sales.index')->with('success', 'Sales record updated successfully.');
    }


}
