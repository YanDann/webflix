@extends('layouts.app')

@section('content')
@section('title')
    Actors - @parent
@endsection

@section('content')
    @auth {{-- @if (Auth::user()) --}}
        <div class="text-center mb-4">
            <a class="btn btn-dark" href="/actors/create">Ajouter un acteur</a>
        </div>
    @endauth
    <div class="index-actors">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
            @foreach ($actors as $actor)
                <div class="col d-flex flex-column">
                    <a href="/actor/{{ $actor->id }}" style="text-decoration: none; color: black">
                        <img class="img-fluid list-movie-img" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                            <h3 class="list-actor-name my-2">{{ $actor->name }}</h3>
                            @if ($actor->birthday != null)
                                <p> {{ $actor->getAge() - $actor->birthday->format('Y') }} ans </p>
                            @endif
                        </div>
                    </a>
                    <div class="text-center">
                        <a href="/actor/{{ $actor->id }}/modifier" class="btn btn-lg" style="font-size: 18px">🖋️</a>
                        <form class="d-inline" action="/actor/{{ $actor->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-lg" style="font-size: 18px">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $actors->links() }}
@endsection
