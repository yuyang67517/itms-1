<?php

namespace App\Http\Controllers;
use App\Position; 
use App\User;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function show($id)
    {
        // This is a dummy method that does nothing.
    }

    
    public function manual()
    {
        $positions = Position::all();
        $availableUsers = User::all(); 

        return view('timetables.manual', compact('positions', 'availableUsers'));
    }

    public function generate(Request $request)
    {
        // Validate the form data here

        foreach ($request->input('users') as $positionId => $userId) {
            // Create a timetable entry for each position and selected user
            Timetable::create([
                'date' => now()->toDateString(),
                'position_id' => $positionId,
                'user_id' => $userId,
            ]);
        }

        // Redirect back with a success message
        return redirect()->route('timetables.manual')->with('success', 'Timetable generated successfully');
    }


}
