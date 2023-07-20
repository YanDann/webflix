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
            'actors' => Actor::paginate(8),
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:actors|min:2',
            'avatar' => 'nullable|image|max:2048',
            'birthday' => 'nullable|date',
        ]);

        Actor::create([
            'name' => $request->name,
            'avatar' => '/storage/' . $request->file('avatar')->store('actors'),
            'birthday' => $request->birthday,
        ]);

        return redirect('/actors');
    }

    public function edit(Actor $actor){
        return view('actors.edit', [
            'actor' => $actor,
        ]);
    }

    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'name' => 'required|unique:actors,name,'.$actor->id.'|min:2',
            'avatar' => 'nullable|image|max:2048',
            'birthday' => 'nullable|date',
        ]);

        if ($request->hasFile('avatar')) {
            Storage::delete(str($actor->avatar)->remove('/storage/'));
            $validated['avatar'] = '/storage/' . $request->file('avatar')->store('actors');
        }

        $actor->update($validated);

        return redirect('/actors');
    }

    public function destroy(string $id)
    {
        Actor::destroy($id);

        return redirect('/actors')->with('message', 'Acteur supprimé');
    }
}
