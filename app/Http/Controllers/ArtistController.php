<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\IwamotoComment;
use Illuminate\Support\Facades\Auth;
use App\AllComment;

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

     public function iwamototalk()
    {   
        return view('artist.iwamotoTalk');
    }


    public function snowmanprofile()
    {   
        return view('artist.snowmanprofile');
    }


    public function iwamotoCommentPost(Request $request)
    {   
        $this->validate($request, IwamotoComment::$rules);
        $iwamotoComment = new IwamotoComment;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $iwamotoComment->image_path = basename($path);
        } else {
            $iwamotoComment->image_path = null;
        }

        $user = Auth::user()->name;
        $user_id = Auth::user()->id;
        $form['name'] = $user;
        $form['user_id'] = $user_id;
        $form['commented_at'] = "岩本照";

        unset($form['_token']);
        unset($form['image']);

        $iwamotoComment->fill($form);
        $iwamotoComment->save();

        $allComment = new AllComment;
        $allComment->user_id = $iwamotoComment->user_id;
        $allComment->comment_id = $iwamotoComment->id;
        $allComment->comment = $iwamotoComment->comment;
        $allComment->image_path = $iwamotoComment->image_path;
        $allComment->commented_at = $iwamotoComment->commented_at;
        $allComment->save();

        return redirect('snowman/profile/iwamototalk');

    }
    public function iwamotoCommentIndex()
    {
        
        $posts = IwamotoComment::all();
        return view('artist.iwamotoTalk', ['iwamotoposts' => $posts]);

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



    public function commentIndex()
    {
        $id = Auth::user()->id;
        $myComment = AllComment::where('user_id', $id)->get();
        return view('artist.mypage', ['myComments' => $myComment]); 
    }

}