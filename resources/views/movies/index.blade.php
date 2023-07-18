@extends('layouts.app')

@section('content')
    @auth {{-- @if (Auth::user()) --}}
        <div class="text-center mb-4">
            <a class="btn btn-primary" href="/movies/add">Créer un film</a>
        </div>
    @endauth

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
        @foreach ($movies as $movie)
            <div class="col d-flex flex-column">
                <img class="img-fluid list-movie-img" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                <div class="d-flex flex-column justify-content-between flex-grow-1">
                    <h3 class="list-movie-title my-2">
                        <a href="/movies/{{ $movie->id }}">
                            {{ $movie->title }}
                        </a>
                    </h3>
                    <p class="list-movie-synopsys"> {{ Str::words($movie->synopsys, 10) }} </p>
                    <p class="list-movie-meta">
                        {{ $movie->duration }} |
                        @if ($movie->released_at)
                        {{ $movie->released_at->translatedFormat('d F Y') }} |
                        @endif
                        {{ $movie->category->name }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    {{ $movies->links() }}
@endsection
