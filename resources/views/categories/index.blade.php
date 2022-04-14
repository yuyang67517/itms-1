@extends('layouts.app')

@section('content')
<div class="container">

    <div class="container-fluid">

        <h1> Browse by Category</h1>
        @foreach ($category as $value)

            <div class="container-crud">
       
                <h3><a href = {{ URL::to('categories/' . $value->id) }}>{{$value['category_name']}}</a>
                <br>
                @if(Auth::user()->isAdmin())
                        <a class="btn btn-secondary btn-lg" href = {{ URL::to('categories/' . $value->id . '/edit') }}>Edit</a>
                        <form class="btn btn-danger btn-sm" action="{{url('categories/'.$value->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                        
                @endif 
                </h3>  
                
                

            </div>          
        @endforeach
        

    </div>
</div>
@endsection











