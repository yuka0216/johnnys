<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index(int $targetUserId, $loginId)
    {
        if ($targetUserId < 1) return response()->json(["message" => "urlが違います"], 404);

        $posts = Post::where('user_id', $targetUserId)->orderBy('created_at', 'desc')->get();
        return Post::mypageViewModel($posts, $loginId);
    }

    public function searchIndex($searchValue)
    {
        $searchPosts = Post::where('comment', 'like', "%$searchValue%")->orderBy('created_at', 'desc')->get();
        return Post::mypageViewModel($searchPosts, $searchValue);
    }
}
