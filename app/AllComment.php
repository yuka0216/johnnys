<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllComment extends Model
{
    protected $table = 'allcomments';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'comment_id' => 'required',
        'comment' => 'required',
    );
}
