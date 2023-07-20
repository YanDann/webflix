@extends('layouts.app')

@section('content')
@section('title')
    A propos - @parent
@endsection

@section('content')
    <div>
        <h1> {{ $movie->title }} </h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Voir Bande-annonce
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Bande annonce</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/{{ $movie->youtube }}"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <p> {{ $movie->synopsys }} </p>
        <p>Durée : {{ $movie->duration }} </p>
        <p>Sortie : {{ $movie->released_at }} </p>
        <p>Catégorie : {{ $movie->category->name }} </p>
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
