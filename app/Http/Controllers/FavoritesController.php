<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    function fetch()
    {
        return view('/favorites');
        // $data=Music::all()->toArray();
        // return view('musics',compact('data'));
    }
}
