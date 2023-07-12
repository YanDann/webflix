@extends('layouts.app')

@section('content')
    <h1>Hello Julien</h1>

    <p>Tu as {{ $age }} ans</p>

    @if ($age >= 18)
        <p>Tu es majeur(e).</p>
    @endif

    <p>Ta couleur : {{ $color }} </p>

    @if ($friend)
        <p>Julien fais une Freehold +20 avec {{ $friend }} </p>
    @endif
@endsection
