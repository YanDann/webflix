@extends('layouts.app')

@section('content')
    @section('title')
        A propos - @parent
    @endsection

    @section('content')
        <h1>A propos de {{ $title }} </h1>

        <ul>
            @foreach ($teams as $member)
                <li> {{ $member }} </li>
            @endforeach
        </ul>

        @if ($user)
            <p> {{ $user }} est séléctionné </p>
        @endif
        
    @endsection
@endsection