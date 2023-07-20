@extends('layouts.app')

@section('content')
@section('title')
    Actors - @parent
@endsection

@section('content')
    <div class="index-actors">
        <div>
            <h1> Liste des acteurs </h1>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
            @foreach ($actors as $actor)
                <div class="col d-flex flex-column shadow-sm m-2">
                    <a href="/actor/{{ $actor->id }}" style="text-decoration: none; color: black">
                        <img class="img-fluid list-actor-img" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
                        <div class="d-flex flex-column justify-content-between flex-grow1">
                            <h3 class="list-actor-name my-2">{{ $actor->name }}</h3>
                            @if ($actor->birthday != null)
                                <p> {{ $actor->getAge() - $actor->birthday->format('Y') }} ans </p>
                            @endif
                        </div>
                    </a>
                    <div class="text-center">
                        <a href="/actor/{{ $actor->id }}/modifier" class="btn btn-lg"
                            style="font-size: 18px">🖋️</a>
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
@endsection
