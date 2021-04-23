<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return Post::mypageViewModel($posts);
    }

    // public function image()
    // {
    //     $id = Auth::user()->id;
    //     $myPosts =  Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    //     $myPostImageList = [];
    //     foreach ($myPosts as $myPost) {
    //         if ($myPost->images) {
    //             foreach ($myPost->images as $image)
    //                 $myPostImageList[] = $image->image_path;
    //         }
    //     }
    //     return $myPostImageList;
    // }
}
