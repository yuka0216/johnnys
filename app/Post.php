<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'comment' => 'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public static function postDataSave(Request $request, $user)
    {
        $form = $request->all();
        $post = new Post;
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
        }

        $form['thread_id'] = $request->threadId;
        $form['name'] = $user->name;
        $form['user_id'] = $user->id;

        unset($form['_token']);
        unset($form['image']);

        $post->fill($form);
        $post->save();
    }
}
