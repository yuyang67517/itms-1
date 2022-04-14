@extends('layouts.app')

@section('content')


<div class="jumbotron-create">
  <div class="container">
    <h2>Create A New Article</h2>
   
    <form class="form-horizontal" action="/articles" method="POST">
    @csrf
      <div class="form-group">
        <span style="color: red">@error('title'){{ $message }}@enderror</span>
        <br>
        <label class="control-label col-sm-2" for="title">Title:

        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="text" placeholder="Enter title" name="title">
        </div>
      </div>
      <div class="form-group-description">
      <span style="color: red">@error('description'){{ $message }}@enderror</span>
        <br>
        <label class="control-label col-sm-2" for="description">Description:</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" rows="8" id="description" name="description" placeholder="Enter here" style="height: 200px; align-text-top;">
        </div>
      </div>
      <div>
        <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
    </div>
      <div class="form-group-category">
        <label class="control-label col-sm-2" for="description">Category</label>
          <div class="col-sm-10">          
            <select class="form-select" name="categories[]" multiple = "true" aria-label="Default select example">
            
        @foreach($categories as $category)
            <option value = "{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
  
            </select>
          </div>
      </div>

      <div class="form-group">        
          <div class="col-auto my-1">
          <button type="submit" class="btn btn-primary">Post</button>
          </div>
      </div>
    </form>
  </div>
</div>


@endsection
