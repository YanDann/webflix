@extends('layouts.app')

@section('content')
@section('title')
    A propos - @parent
@endsection

@section('content')
    <div>
        <h1> {{ $movie->title }} </h1>
        <p> {{ $movie->synopsys }} </p>
        <p>Durée : {{ $movie->duration }} </p>
        <p>Sortie : {{ $movie->released_at }} </p>
        <p>Catégorie : {{ $movie->category_id }} </p>
    </div>

    <div>
        <h2>Acteurs</h2>
        <div class="row row-cols1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
            @foreach ($movie->actors as $actor)
                <div class="col d-flex flex-column shadow m-3">
                    <a href="/actor/{{ $actor['id'] }}">
                        <img class="img-fluid list-movie-img" src=" {{ $actor['avatar'] }} " alt="">
                    </a>
                    <p> {{ $actor->name }} </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
