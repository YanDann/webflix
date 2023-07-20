@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-5">Modifier l'acteur : {{ $actor->name }} </h1>

    <div class="d-flex align-items-center justify-content-center">
        <div class="align-items-center px-3">
            <img width="300" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
        </div>

        <form class="w-25 px-3" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="name">Nom</label>
                <input class="form-control" type="text" name="name" id="name"
                    value="{{ old('name', $actor->name) }}">
                @error('name')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="avatar">Avatar</label>
                <input class="form-control" type="file" name="avatar" id="avatar" value="{{ $actor->avatar }}">
                @error('avatar')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="birthday">Date de naissance</label>
                @if ($actor->birthday != null)
                    <input class="form-control" type="date" name="birthday" id="birthday"
                        value="{{ old('birthday', $actor->birthday->format('Y-m-d')) }}">
                @endif
                @if ($actor->birthday == null)
                    <input class="form-control" type="date" name="birthday" id="birthday" value="">
                @endif
                @error('birthday')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-dark my-3">Modifier</button>
            </div>
        </form>
    </div>
@endsection
