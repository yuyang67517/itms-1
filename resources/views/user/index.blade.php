@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Staff Profile</h2>
    <div class="container">

    <a href="{{ route('user.create') }}" class="btn btn-primary mb-4">Add User</a>
    <div class="row">
     
        @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <a href="{{ route('user.profile', ['id' => $user->id]) }}">
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="card-img-top" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%; margin: auto;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} ({{ $user->id }})</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
