@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Here's all the article in <strong>{{ $category['category_name']}}</strong></h1>

    <p>
        @foreach($category->articles as $article) 
            
            <h2><a href = {{ URL::to('articles/' . $article->id) }}>{{$article->title}}</a></h2>

        @endforeach 
    </p>

    <a class="btn btn-secondary" href="{{ url('/categories') }}" role="button">Go Back</a>

</div>    

@endsection