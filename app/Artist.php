<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public static function fetchProfileByName(string $name)
    {
        $profile = Artist::where('talk_board', $name)->first();
        return $profile;
    }
    
    public static function fetchProfileBySearch(Request $request, $query)
    {
        $searchWordList = self::makeSearchWordList($request);

        $judge = array_filter($searchWordList);
        if(empty($judge)){
            $artists = Artist::all();
            return $artists;
        }
        foreach ($searchWordList as $columnName => $searchWord){
            if($columnName == "血液型" && (!empty($searchWord))) $query->where($columnName, $searchWord);
            if (!empty($searchWord)) $query->where($columnName, 'LIKE', '%'.$searchWord.'%');
        }

        $artists = $query->get();
        return $artists;
    }

    public static function makeSearchWordList(Request $request)
    {
        $searchWordList = [
            "名前" => $cond_name = $request->cond_name,
            "グループ" => $cond_group = $request->cond_group,
            "血液型" => $request->cond_blood,
            "誕生日" => $request->cond_birthDay,
            "入所日" => $request->cond_joinYear,
        ];

        return $searchWordList;
    }
}
