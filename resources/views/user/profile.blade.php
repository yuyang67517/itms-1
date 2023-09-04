@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile</h2>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="profile_photo">Profile Photo</label>
            <div class="profile-photo">
                @if ($user ?? '' && $user ?? ''->profile_photo)
                    <img src="{{ asset('storage/' . $user ?? ''->profile_photo) }}" alt="Profile Photo" class="profile-image">
                @else
                    <img src="{{ asset('path_to_default_image.jpg') }}" alt="Default Profile Photo" class="profile-image">
                @endif
                <input type="file" id="profile_photo" name="profile_photo" class="form-control-file">
            </div>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="contact" id="contact" name="contact" value="{{ Auth::user()->contact }}" class="form-control" required>
        </div>

        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-details">
        <label for="id">User ID:</label> <span>{{ Auth::user()->id }}</span><br>
        <label for="created_at">Joined At:</label> <span>{{ Auth::user()->created_at }}</span><br>
        <label for="role">Current Role:</label> <span>{{ Auth::user()->role }}</span><br>
        <label for="status">Current Status:</label> <span>{{ Auth::user()->status }}</span><br>
    </div>
</div>
@endsection

<style>
    .profile-photo {
        display: flex;
        align-items: center;
    }

    .profile-image {
        max-width: 100px;
        margin-right: 20px;
    }

    .profile-details {
        margin-top: 20px;
    }
</style>
