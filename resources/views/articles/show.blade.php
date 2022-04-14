@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $article['title']}}</h1>
    <br>

    <h3>Author: {{ $article->user->name}}</h3>
    <br>
    <h3>Categories:</h3>
    
    @foreach($article->categories as $category) 
        <h3><li>{{$category->category_name}}</li></h3>
    @endforeach 
    <br>

    <h3>Description:</h3>
    <br>
    <div class="container-description">
        <h4>
            {{ $article['description']}}
        </h4>
    </div> 
    <br>

    <h5>Created On: {{ $article['created_at']}}</h5>
    <h5>Last Update: {{ $article['updated_at']}}</h5>

    <a class="btn btn-secondary" href="{{ url('/articles') }}" role="button">Go Back</a>
</div>

@endsection