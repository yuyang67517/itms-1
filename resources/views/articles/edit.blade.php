@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Announcement</h2>

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
    <textarea class="form-control" name="description" style="height: 500px;">{{ $article->description }}</textarea>
</div>


        
        <br><br>
        <button type="submit" class="btn btn-secondary">Update</button>
    </form>
    

</div>    

@endsection