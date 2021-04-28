<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(int $userId)
    {
        $id = ($userId === 0) ? Auth::id() : $userId;
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return Post::mypageViewModel($posts);
    }
}
