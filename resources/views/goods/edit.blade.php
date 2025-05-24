@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Good</h1>
    <form method="POST" action="{{ route('goods.update', $good->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $good->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="6"readonly>{{ $good->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $good->price }}" readonly>
        </div>
        <div class="form-group">
            <label for="updated_at">Last Updated:</label>
            <input type="timestamp" class="form-control" id="updated_at" name="updated_at" value="{{ $good->updated_at }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $good->quantity }}" required>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-secondary" href="{{ url('/goods') }}" role="button">Go Back</a>
    </form>
  
</div>
@endsection
