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

Route::get('/a-propos', function () {
    $team = [
        ['name' => 'Yan',],
        ['name' => 'Ares',],
        ['name' => 'Guts',],
    ];

    return view('a-propos', [
        'title' => 'Webflix',
        'team' => $team,
    ]);
});

Route::get('/a-propos/{user}', function (string $user) {
    return view('about-show', ['user' => $user]);
});
