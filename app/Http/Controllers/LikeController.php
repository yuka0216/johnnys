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
        $favorite->post_id = $request->postId;
        $favorite->user_id = $request->userId;
        $favorite->save();
    }

    public function delete(Request $request)
    {
        Favorite::where('post_id', $request->postId)->where('user_id', $request->userId)->delete();
    }

    public function favorite($postID, $userID)
    {
        $favorite = [
            "count" => self::count($postID, $userID),
            "isFavorite" => self::isFavorite($postID, $userID)
        ];
        return response()->json($favorite);
    }

    private static function count($postID, $userID)
    {
        return Favorite::where('post_id', $postID)->where('user_id', $userID)->count();
    }

    private static function isFavorite($postID, $userID)
    {
        $favorite = Favorite::where('post_id', $postID)->where('user_id', $userID)->first();
        $isFavorite = (!empty($favorite));
        return $isFavorite;
    }
}
