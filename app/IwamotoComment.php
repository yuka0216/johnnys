<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IwamotoComment extends Model
{
    //勝手に変えられてほしくない値は以下を設定
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'comment' => 'required',
    );
}
