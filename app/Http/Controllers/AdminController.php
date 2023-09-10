<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Leave;
use App\Models\Job;
use App\Models\JobAssignment;

class AdminController extends Controller
{
    public function viewLeaveApplications()
{
    $leaveApplications = Leave::all(); // Retrieve all leave applications
    return view('admin.leave.index', compact('leaveApplications'));
}

public function approveLeave($id)
{
    $leave = Leave::findOrFail($id);
    $leave->status = 'approved';
    $leave->save();
    return redirect()->back()->with('success', 'Leave application approved.');
}

public function rejectLeave($id)
{
    $leave = Leave::findOrFail($id);
    $leave->status = 'rejected';
    $leave->save();
    return redirect()->back()->with('success', 'Leave application rejected.');
}

public function createJob()
{
    return view('admin.create-job');
}

public function storeJob(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_description' => 'required|string',
        // Add validation rules for other fields as needed
    ]);

    // Create a new job instance and populate it with the validated data
    $job = new Job();
    $job->job_title = $validatedData['job_title'];
    $job->job_description = $validatedData['job_description'];
    $job->job_status = 'pending'; // You can set the initial status here, or use a default value in your database schema
    // Add other fields as needed

    // Save the job to the database
    $job->save();

    // Redirect back to the job creation form with a success message
    return redirect('/admin/create-job')->with('success', 'Job created successfully.');

}

public function assignJobs()
{
    // Get all jobs
    $jobs = Job::all();

    // Get all users
    $users = User::all();

    return view('admin.assign-jobs', compact('jobs', 'users'));
}

public function storeAssignment(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'job_id' => 'required|exists:jobs,id',
        'assignment_date' => 'required|date',
    ]);

    // Create a new job assignment
    $jobAssignment = new JobAssignment($validatedData);
    
    // Save the job assignment to the database
    $jobAssignment->save();

    // Redirect back to the assignment page with a success message
    return redirect()->route('admin.assign-jobs')->with('success', 'Assignment saved successfully.');
}

/*
public function index()
{
    $leaveApplications = Leave::where('leave_id', auth()->user()->id)->get(); // Use 'id' for user ID

    return view('leave.leave_form', compact('leaveApplications'));
}
*/

}