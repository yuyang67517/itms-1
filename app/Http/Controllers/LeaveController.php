<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{

    public function index()
    {
        $leaveApplications = Leave::where('user_id', auth()->user()->id)->get();
        return view('leave.leave_form', compact('leaveApplications'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'date_of_application' => 'required|date',
            'date_of_return' => 'required|date',
            'days' => 'required|integer',
            'reason' => 'required|string',
            'supported_document' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // Create and save the leave application
        $leave = new Leave();
        $leave->user_id = auth()->user()->id; // Associate the leave with the logged-in user
        $leave->date_of_application = $request->input('date_of_application');
        $leave->date_of_return = $request->input('date_of_return');
        $leave->days = $request->input('days');
        $leave->reason = $request->input('reason');
        
        // Handle supported document upload (if provided)
        if ($request->hasFile('supported_document')) {
            $supportedDocumentPath = $request->file('supported_document')->store('documents', 'public');
            $leave->supported_document = $supportedDocumentPath;
        }
        
        $leave->status = 'pending'; // Set the initial status
        $leave->save();

        return redirect()->route('leave.index')->with('success', 'Leave application submitted successfully.');
    }

    public function show($leave_id)
    {
        $leave = Leave::findOrFail($leave_id);
        return view('leave.leave_details', compact('leave'));
    }

    public function showUserLeave($id)
    {
        $leave = Leave::where('user_id', auth()->user()->id)->findOrFail($id);
        return view('leave.user_show', compact('leave'));
    }

    public function update(Request $request, $leave_id)
    {
        $leave = Leave::findOrFail($leave_id);

        // Validate the form data
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Update the status of the leave application
        $leave->status = $request->input('status');
        $leave->save();

        return redirect()->back()->with('success', 'Leave application status updated.');
    }

    public function leaveHistory()
    {
        $leaveApplications = Leave::where('user_id', auth()->user()->id)->get();
        return view('leave.leave_form', compact('leaveApplications'));
    }

    public function test()
    {
        return view('test');
    }

    public function allLeave()
    {
        $leaveApplications = Leave::all(); // Retrieve all leave records
        return view('leave.all_leave', compact('leaveApplications'));
    }

}

