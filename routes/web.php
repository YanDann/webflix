<?php

use App\Http\Controllers\AboutTeam;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JulienFriendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Models\Category;
use App\Models\Movie;
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

// Webflix

Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/creer', [CategoryController::class, 'create']);
Route::post('/categories/creer', [CategoryController::class, 'store']);

Route::get('/category-test', function() {
    $category = new Category();
    $category->name = 'Action';
    $category->save();

    return $category;
});

// Movies
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'showMovie']);
Route::get('/movies/add', [MovieController::class, 'add'])->middleware('auth');
Route::post('/movies/add', [MovieController::class, 'store'])->middleware('auth');  
Route::get('/movie/{movie}/modifier', [MovieController::class, 'edit'])->middleware('auth');
Route::put('/movie/{movie}/modifier', [MovieController::class, 'update'])->middleware('auth'); 
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->middleware('auth');

// Comments
Route::put('/movie/{id}', [CommentController::class, 'send'])->middleware('auth');

// Actors
Route::get('/actors', [ActorController::class, 'index']);
Route::get('/actor/{id}', [ActorController::class, 'showActor']);
Route::get('/actors/create', [ActorController::class, 'create'])->middleware('auth');
Route::post('/actors/create', [ActorController::class, 'store'])->middleware('auth');
Route::get('/actor/{actor}/modifier', [ActorController::class, 'edit'])->middleware('auth');
Route::put('/actor/{actor}/modifier', [ActorController::class, 'update'])->middleware('auth'); 
Route::delete('/actor/{id}', [ActorController::class, 'destroy'])->middleware('auth');

// php artisan route:list => voir toutes les routes du projet

// Authentification
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destroy']);

// Mon compte
Route::get('/mon-compte', [AccountController::class, 'index'])->middleware('auth');

// Panier
Route::get('/panier', [CartController::class, 'index']);
Route::post('/panier/{movie}', [CartController::class, 'store']);

// Pages avec React
Route::get('/movies-avec-react', [MovieController::class, 'react']);

// API
Route::get('/api/movies', function (){
    $movies = Movie::with('category', 'actors')->paginate(4);

    return $movies;
});
