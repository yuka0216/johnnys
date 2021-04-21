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
        return  Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    }
    public function image()
    {
        $id = Auth::user()->id;
        return  Post::where('user_id', $id)->where('image_path', '!=', null)->orderBy('created_at', 'desc')->get();
    }
}
