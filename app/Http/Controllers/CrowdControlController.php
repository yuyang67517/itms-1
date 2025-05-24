<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrowdControlData;


class CrowdControlController extends Controller
{
    public function index()
{
    // Retrieve and display the most recent crowd control data
    $latestData = CrowdControlData::latest()->first();

    return view('crowd-control.index', ['latestData' => $latestData]);
}


public function store(Request $request)
{
    // Validate input
    $request->validate([
        'entered' => 'required|integer',
        'exited' => 'required|integer',
    ]);

    // Calculate the current inside count
    $currentInside = $request->entered - $request->exited;

    // Store the data in the database
    $data = new CrowdControlData([
        'entered' => $request->entered,
        'exited' => $request->exited,
        'current_inside' => $currentInside,
        'user_id' => auth()->user()->id, 
    ]);
    $data->save();

    return redirect()->route('crowd-control.index');
}

public function displayFullscreen()
{
    
    $latestData = CrowdControlData::latest()->first(); 

    return view('fullscreen', compact('latestData'));
}


}
