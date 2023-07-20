@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <form class="w-25 px-3" action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Nom</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="avatar">Avatar</label>
                <input class="form-control" type="file" name="avatar" id="avatar">
                @error('avatar')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="birthday">Date de naissance</label>
                <input class="form-control" type="date" name="birthday" id="birthday">
                @error('birthday')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-dark my-3">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
