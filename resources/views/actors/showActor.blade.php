@extends('layouts.app')

@section('content')
@section('title')
    {{ $actor->name }} - @parent
@endsection

@section('content')
    <div class="d-flex">
        <div>
            <img class="img-fluid list-movie-img" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
        </div>

        <div>
            <div class="shadow mx-5 w-100">
                <h1> {{ $actor->name }} </h1>
                <p> {{ $actor->birthday }} </p>

                <h2>Films</h2>
                @foreach ($actor->movies as $movie)
                <img class="" src=" {{ $movie['cover'] }} " alt="">
                @endforeach
                
            </div>
        </div>
    </div>
@endsection
