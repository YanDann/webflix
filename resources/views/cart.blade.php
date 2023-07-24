@extends('layouts.app')

@section('content')
    <div>
        @forelse ($cart as $item)
            <div class="d-flex mb-4 align-items-center">
                <img class="img-fluid" src="{{ $item['movie']->cover }}" alt="" width="150">
                <div class="ms-3">
                    <h6>
                        {{ $item['movie']->title }}
                        <strong>x{{ $item['quantity'] }}</strong>
                    </h6>
                    <p> {{ $item['price'] }} €</p>
                </div>
            </div>
        @empty
            <h1 class="text-center">Votre panier est vide</h1>
        @endforelse ($cart as $item)

        <p>Total du panier : {{ App\Cart::total() }} €</p>
    </div>
@endsection
