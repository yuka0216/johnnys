<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Image_path;
use Illuminate\Database\Eloquent\Collection;

class Post extends Model
{
    protected $guarded = array('id');
    protected $dates = ['created_at'];

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

    public static function mypageViewModel(Collection $posts)
    {
        $mypageViews = [];

        foreach ($posts as $post) {
            if ($post->created_at !== null) {
                $mypageViews[] = [
                    "id" => $post->id,
                    "comment" => $post->comment,
                    "imagePaths" => self::makeImagePaths($post->images),
                    "created_at" => $post->created_at->format('Y/m/d h:m:s')
                ];
            }
        }
        return $mypageViews;
    }
    private static function makeImagePaths(Collection $images)
    {
        if (empty($images)) return [];

        $imagePaths = [];
        foreach ($images as $image) {
            $imagePaths[] = $image->image_path;
        }
        return $imagePaths;
    }
}
