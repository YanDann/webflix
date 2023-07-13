@extends('layouts.app')

@section('content')
    @section('title')
        A propos - @parent
    @endsection

    @section('content')
        <h1>A propos de {{ $movie->title }} </h1>

        <p>Synopsys : {{ $movie->synopsys }} </p>
        <p>Durée : {{ $movie->duration }} </p>
    @endsection
@endsection