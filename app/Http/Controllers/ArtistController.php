<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\iwamotoComment;

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

     public function iwamototalk()
    {   
        return view('artist.iwamotoTalk');
    }


    public function snowmanprofile()
    {   
        return view('artist.snowmanprofile');
    }

    public function login()
    {   
        return view('artist.login');
    }
    public function iwamotoCommentPost(Request $request)
    {   
        $iwamotoComment = new IwamotoComment;
        $form = $request->all();

        $user = Auth::user()->name;
        $form['name'] = $user;
        unset($form['_token']);
        
        $iwamotoComment->fill($form);
        $iwamotoComment->save();

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
}