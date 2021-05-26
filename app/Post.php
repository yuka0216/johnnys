<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Favorite;
use App\Profile;
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

            $image->post_id = $post->max('id');

            unset($form['_token']);
            unset($form['image']);

            $image->save();
        }
    }

    // public static function makePostIndex(Collection $posts)
    // {
    //     $postList = [];

    //     foreach ($posts as $post) {
    //         $postList[] = [
    //             "id" => $post->id,
    //             "user_id" => $post->user->id,
    //             "name" => $post->user->name,
    //             "comment" => $post->comment,
    //             "images" => $post->images,
    //             "created_at" => $post->created_at,
    //             "profile_image" => self::profileImage($post)
    //         ];
    //     }

    //     return $postList;
    // }

    // public static function profileImage($post)
    // {
    //     $profileImage = Profile::where('user_id', $post->user->id)->value('profile_image_path');
    //     return $profileImage;
    // }

    public static function postUpdate(Request $request, $post)
    {
        $form = $request->all();
        $post->fill($form)->save();

        $image = Image::where('post_id', $form['id'])->first();

        if ($request->remove == 'true') $image->where('post_id', $form['id'])->delete();

        if (isset($form['image'])) {
            if (!empty($image)) {
                $path = $request->file('image')->storeAs('images', $request->file('image')->hashName(), 'public_uploads');
                $image->image_path = basename($path);
            } else {
                $image = new Image;
                $path = $request->file('image')->storeAs('images', $request->file('image')->hashName(), 'public_uploads');
                $image->image_path = basename($path);
                $image->post_id = $post->id;
            }
            unset($form['_token']);
            unset($form['image']);
            $image->save();
        }
    }



    public static function mypageViewModel(Collection $posts, $loginId)
    {
        $mypageViews = [];

        foreach ($posts as $post) {
            if ($post->created_at !== null) {
                $mypageViews[] = [
                    "id" => $post->id,
                    "user_id" => $post->user_id,
                    "name" => $post->user->name,
                    "comment" => $post->comment,
                    "threadName" => $post->thread->thread_name,
                    "imagePaths" => self::makeImagePaths($post->images),
                    "created_at" => $post->created_at->format('Y/m/d h:m:s'),
                    "likeCount" => self::countFavorite($post),
                    "isLiked" => self::isFavorite($post, $loginId)
                ];
            }
        }
        return $mypageViews;
    }

    private static function isFavorite($post, $loginId)
    {
        $favorite = Favorite::where('post_id', $post->id)->where('user_id', $loginId)->count();
        return (!empty($favorite));
    }

    private static function countFavorite($post)
    {
        return Favorite::where('post_id', $post->id)->count();
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
