<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['artist_id', 'album_name', 'genre', 'release_year', 'album_art'];
}
