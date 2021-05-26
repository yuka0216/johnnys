<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Threads_artist extends Model
{
    public static function addThreadData($artist_id, $add_id)
    {
        $threads_artist = new Threads_artist;

        $threads_artist->artist_id = $artist_id;
        $threads_artist->thread_id = $add_id;
        $threads_artist->save();
    }
}
