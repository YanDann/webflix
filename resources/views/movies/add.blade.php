@extends('layouts.app')

@section('content')
    <form action="" method="post">
        @csrf
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="synopsys">Synopsys</label>
        <textarea name="synopsys" id="synopsys" cols="30" rows="10"></textarea>
        <br>
        <label for="duration">Durée</label>
        <input type="text" name="duration" id="duration">
        <br>
        <label for="youtube">Bande annonce - Lien youtube</label>
        <input type="text" name="youtube" id="youtube">
        <br>
        <label for="released_at">Date de sortie</label>
        <input type="text" name="released_at" id="released_at">
        <br>
        <button>Ajouter</button>
    </form>
@endsection
