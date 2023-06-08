<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;


class MusicController extends Controller
{

    function fetch()
    {
        $data=Music::all()->toArray();
        return view('musics',compact('data'));
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
