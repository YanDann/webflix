@extends('layouts.app')

@section('content')
    <h1>Nos films</h1>
    <a href="/movies/add">Ajouter un film</a>

    <ul>
        @foreach ($movies as $movie)
            <li> {{ $movie }} </li>
        @endforeach
    </ul>
    
@endsection