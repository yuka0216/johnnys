<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Profile;
use App\Artist;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function fetchProfileByUserId(int $user_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        if (empty($profile)) return "empty";
        return Profile::mypageViewProfile($profile);
    }
}
