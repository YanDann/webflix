@extends('layouts.app')

@section('content')
@section('title')
    Login - @parent
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header">Connexion</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div>
                            <ul class="alert alert-danger px-4" style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="" method="post">
                        @csrf
                        <div class="w-50 mx-auto mb-3">
                            <label class="mb-2" for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email"
                                placeholder="Ecrivez votre e-mail" value="{{ old('email') }}">
                        </div>
                        <div class="w-50 mx-auto mb-3">
                            <label class="mb-2" for="password">Mot de passe</label>
                            <input class="form-control" type="password" name="password" id="password"
                                placeholder="Ecrivez votre mot de passe">
                        </div>
                        <div class="w-50 mx-auto mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Se souvenir de movie</label>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-primary">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
