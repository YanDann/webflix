@extends('layouts.app')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div>
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar">
            @error('avatar')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <div>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthday">
            @error('birthday')
                <div> {{ $message }} </div>
            @enderror
        </div>

        <button>Ajouter</button>
    </form>
@endsection
