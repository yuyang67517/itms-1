<!-- resources/views/user/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Users</h2>
    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card">
                
                    <a href="{{ route('user.profile', ['id' => $user->id]) }}">
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="card-img-top">
                    </a>
                  

                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}, {{ $user->id }}</h5>
                       
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
