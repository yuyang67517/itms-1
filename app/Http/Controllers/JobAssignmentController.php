<?php

namespace App\Http\Controllers;
use App\Rules\UniqueAssignment;
use Illuminate\Http\Request;
use App\Models\JobAssignment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;



class JobAssignmentController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve job assignments based on the selected date, or all if no date is selected.
        $dateFilter = $request->input('date_filter');
    
        // Default to today if 'Today' is selected or no date is selected.
        if ($dateFilter === 'today' || empty($dateFilter)) {
            $selectedDate = Carbon::today()->toDateString();
        } else {
            $selectedDate = $dateFilter;
        }
       
        $jobAssignments = JobAssignment::whereDate('assignment_date', $selectedDate)->get();
        
        // Retrieve a list of unique dates for filtering.
        $uniqueDates = JobAssignment::select(DB::raw('DATE(assignment_date) as date'))
            ->distinct()
            ->pluck('date');
    
        return view('assigned-jobs.index', compact('jobAssignments', 'uniqueDates', 'dateFilter'));
    }
    

public function storeAssignment(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'user_id' => ['required', new UniqueAssignment],
        'job_id' => 'required|exists:jobs,id',
        'assignment_date' => 'required|date',
    ]);

    $jobAssignment = new JobAssignment();
    $jobAssignment->user_id = $validatedData['user_id'];
    $jobAssignment->job_id = $validatedData['job_id'];
    $jobAssignment->assignment_date = $validatedData['assignment_date'];

    // Save the job assignment to the database
    $jobAssignment->save();
    

    // Redirect back to the job assignment form with a success message
    return redirect()->route('admin.assign-jobs')->with('success', 'Job assigned successfully.');
}

}