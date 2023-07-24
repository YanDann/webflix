<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Movie;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', ['cart' => Cart::items(), 'total' => Cart::total()]);
    }

    public function store(Movie $movie)
    {
        $cart = session('cart', []);

        // Si le panier contient le produit on incrémente la quantité
        if (collect($cart)->contains('id', $movie->id)) {
            $index = array_search($movie->id, array_column($cart, 'id'));
            $cart[$index]['quantity']++;
            session()->put('cart', $cart); // Mettre à jour la session

            return back();
        }

        // cart est un tableau dans lequel on ajoute un truc
        session()->push('cart', [
            'id' => $movie->id,
            'quantity' => 1,
            'movie' => null,
            'price' => null,
        ]);

        return back();
    }
}
