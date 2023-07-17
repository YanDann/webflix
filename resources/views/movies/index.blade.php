@extends('layouts.app')

@section('content')
    <h1>Nos films</h1>
    {{-- <a href="/movies/add">Ajouter un film</a> --}}

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
        @foreach ($movies as $movie)
        <div class="col">
            <img class="img-fluid list-movie-img" src="{{ $movie->cover }}"  alt="{{ $movie->title }}">
                    <div class="d-flex flex-column justify-content-between list-movie-content">
                    <h3 class="list-movie-title my-2">
                        <a href="/movies/{{ $movie->id }}">
                            {{ $movie->title }}
                        </a>
                    </h3>
                    <p class="list-movie-synopsys"> {{ Str::words($movie->synopsys, 10) }} </p>
                    <p class="list-movie-meta">
                        {{ $movie->duration }} |
                        {{ $movie->released_at->translatedFormat('d F Y') }} |
                        {{ $movie->category->name }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
