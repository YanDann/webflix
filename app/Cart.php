<?php 

namespace App;

use App\Models\Movie;

class Cart
{
    public static function count()
    {
        return collect(session('cart', []))->sum('quantity');
    }

    public static function items()
    {
        $cart = session('cart', []); // $_SESSION['cart']
        // [2, 4, 6]
        // [['id' = 2], ['id' = 4], ['id' = 6]]
        $movies = Movie::findMany(array_column($cart, 'id'));
        foreach ($cart as $index => $item) {

            $movie = $movies[$index];
            $cart[$index]['movie'] = Movie::find($item['id']);
            $cart[$index]['price'] = $movie->price * $cart[$index]['quantity'] / 100;
        }

        return $cart;
    }

    public static function total()
    {
        $items = Self::items();
        $total = 0;

        foreach ($items as $item) {
            $total += $item['price'];
        }

        return $total;
    }
}