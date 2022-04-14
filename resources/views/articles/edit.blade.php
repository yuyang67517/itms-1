@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Article</h2>

    <form method="post" action="{{ route('articles.update', $article->id) }}">
        @method('PATCH')
        @csrf


        <div class="form-group">
            <span style="color: red">@error('title'){{ $message }}@enderror</span>
            <br>
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $article->title }}" />
        </div>

        <div class="form-group">
            <span style="color: red">@error('description'){{ $message }}@enderror</span>
            <br>
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" value="{{ $article->description }}" />
        </div>

        <div class="form-group">
        <label class="control-label " for="description">Category</label>
          <div class="col-md-10">          
            <select class="form-select" aria-label="Default select example" name = "categories[]" multiple = "true">
                @foreach($categories as $category) 
                    <option value = "{{ $category->id }}" {{ $article->categories->contains($category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach 
            </select>
            
          </div>
        </div>  
        <br><br>
        <button type="submit" class="btn btn-secondary">Update</button>
    </form>
    

</div>    

@endsection