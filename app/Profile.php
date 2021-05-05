<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'name', 'favorite', 'free_writing'];

    public function user()
    {
        return $this->belongsTo('App/User');
    }

    public static function profileDataSave(Request $request, $user)
    {
        $form = $request->all();
        $profile = new Profile;
        $form['user_id'] = $user->id;

        $profile->fill($form);
        $profile->save();
    }
}
