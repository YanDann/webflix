@extends('layouts.app')

@section('content')
    <form class="w-50 m-auto" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="title">Titre</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="synopsys">Synopsys</label>
            <textarea class="form-control" name="synopsys" id="synopsys" cols="30" rows="10"></textarea>
            @error('synopsys')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="duration">Durée</label>
            <input class="form-control" type="text" name="duration" id="duration">
            @error('duration')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="youtube">Bande annonce - Lien youtube</label>
            <input class="form-control" type="text" name="youtube" id="youtube">
            @error('youtube')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="cover">Image</label>
            <input class="form-control" type="file" name="cover" id="cover">
            @error('cover')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="released_at">Date de sortie</label>
            <input class="form-control" type="date" name="released_at" id="released_at">
            @error('released_at')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="category">Catégorie</label>
            <select class="form-control" name="category" id="category">
                <option disabled selected>Choisir une catégorie</option>
                @foreach ($categories->sortBy('name') as $category)
                    <option value="{{ $category->id }}" @selected($category->id == old('category'))> {{ $category->name }} </option>
                @endforeach
            </select>
            @error('category')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div class="text-center">
            <button class="btn btn-dark my-3">Ajouter</button>
        </div>
    </form>
@endsection
