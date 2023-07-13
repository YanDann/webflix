@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="post">
        @csrf

        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value=" {{ old('name') }} ">
        </div>

        <button>Ajouter</button>
    </form>
@endsection
