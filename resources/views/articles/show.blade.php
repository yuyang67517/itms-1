@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1 class="display-4">{{ $article['title'] }}</h1>

    <div class="my-3">
        <h3 class="font-weight-bold">Announce By: {{ $article->user->name }}</h3>
    </div>


    <hr>

    <h3 class="card-title">Messages:</h3>

    <div class="card my-4">
        <div class="card-body" style="min-height: 200px;">
            
            <div class="container-description mt-3">
                <p class="card-text" style="font-size: 18px;">{{ $article['description'] }}</p>
            </div>
        </div>
    </div>

    <div class="my-4">
        <h5>Created On: {{ $article['created_at'] }}</h5>
        <h5>Last Update: {{ $article['updated_at'] }}</h5>
    </div>

    <a class="btn btn-secondary" href="{{ url('/articles') }}" role="button">Go Back</a>
</div>

@endsection
