<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'artist_id' => 'required|exists:artists,id',
            'album_name' => 'required|unique:albums',
            'genre' => 'max:255',
            'release_year' => 'required',
            'album_art' => 'image'
        ]);
        $album = new Album();
        $album->artist_id = $request->artist_id;
        $album->album_name = $request->album_name;
        $album->genre = $request->genre;
        $album->release_year = $request->release_year;
        $album->album_art = $request->album_art;

        $album->save();
        return redirect("album/$album->id");
    }
}
