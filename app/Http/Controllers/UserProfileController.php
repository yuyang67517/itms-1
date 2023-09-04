<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;



class UserProfileController extends Controller
{
    public function index()
    {
        
        return view('user.profile');
        return view('user.profile', [
            'user' => Auth::user(),

        ]);
        
        $user = Auth::user(); // Retrieve the authenticated user
        return view('user.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contact' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('profile')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $profilePhotoPath;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->save();

        return redirect('profile')->with('success', 'Profile updated successfully');
    }

    public function updatePhoto(Request $request)
{
    $user = Auth::user();

    if ($request->hasFile('profile_photo')) {
        $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $profilePhotoPath;
        $user->save();
    }

    return redirect('profile')->with('success', 'Profile photo updated successfully');
}

public function showProfile($id)
{
    $user = User::find($id);
    // dd($user);

    if (!$user) {
        // Handle user not found, e.g., display an error message or redirect
        return redirect()->back()->with('error', 'User not found.');
    }

    return view('user.profile', compact('user'));
}



}




