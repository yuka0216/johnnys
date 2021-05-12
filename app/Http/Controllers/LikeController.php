<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use Illuminate\Http\Request;
use App\Favorite;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $favorite = new Favorite;
        $favorite->post_id = $request->post_id;
        $favorite->user_id = $request->user_id;
        $favorite->save();
    }

    public function delete($postID, $userID)
    {
        Favorite::where('post_id', $postID)->where('user_id', $userID)->delete();
    }

    public function check($postID, $userID)
    {
        $favorite = Favorite::where('post_id', $postID)->where('user_id', $userID)->first();
        $isFavorite = (!empty($favorite));
        return response()->json($isFavorite);
    }
}
