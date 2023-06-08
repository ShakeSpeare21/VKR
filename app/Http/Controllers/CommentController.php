<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    function display()
    {
        $data=Comment::all()->toArray();
        return view('musics',compact('data'));
    }

    
    function insert(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = auth()->id();;
        $comment->music_id = $request->music_id;
        $comment->text = $request->comment;
        $comment->save();

        return redirect('/music');
    }
}
