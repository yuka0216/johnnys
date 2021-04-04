<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Post;
use Illuminate\Support\Facades\Auth;

class ArtistController extends controller
{
    public function index(Request $request)
    {
        $query = Artist::query();
        $artists = Artist::fetchProfileBySearch($request, $query);
        $searchWordList = Artist::makeSearchWordList($request);
        $image = "C:\bbs\snowman";

        return view('artist.all', ['artists'=> $artists, 'image' => $image, 'searchWordList' => $searchWordList]);
    }

    public function snowman()
    {   
        return view('artist.snowman');
    }

    public function snowmanprofile()
    {   
        return view('artist.snowmanprofile');
    }

    public function post(Request $request)
    {   
        $name = $request->name;
        $user = Auth::user();
        $post = Post::postDataSave($request, $user);

        $redirect = "snowman/profile/" . $name;
        return redirect($redirect);
    }

    public function postIndex($name)
    {
        $posts = Post::where('commented_at', $name)->get();
        $profile = Artist::fetchProfileByName($name);
        return view('artist.talkboard', ['posts' => $posts, 'name' => $name, 'profile' => $profile]);
    }

    public function snowmancheckit()
    {   
        return view('artist.snowmancheckit');
    }
    
    public function snowmanmustgo()
    {   
        return view('artist.snowmanmustgo');
    }

    public function sixtones()
    {   
        return view('artist.sixtones');
    }

    public function myPostIndex()
    {
        $id = Auth::user()->id;
        $myPosts = Post::where('user_id', $id)->get();
        return view('artist.mypage', ['myPosts' => $myPosts]); 
    }
}