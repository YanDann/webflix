@extends('layouts.app')

@section('content')
    @section('title')
        A propos - @parent
    @endsection

    @section('content')
        <h1>A propos de {{ $user }} </h1>
        
    @endsection
@endsection