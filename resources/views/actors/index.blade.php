@extends('layouts.app')

@section('content')
@section('title')
    Actors - @parent
@endsection

@section('content')
    <div>
        <h1> Liste des acteurs </h1>
    </div>


    <div class="row row-cols1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-5">
        @foreach ($actors as $actor)
        <div class="col d-flex flex-column">
            <img src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
        </div>
        @endforeach
    </div>
    
@endsection
