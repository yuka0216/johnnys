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

    
    public static function postDataSave(Request $request, $user)
    {
        $name = $request->name;
        $form = $request->all();
        
        $post = new Post;
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
        }

        $form['name'] = $user->name;
        $form['user_id'] = $user->id;
        $form['commented_at'] = $name;

        unset($form['_token']);
        unset($form['image']);
        
        $post->fill($form);
        $post->save();

    }

}
