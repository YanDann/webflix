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
                <p> {{ $actor->getAge() - $actor->birthday->format('Y') }} ans </p>

                <h2>Films</h2>
                @foreach ($actor->movies as $movie)
                    <a href="/movie/{{ $movie['id'] }}">
                        <img class="" src=" {{ $movie['cover'] }} " alt="">
                    </a>
                    <p> {{ $movie->title }} </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
