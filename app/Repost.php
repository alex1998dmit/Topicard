<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repost extends Model
{
    //
    protected $fillable = [
        'user_id', 'topic_id'
    ];

    public function topic()
    {
        return $this->belongsToMany('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
