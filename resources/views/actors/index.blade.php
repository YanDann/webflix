@extends('layouts.app')

@section('content')
@section('title')
    Actors - @parent
@endsection

@section('content')
    <div>
        <h1> Liste des acteurs </h1>
    </div>


    <div class="row row-cols1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
        @foreach ($actors as $actor)
            <div class="col d-flex flex-column shadow m-3">
                <a href="/actor/{{ $actor->id }}" style="text-decoration: none; color: black">
                    <img class="img-fluid list-movie-img" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
                    <div class="d-flex flex-column justify-content-between flex-grow1">
                        <h3 class="list-actor-name my-2">{{ $actor->name }}</h3>
                        @if ($actor->birthday != null)
                            <p> {{ $actor->getAge() - $actor->birthday->format('Y') }} ans </p>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
