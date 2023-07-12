@extends('layouts/app')

@section('content')
    @section('title')
        Accueil - @parent
    @endsection

    @section('content')
    <h1>{{ $title }}</h1>

    <p>Bonjour, {{ $name }}</p>
    <ul>
        @foreach ($numbers as $number)
            <li> {{ $number }} </li>
        @endforeach
    </ul>
    @endsection
@endsection
