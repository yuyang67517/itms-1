<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function showForm()
    {
        return view('feedback');
    }

    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'type' => 'required|in:suggestion,complaint,issue,other',
            'message' => 'required|string',
        ]);
    
        $feedback = new Feedback();
        $feedback->type = $validatedData['type'];
        $feedback->message = $validatedData['message'];
        $feedback->save();
    
        return redirect('/feedback')->with('success', 'Feedback submitted successfully!');
    }

    public function index()
{
    $feedback = Feedback::all(); // Fetch all feedback entries
    return view('feedback.index', compact('feedback'));
}

public function filter(Request $request)
{
    /*
    $type = $request->input('type');

    $query = Feedback::query();

    // Check if type is provided and filter
    if ($type) {
        $query->where('type', $type);
    }
    

    $feedback = $query->get();

    return view('feedback.index', compact('feedback'));
    */
    

    $status = $request->input('status');

    $feedback = Feedback::query();

    if ($status) {
        $feedback->where('status', $status);
    }

    $feedback = $feedback->get();

    return view('feedback.index', compact('feedback'));
}

public function markAsRead(Feedback $feedback)
{
    $feedback->status = 'read';
    $feedback->save();

    return redirect()->route('feedback.index')->with('success', 'Feedback marked as read.');
}

public function show($feedback_id)
{
    $feedback = Feedback::where('feedback_id', $feedback_id)->first(); // Use 'feedback_id' as the column name

    if (!$feedback) {
        // Handle the case where the feedback with the provided ID doesn't exist
        abort(404);
    }

    return view('feedback.show', ['feedback' => $feedback]);
}

}

