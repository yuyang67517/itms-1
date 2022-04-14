@extends('layouts.app')

@section('content')



@if(Auth::user()->isAdmin())
<div class="container">
    <h1>This page is for admin to perform CRUD on category only.</h1>

    <form class="form-horizontal" action="/categories" method="POST">
        @csrf
        <div class="form-group">
            <span style="color: red">@error('category_name'){{ $message }}@enderror</span>
            <br>
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