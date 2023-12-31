<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Utilisateurs
        User::factory()->create([
            'email' => 'julien@gmail.com',
        ]);
        User::factory()->create([
            'email' => 'mitch@gmail.com', 'name' => 'Mitch',
        ]);

        // Category::factory(5)->create();
        // Category::factory()->create(['name' => 'Action']);

        // Les catégories dans l'API
        // https://api.themoviedb.org/3/genre/movie/list?api_key=6ace03f0a7215627db0d4ece018a76a8
        $genres = Http::get('https://api.themoviedb.org/3/genre/movie/list', [
            'api_key' => config('services.themoviedb.key'),
            'language' => 'fr-FR',
        ])->throw()->json('genres');

        Category::factory()->createMany($genres);

        // Les films sur l'API
        $results = Http::get('https://api.themoviedb.org/3/movie/now_playing', [
            'api_key' => config('services.themoviedb.key'),
            'language' => 'fr-FR',
        ])->throw()->json('results');

        foreach ($results as $result) {
            // Détails du film (Durée, acteurs, bande annonce)
            $result = Http::get('https://api.themoviedb.org/3/movie/'.$result['id'], [
                'api_key' => config('services.themoviedb.key'),
                'language' => 'fr-FR',
                'append_to_response' => 'videos,credits',
            ])->throw()->json();

            $movie = Movie::factory()->create([
                'title' => $result['title'],
                'synopsys' => $result['overview'],
                'duration' => $result['runtime'],
                'cover' => 'https://image.tmdb.org/t/p/w400'.$result['poster_path'],
                'released_at' => $result['release_date'],
                'youtube' => $result['videos']['results'][0]['key'] ?? null,
                'category_id' => $result['genres'][0]['id'] ?? null,
                'user_id' => User::all()->random(),
            ]);

            foreach (collect($result['credits']['cast'])->take(2) as $cast) {
                $actor = Http::get('https://api.themoviedb.org/3/person/'.$cast['id'], [
                    'api_key' => config('services.themoviedb.key'),
                    'language' => 'fr-FR',
                ])->json();
    
                $actor = Actor::firstOrCreate(['id' => $cast['id']],[
                    'id' => $actor['id'],
                    'name' => $actor['name'],
                    'avatar' => 'https://image.tmdb.org/t/p/w500'.$actor['profile_path'],
                    'birthday' => $actor['birthday'] ?? null,
                ]);

                $movie->actors()->attach($actor);
            }

            Comment::factory()->create([
                'movie_id' => Movie::all()->random(),
                'user_id' => User::all()->random(),
            ]);
        }
    }
}
