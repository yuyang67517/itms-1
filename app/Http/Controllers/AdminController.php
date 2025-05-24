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
    // Retrieve existing jobs
    $existingJobs = Job::all();

    return view('admin.create-job', compact('existingJobs'));
}


public function storeJob(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_description' => 'required|string',
        
    ]);

    // Create a new job instance and populate it with the validated data
    $job = new Job();
    $job->job_title = $validatedData['job_title'];
    $job->job_description = $validatedData['job_description'];
    

    // Save the job to the database
    $job->save();

    // Redirect back to the job creation form with a success message
    return redirect('/admin/create-job')->with('success', 'Job created successfully.');

}
public function updateJob(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_description' => 'required|string',
        // Add validation rules for other fields as needed
    ]);

    // Find the job by ID
    $job = Job::findOrFail($id);

    // Update the job with the new data
    $job->update([
        'job_title' => $validatedData['job_title'],
        'job_description' => $validatedData['job_description'],
        // Update other fields as needed
    ]);

    // Redirect back to the job creation form with a success message
    return redirect('/admin/create-job')->with('success', 'Job updated successfully.');
}


public function editJob($id)
{
    // Retrieve the job by ID
    $job = Job::findOrFail($id);

    // Return a view for editing the job, passing the job data
    return view('admin.edit-job', compact('job'));
}


public function deleteJob($id)
{
    // Retrieve the job by ID
    $job = Job::withTrashed()->findOrFail($id);

    // Soft delete the job
    $job->delete();

    // Redirect back to the create-job page with a success message
    return redirect('/admin/create-job')->with('success', 'Job deleted successfully.');
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