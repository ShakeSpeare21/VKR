<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use Illuminate\Http\Request;
use DB;


class MusicController extends Controller
{


    function fetch()
    {
        $data=Music::all()->toArray();
        $comments=Comment::all()->toArray();
        return view('musics',compact('data', 'comments'));
    }

    function insert(Request $request)
    {
        $file=$request->file('song');
        $file->move('upload', $file->getClientOriginalName());
        $file_name = $file->getClientOriginalName();
        
        $insert=new Music();
        $insert->name = $file_name;
        $insert->save();

        return redirect('/music');
    }

    public function create()
    {
        $musics = DB::table('musics')->select('*')->get();
        return view('upload', ['music' => $musics]);
    }

}
