<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Post;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        $cond_group = $request->cond_group;
        $cond_blood = $request->cond_blood;
        $cond_birthYear = $request->cond_birthYear;
        $cond_birthMonth = $request->cond_birthMonth;
        $cond_birthDay = $request->cond_birthDay;
        $cond_joinYear = $request->cond_joinYear;    

        $image = "C:\bbs\snowman";

        $query = Artist::query();
        
        if (!empty($cond_name)) {
            $query->where('name', 'LIKE', '%'.$cond_name.'%');
        }
        if (!empty($cond_group)) {
            $query->where('グループ', 'LIKE', '%'.$cond_group.'%');
        }
        if (!empty($cond_blood)) {
            $query->where('血液型', $cond_blood);
        }
        if (!empty($cond_birthYear)) {
            $query->whereYear('誕生日', $cond_birthYear);
        }
        if (!empty($cond_birthMonth)) {
            $query->whereMonth('誕生日', $cond_birthMonth);
        }
        if (!empty($cond_birthDay)) {
            $query->whereDay('誕生日', $cond_birthDay);
        }
        if (!empty($cond_joinYear)) {
            $query->whereYear('入所日', $cond_joinYear);
        }

        $artists = $query->get();
        
        if (empty($cond_name) && empty($cond_group) && empty($cond_blood) && empty($cond_birthYear) && empty($cond_birthMonth) && empty($cond_birthDay) && empty($cond_joinYear)) {
            $artists = Artist::all();
        }
        return view('artist.all', compact('artists', 'image', 'cond_name', 'cond_group','cond_blood', 'cond_birthYear', 'cond_birthMonth', 'cond_birthDay', 'cond_joinYear'));
    }

    public function snowman()
    {   
        return view('artist.snowman');
    }


    public function snowmanprofile()
    {   
        return view('artist.snowmanprofile');
    }


    public function Post(Request $request)
    {   
        
        $name = $request->name;
        $post = new Post;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
        }

        $user = Auth::user()->name;
        $user_id = Auth::user()->id;
        $form['name'] = $user;
        $form['user_id'] = $user_id;
        $form['commented_at'] = $name;

        unset($form['_token']);
        unset($form['image']);
        
        $post->fill($form);
        $post->save();

        $redirect = "snowman/profile/" . $name;

        return redirect($redirect);

    }
    public function PostIndex($name)
    {
        $posts = Post::where('commented_at', $name)->get();
        $profile = Artist::where('talk_board', $name)->first();
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