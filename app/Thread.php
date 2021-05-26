<?php

namespace App;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $fillable = ['thread_name', 'artist_id'];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public static function addThread(Request $request)
    {
        $thread = new Thread;

        $thread->thread_name = $request->thread_name;

        unset($request['_token']);

        $thread->save();
    }
}
