@extends('layouts.app')

@section('content')


<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-headline">Streamline Your Work Management</h1>
            <p class="hero-description">
                Elevate productivity and collaboration with our comprehensive work management platform. Simplify tasks, streamline communication, and stay organized, all in one place.
            </p>
            <p>Sign In Now</p>
            <a href="{{ route('login') }}" class="btn btn-primary hero-cta">Sign In</a>
        </div>
    </div>
</section>


    

@endsection