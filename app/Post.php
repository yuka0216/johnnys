<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Image_path;

class Post extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public static function postDataSave(Request $request, $user)
    {
        $form = $request->all();
        $post = new Post;
        $image = new Image;


        $form['thread_id'] = $request->threadId;
        $form['name'] = $user->name;
        $form['user_id'] = $user->id;


        $post->fill($form);
        $post->save();

        if (isset($form['image'])) {
            $path = $request->file('image')->storeAs('images', $request->file('image')->hashName(), 'public_uploads');
            $image->image_path = basename($path);
        }

        $image->post_id = $post->max('id');

        unset($form['_token']);
        unset($form['image']);


        $image->save();
    }
}
