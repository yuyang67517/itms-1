@extends('layouts.app')

@section('content')

<div class="jumbotron-home">
  <div class="jumbotron-up">
    <div class="container-title">
      <div class="container-title text-center">
        <h1 class="display-4">Important Announcement</h1>
 
    </div> 
    <div class="container-fluid">
      <div class="container-article">

        @foreach($articles as $article)
          <div class="card mb-4 custom-card" style="background-color: #e8e8e8; border: 1px solid #ced4da;"> <!-- Apply the custom-card class -->
          
            <div class="card-body">
              <h2 class="card-title">{{$article['title']}}</h2>
              <h6 class="card-subtitle mb-2 text-muted">{{$article['description']}}</h6>
              <a class="btn btn-primary btn-lg" href="{{ URL::to('articles/' .$article->id) }}">Show More</a>
              @can('delete', $article)
                <a class="btn btn-success btn-lg" href="{{ URL::to('articles/' . $article->id . '/edit') }}">Edit</a>
                <form class="btn btn-danger btn-sm" action="{{url('articles/'.$article->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form> 
              @endcan
            </div>
          </div>                
        @endforeach
      </div>
    </div>
  </div>  
</div>
@endsection
