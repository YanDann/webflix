@extends('layouts.app')

@section('content')
    <form action="" method="post">
        @csrf
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title') 
            <div> {{ $message }} </div>
        @enderror
        <br>
        <label for="synopsys">Synopsys</label>
        <textarea name="synopsys" id="synopsys" cols="30" rows="10"></textarea>
        @error('synopsys') 
            <div> {{ $message }} </div>
        @enderror
        <br>
        <label for="duration">Durée</label>
        <input type="text" name="duration" id="duration">
        @error('duration') 
            <div> {{ $message }} </div>
        @enderror
        <br>
        <label for="youtube">Bande annonce - Lien youtube</label>
        <input type="text" name="youtube" id="youtube">
        @error('youtube') 
            <div> {{ $message }} </div>
        @enderror
        <br>
        <label for="released_at">Date de sortie</label>
        <input type="date" name="released_at" id="released_at">
        @error('released_at') 
            <div> {{ $message }} </div>
        @enderror
        <br>
        <label for="category">Catégorie</label>
        <select name="category" id="category">
            @foreach ($categories->sortBy('name') as $category)
                <option value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
        </select>
        @error('category') 
            <div> {{ $message }} </div>
        @enderror
        <br>
        <button>Ajouter</button>
    </form>
@endsection
