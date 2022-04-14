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

          <div class="jumbotron mb-2">    
            <h2>{{$article['title']}}</h2>
            <h6>{{$article['description']}}</h6>
            <a class="btn btn-primary btn-lg" href={{ URL::to('articles/' .$article->id) }}>Show More</a>
            @can('delete', $article)
            <a class="btn btn-success btn-lg" href = {{ URL::to('articles/' . $article->id . '/edit') }}>Edit</a>
            <form class="btn btn-danger btn-sm" action="{{url('articles/'.$article->id)}}" method="post">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>
            </form> 
            @endcan
          </div>                
        @endforeach
        
    </div>
</div>  

@endsection