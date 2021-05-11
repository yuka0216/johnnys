<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        return Auth::user();
    }
}
