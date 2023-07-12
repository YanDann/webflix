<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class JulienFriendController extends Controller
{
    public function show(Request $request, string $friend = null)
    {
        // Pour les paramètres get...
        dump($_GET['color'] ?? null); // Ancienne méthode...
        dump($request->input('color', 'red')); // Nouvelle méthode...
        dump(request('color')); // Methode rapide...

        return view('julien', [
            'age' => Carbon::parse('1994-03-20')->age,
            'color' => $request->input('color', 'red'),
            //'color' => request('color'),
            'friend' => ucfirst($friend),
        ]);
    }
}
