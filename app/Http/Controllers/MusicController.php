<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;


class MusicController extends Controller
{
    function index()
    {
        return view("index");
    }

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
    public function store(Request $request)
    {

        // $request->validate([
        //     'song' => 'required|mimes: mp3'
        // ]);
        // $size = $request->file('song')->getSize();
        // $name = $request->file('song')->getClientOriginalName();
        
        // $request->file('song')->storeAs('public/uploads/', $name);
        // $music = new Music();
        // $music->name = $name;
        // $music->size = $size;
        // $music->save();
        // return redirect()->back();

        // $file = $request->file('song');
        // $file -> move('public/upload', $file -> getClientOriginalName());
        // $file_name= $file -> getClientOriginalName();

        // $music = new Music();
        // $music -> music = $file_name;
        // $music -> save();
        // return redirect()->back();
    }
}
