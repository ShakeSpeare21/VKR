<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{

    function display()
    {
        $comments=Comment::all()->toArray();
        return view('musics',compact('comments'));
    }

    
    function insert(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->name = Auth::user()->name;
        $comment->music_id = $request->music_id;
        $comment->text = $request->comment;
        $comment->save();

        return redirect('/music');
    }
}
