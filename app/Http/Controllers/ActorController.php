<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        return view('actors.create', [
            'actors' => Actor::all(),
        ]);
    }

    public function store(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'name' => 'required|unique:actors|min:2',
            'avatar' => 'nullable|image|max:2048',
            'birthday' => 'nullable|date',
        ]);
        
        Actor::create([
            'name' => $request->name,
            'avatar' => '/storage/'.$request->file('avatar')->store('actors'),
            'birthday' => $request->birthday,
        ]);

        return redirect('/actors');
    }
}
