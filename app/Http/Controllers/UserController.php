<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('user.index', compact('user'));
    }
    */
    public function index()
    {
        // Retrieve all users from the 'users' table
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignedJobs()
{
    // Retrieve and display the list of assigned jobs for the logged-in user.
    // Add your logic to fetch user assignments from the database.
    return view('user.assigned-jobs');
}

public function create()
{
    return view('user.create'); // Create a new Blade view for the user creation form
}

public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:191',
        'email' => 'required|email|unique:users|max:191',
        'password' => 'required|string|min:8',
       
    ]);

    // Create a new user
    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        
    ]);

    // Redirect to a success page or any other desired action
    return redirect()->route('users.index')->with('success', 'User created successfully');

}


}
