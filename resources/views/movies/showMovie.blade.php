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
@endsection
