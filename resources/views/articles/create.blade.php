@extends('layouts.app')

@section('content')

<div class="jumbotron-create">
  <div class="container">
    <h2>Create A New Announcement</h2>
   
    <form class="form-horizontal" action="/articles" method="POST">
      @csrf
      <div class="form-group">
        <span style="color: red">@error('title'){{ $message }}@enderror</span>
        <br>
        <label class="control-label" for="title">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
      </div>
      <div class="form-group">
        <span style="color: red">@error('description'){{ $message }}@enderror</span>
        <br>
        <label class="control-label" for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" placeholder="Enter here" rows="8"></textarea>
      </div>
      <div>
        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
      </div>
      
      <br>
      <div class="form-group">        
        <button type="submit" class="btn btn-primary">Post</button>
      </div>
    </form>
  </div>
</div>

@endsection
