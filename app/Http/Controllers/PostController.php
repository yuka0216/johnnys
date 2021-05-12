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
        if ($userId < 1) return response()->json(["message" => "urlが違います"], 404);

        $id = $userId;
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return Post::mypageViewModel($posts);
    }

    public function searchIndex($searchValue)
    {
        $searchPosts = Post::where('comment', 'like', "%$searchValue%")->orderBy('created_at', 'desc')->get();
        return Post::mypageViewModel($searchPosts);
    }
}
