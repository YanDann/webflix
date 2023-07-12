<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Webflix";

        return view('home', [
            'name' => 'Julien',
            'title' => $title,
            'numbers' => [1, 2, 3],
        ]);
    }
}
