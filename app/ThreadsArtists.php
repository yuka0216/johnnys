<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ThreadsArtists extends Model
{
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public static function addThreadData($artist_id, $add_id)
    {
        $threads_artist = new ThreadsArtists;

        $threads_artist->artist_id = $artist_id;
        $threads_artist->thread_id = $add_id;
        $threads_artist->save();
    }
}
