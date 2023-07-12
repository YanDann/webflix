<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutTeam extends Controller
{
    private array $team = [
        ['name' => 'Yan',],
        ['name' => 'Ares',],
        ['name' => 'Guts',],
    ];

    public function showTeam()
    {
        return view('a-propos', [
            'title' => 'Webflix',
            'team' => $this->team,
        ]);
    }

    public function showTeamMate(string $user)
    {
        abort_if(!in_array($user, array_column($this->team, 'name')), 404);

        return view('about-show', ['user' => $user]);
    }
}
