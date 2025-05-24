@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Goods</h1>
    @if (Auth::check() && Auth::user()->role == "admin")

    <a class="btn btn-success float-right" href="{{ route('goods.create') }}">Create New Good</a>
                    
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Good ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goods as $good)
            <tr>
                <td>{{ $good->id }}</td>
                <td>{{ $good->name }}</td>
                <td>{{ $good->description }}</td>
                <td>{{ $good->price }}</td>
                <td>{{ $good->quantity }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('goods.edit', $good->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    
                    @if (Auth::check() && Auth::user()->role == "admin")
                    
                        <form action="{{ route('goods.destroy', $good->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    @endif
                </td>
                <td>{{ $good->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
