<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Artist;
use App\Thread;
use App\ThreadsArtists;

class Profile extends Model
{
    protected $fillable = ['user_id', 'name', 'favorite', 'free_writing'];

    public function user()
    {
        return $this->belongsTo('App/User');
    }

    public static function profileEdit(Request $request, $user_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        if (!empty($profile)) {
            Profile::profileDataUpdate($request, $profile);
        } else {
            Profile::profileDataSave($request, $user_id);
        }
    }

    public static function profileDataUpdate(Request $request, $profile)
    {
        $form = $request->all();

        if (isset($form['profile_image_path'])) {
            $path = $request->file('profile_image_path')->storeAs('images', $request->file('profile_image_path')->hashName(), 'public_uploads');
            $profile->profile_image_path = basename($path);
        }

        unset($form['profile_image_path']);
        unset($form['_token']);

        $profile->fill($form)->save();
    }

    public static function profileDataSave(Request $request, $user_id)
    {
        $form = $request->all();
        $profile = new Profile;
        $form['user_id'] = $user_id;
        if (isset($form['profile_image_path'])) {
            $path = $request->file('profile_image_path')->storeAs('images', $request->file('profile_image_path')->hashName(), 'public_uploads');
            $profile->profile_image_path = basename($path);
        }

        unset($form['_token']);
        unset($form['profile_image_path']);

        $profile->fill($form);
        $profile->save();
    }

    public static function mypageViewProfile($profile)
    {
        $favoriteName = Artist::where('id', $profile->favorite)->value('name');

        $favoriteThreadIds = ThreadsArtists::where('artist_id', $profile->favorite)->get();
        foreach ($favoriteThreadIds as $favoriteThreadId) {
            $favoriteThreads[] = [
                "thread_id" => $favoriteThreadId->thread_id,
                "thread_name" => Thread::where('id', $favoriteThreadId->thread_id)->value('thread_name')
            ];
        }

        $profile = [
            "name" => $profile->name,
            "favorite" => $favoriteName,
            "free_writing" => $profile->free_writing,
            "profile_image_path" => $profile->profile_image_path,
            "favoriteThreads" => $favoriteThreads,
        ];
        return $profile;
    }
}
