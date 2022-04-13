@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Adding of Category is for admin only. Normal user will not have the right to add new category.</h2>
    <h3>Don't worry, we will try to open this function in near future.</h3>
    <a class="btn btn-secondary" href="{{ url('/') }}" role="button">Go Back</a>
</div>

<p></p>

@if(Auth::user()->isAdmin())
<div class="container">
    <h2>This page is for admin to perform CRUD on category only.</h2>

    <form class="form-horizontal" action="/categories" method="POST">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="categories">Category Name:</label>
            <div class="col-sm-10">          
            <input type="text" class="form-control" id="category" name="category_name" placeholder="Enter name here">
            </div>
        </div>

        <div class="form-group">        
            <div class="col-auto my-1">
            <button type="submit" class="btn btn-secondary">ADD</button>
            </div>
        </div>
        </form>
</div>
@endif

@endsection