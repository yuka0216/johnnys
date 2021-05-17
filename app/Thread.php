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
        $selectedName = $request->talkAbout;
        $form = $request->all();
        $thread = new Thread;

        $form['artist_id'] = Artist::where('name', $selectedName)->value('id');
        $form['thread_name'] = $request->thread_name;

        unset($form['_token']);

        $thread->fill($form);
        $thread->save();
    }
}
