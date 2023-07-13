@extends('layouts.app')

@section('content')
    <h1>Nos catégories</h1>
    <a href="/categories/creer">Créer une categorie</a>

    <ul>
        @foreach ($categories as $category)
            <li> {{ $category->name }} </li>
        @endforeach
    </ul>
@endsection