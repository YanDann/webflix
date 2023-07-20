<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|min:15',
            'note' => 'required|min:0',
        ]);

        Comment::create([
            'message' => $request->message,
            'note' => $request->note,
            'movie_id' => $request->movie()->id,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/movie/{movie}');
    }
}
