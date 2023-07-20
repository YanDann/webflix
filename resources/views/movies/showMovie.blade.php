@extends('layouts.app')

@section('content')
@section('title')
    {{ $movie->title }} - @parent
@endsection

@section('content')
    <div class="d-flex">
        <div>
            <img src=" {{ $movie->cover }} " alt=" {{ $movie->title }} ">
        </div>
        <div class="w-100">
            <div class="shadow p-4 mx-4 mb-5">
                <div class="mb-3">
                    <h1> {{ $movie->title }} </h1>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <p>⏲ : {{ $movie->duration }} </p>
                    <p>|</p>
                    <p>📅 : {{ $movie->released_at->format('Y-m-d') }} </p>
                    <p>|</p>
                    <p>📂 : {{ $movie->category->name }} </p>
                </div>

                <p> {{ $movie->synopsys }} </p>

                @if ($movie->youtube)
                    <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Voir Bande-annonce
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bande annonce</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" width="1020" height="630"
                                            src="https://www.youtube.com/embed/{{ $movie->youtube }}"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($movie->actors) > 0)
                    <div>
                        <h2>Acteurs</h2>
                        <div class="row row-cols1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                            @foreach ($movie->actors as $actor)
                                <div class="col d-flex flex-column mr-3 mt-1">
                                    <a href="/actor/{{ $actor['id'] }}">
                                        <img class="img-fluid list-actor-img" src=" {{ $actor['avatar'] }} "
                                            alt="">
                                    </a>
                                    <p> {{ $actor->name }} </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>


            <div>
                <div class="shadow p-4 mx-4">
                    <form action="" method="post">
                        @csrf
                        @method('put')

                        <div>
                            <label class="form-label" for="comment">Message</label>
                            <textarea class="form-control" name="comment" id="comment" cols="30" rows="5"></textarea>
                        </div>

                        <div>
                            <label class="form-label" for="note">Note</label>
                            <select class="form-control" name="note" id="note">
                                @for ($i = 0; $i <= 5; $i++)
                                    <option value="{{ $i }} / 5">
                                        {{ $i }} / 5
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-dark my-3">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
