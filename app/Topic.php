<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $fillable = [
         'user_id', 'content', 'title',
    ];

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
