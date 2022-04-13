@extends('layouts.app')

@section('content')

<div class="jumbotron-up">

  <h1 class="display-4">Hello, world!</h1>
  <h2 class="display-4">Browse one of our articles below</h2> 
  <p></p>
  <!-- 
  <a class="btn btn-primary btn-lg" href="{{ URL::to('articles/create' ) }}" role="button">Add Article</a>
  --> 
    <div class="container-fluid">
      <div class="container-article">

        @foreach($articles as $article)

          <div class="jumbotron">    
            <h2>{{$article['title']}}</h2>
            <h6>{{$article['description']}}</h6>
            <a href = {{ URL::to('articles/' . $article->id) }}>Show More..</a>
            <a href = {{ URL::to('articles/' . $article->id . '/edit') }}>Edit</a>
            <p></p>
          </div>                
        @endforeach
        
    </div>
</div>  

@endsection