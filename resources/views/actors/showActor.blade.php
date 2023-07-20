@extends('layouts.app')

@section('content')
@section('title')
    {{ $actor->name }} - @parent
@endsection

@section('content')
    <div class="d-flex">
        <div>
            <img class="img-avatar" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
        </div>

        <div>
            <div class="shadow py-2 px-3 mx-3">
                <div class="mb-3">
                    <h1> {{ $actor->name }} </h1>
                </div>
                <div class="d-flex justify-content-between my-2">
                <p> {{ $actor->getAge() - $actor->birthday->format('Y') }} ans </p>
                </div>
                <h2>Films</h2>
                @foreach ($actor->movies as $movie)
                    <a href="/movie/{{ $movie['id'] }}">
                        <img class="img-movie-actor" src=" {{ $movie['cover'] }} " alt="">
                    </a>
                    <p> {{ $movie->title }} </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
