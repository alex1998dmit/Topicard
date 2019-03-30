<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved_Topic extends Model
{
    //
    protected $fillable = [
        'user_id', 'topic_id'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
