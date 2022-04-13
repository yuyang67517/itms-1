@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $article['title']}}</h1>

    <h3>Author: </h3>
    <h3>Categories:</h3>
    <h3>Description:</h3>
    <div class="container-description">
        <h4>
            {{ $article['description']}}
        </h4>
    </div> 

    <h5>Created On: {{ $article['created_at']}}</h5>
    <h5>Last Update: {{ $article['updated_at']}}</h5>
</div>

@endsection