<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::all(),
        ]);
    }

    public function showMovie(string $movieId)
    {
        $movies = Movie::all();
        foreach ($movies as $movie) {
            if ($movieId == (string)$movie->id) {
                return view('movies.showMovie', [
                    'movie' => Movie::find($movieId),
                ]);
            }
        }
        abort(404);
    }

    public function add()
    {
        return view('movies.add');
    }

    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->synopsys = $request->input('synopsys');
        $movie->duration = $request->input('duration');
        $movie->youtube = $request->input('youtube');
        $movie->released_at = $request->input('released_at');
        $movie->save();

        return redirect('/movies');
    }
}
