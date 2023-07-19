<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return view('actors.index', [
            'actors' => Actor::all(),
        ]);
    }

    public function showActor(string $actorId)
    {
        $actor = Actor::findOrFail($actorId);

        return view('actors.showActor', [
            'actor' => $actor,
        ]);
    }
}
