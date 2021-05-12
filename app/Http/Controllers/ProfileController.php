<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function fetchProfileByUserId(int $user_id)
    {
        return Profile::where('user_id', $user_id)->get();
    }
}
