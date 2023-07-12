@extends('layouts.app')

@section('content')
    @section('title')
        A propos - @parent
    @endsection

    @section('content')
        <h1>A propos de {{ $title }} </h1>

        <ul>
            @foreach ($team as $member)
                <li>
                    <a href="/a-propos/{{ $member['name'] }}"> {{ $member['name'] }} </a>
                </li>
            @endforeach
        </ul>
    @endsection
@endsection