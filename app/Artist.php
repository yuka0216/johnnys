<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    const NAME_LABEL = "name";
    const GROUP_LABEL = "group";
    const BLOOD_TYPE_LABEL = "blood_type";
    const BIRTHDAY_LABEL = "birthday";
    const JOINED_DATE_LABEL = "joined_date";

    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

    public static function fetchProfileByName(string $name)
    {
        return Artist::where('talk_board', $name)->first();
    }

    public static function fetchProfileBySearch(Request $request)
    {
        $query = self::query();
        $searchWordList = self::makeSearchWordList($request);

        $judge = array_filter($searchWordList);
        if (empty($judge)) {
            return Artist::all();
        }

        foreach ($searchWordList as $columnName => $searchWord) {
            if ($columnName == self::BLOOD_TYPE_LABEL && (!empty($searchWord))) $query->where($columnName, $searchWord);
            if (!empty($searchWord)) $query->where($columnName, 'LIKE', '%' . $searchWord . '%');
        }

        return $query->get();
    }

    public static function makeSearchWordList(Request $request)
    {
        $searchWordList = [
            self::NAME_LABEL => $request->cond_name,
            self::GROUP_LABEL => $request->cond_group,
            self::BLOOD_TYPE_LABEL => $request->cond_blood,
            self::BIRTHDAY_LABEL => $request->cond_birthDay,
            self::JOINED_DATE_LABEL => $request->cond_joined,
        ];

        return $searchWordList;
    }
}
