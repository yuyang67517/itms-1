@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Here's all the article in <strong>{{ $category['category_name']}}</strong></h1>

    <p>
        @foreach($category->articles as $article) 
            <h3>{{$article->title}}</h3>
        @endforeach 
    </p>

</div>    

@endsection