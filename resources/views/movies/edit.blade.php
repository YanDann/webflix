@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-3">Modifier {{ $movie->title }}</h1>

    <div class="d-flex align-items-center justify-content-center">
        <div class="align-items-center px-3">
            <img width="300" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        </div>

        <form class="w-50 px-3" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="title">Titre</label>
                <input class="form-control" type="text" name="title" id="title"
                    value="{{ old('title', $movie->title) }}">
                @error('title')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="synopsys">Synopsys</label>
                <textarea class="form-control" name="synopsys" id="synopsys" cols="30" rows="10">{{ old('synopsys', $movie->synopsys) }}</textarea>
                @error('synopsys')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="duration">Durée</label>
                <input class="form-control" type="text" name="duration" id="duration"
                    value="{{ old('duration', $movie->duration) }}">
                @error('duration')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="youtube">Bande annonce - Lien youtube</label>
                <input class="form-control" type="text" name="youtube" id="youtube"
                    value="{{ old('youtube', $movie->youtube) }}">
                @error('youtube')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="cover">Image</label>
                <input class="form-control" type="file" name="cover" id="cover" value="{{ $movie->cover }}">
                @error('cover')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="released_at">Date de sortie</label>
                <input class="form-control" type="date" name="released_at" id="released_at"
                    value="{{ old('released_at', $movie->released_at->format('Y-m-d')) }}">
                @error('released_at')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="category">Catégorie</label>
                <select class="form-control" name="category" id="category">
                    <option disabled selected>Choisir une catégorie</option>
                    @foreach ($categories->sortBy('name') as $category)
                        <option value="{{ $category->id }}" @selected($category->id == old('category', $movie->category_id))>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-dark my-3">Modifier</button>
            </div>
        </form>
    </div>
@endsection
