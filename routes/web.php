<?php

use App\Http\Controllers\AboutTeam;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JulienFriendController;
use App\Http\Controllers\MovieController;
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

Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/creer', [CategoryController::class, 'create']);
Route::post('/categories/creer', [CategoryController::class, 'store']);

Route::get('/category-test', function() {
    $category = new Category();
    $category->name = 'Action';
    $category->save();

    return $category;
});

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/add', [MovieController::class, 'add']);
Route::post('/movies/add', [MovieController::class, 'store']);
Route::get('/movies/{id}', [MovieController::class, 'showMovie']);

