@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add User</h2>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
