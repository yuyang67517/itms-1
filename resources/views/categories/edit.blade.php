@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="{{ route('categories.update', $category->id) }}">
        @method('PATCH')
        @csrf

        <div class="form-group mb-2">
            <label for="name">Original Category Name:</label>
            <input type="text" class="form-control" readonly name="category_name" value="{{ $category->category_name }}" />
        </div>

        <div class="form-group mb-2">
            <span style="color: red">@error('category_name'){{ $message }}@enderror</span>
            <br>
            <label for="name">New Category Name:</label>
            <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" />
        </div>
        

        <button type="submit" class="btn btn-secondary">Update</button>
    </form>
    
</div>    

@endsection