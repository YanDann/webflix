<?php

use App\Http\Controllers\AboutTeam;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JulienFriendController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/julien/{friend?}', [JulienFriendController::class, 'show']);

Route::get('/a-propos', [AboutTeam::class, 'showTeam']);
Route::get('/a-propos/{user}', [AboutTeam::class, 'showTeamMate']);

Route::get('/categories', function() {
    return Category::all();
});

Route::get('/category-test', function() {
    $category = new Category();
    $category->name = 'Action';
    $category->save();

    return $category;
});
