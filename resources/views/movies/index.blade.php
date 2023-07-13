@extends('layouts.app')

@section('content')
    <h1>Nos films</h1>
    <a href="/movies/add">Ajouter un film</a>

    <ul>
        @foreach ($movies as $movie)
            <div>
                <h3> {{ $movie->title }} </h3>
                <p> {{ $movie->synopsys }} </p>
                <p>Durée : {{ $movie->duration }} </p>
                <p>Sortie : {{ $movie->released_at }} </p>
                <p>Catégorie : {{ $movie->category_id }} </p>
            </div>

            <a href="/movies/{{$movie->id}}">Voir</a>
        @endforeach
    </ul>
@endsection
