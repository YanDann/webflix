<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'name' => 'Julien',
        'title' => 'Webflix',
        'numbers' => [1, 2, 3],
    ]);
});

Route::get('/julien/{friend?}', function (Request $request, string $friend = null) {
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
});

Route::get('/a-propos/{user?}', function (string $user = null) {
    $team = ['Yan', 'Ares', 'Guts'];

    if ($user && !in_array($user, $team)) {
        abort(404);
    }

    return view('a-propos', [
        'title' => 'Webflix',
        'teams' => $team,
        'user' => ucfirst($user),
    ]);
});
