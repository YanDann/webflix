<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::paginate(10),
        ]);
    }

    public function showMovie(string $movieId)
    {
        $movie = Movie::findOrFail($movieId);

        return view('movies.showMovie', ['movie' => $movie]);
        // $movies = Movie::all();
        // foreach ($movies as $movie) {
        //     if ($movieId == (string)$movie->id) {
        //         return view('movies.showMovie', [
        //             'movie' => Movie::find($movieId),
        //         ]);
        //     }
        // }
        // abort(404); Méthode newbie ! Trop lourd
    }

    public function add()
    {
        return view('movies.add', [
            'categories' => Category::all(),
            'movies' => Movie::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies|min:2',
            'synopsys' => 'required|min:10',
            'duration' => 'required|integer|min:1',
            'youtube' => 'nullable|string',
            'cover' => 'required|image|max:2048',
            'released_at' => 'nullable|date',
            'category' => 'required|exists:categories,id',
        ]);

        // $movie = new Movie();
        // $movie->title = $request->input('title');
        // $movie->synopsys = $request->input('synopsys');
        // $movie->duration = $request->input('duration');
        // $movie->youtube = $request->input('youtube');
        // $movie->released_at = $request->input('released_at');
        // $movie->category_id = $request->input('category');
        // $movie->save();

        Movie::create([
            'title' => $request->title,
            'synopsys' => $request->synopsys,
            'duration' => $request->duration,
            'youtube' => $request->youtube,
            'cover' => '/storage/'.$request->file('cover')->store('movies'),
            'released_at' => $request->released_at,
            'category_id' => $request->category,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/movies');
    }
}
