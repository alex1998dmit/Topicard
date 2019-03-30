<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $fillable = [
        'category_id', 'user_id', 'content', 'likes', 'dislikes',
    ];

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function like()
    {
        return $this->belongsToMany('App\Like');
    }

    public function dislike()
    {
        return $this->belongsToMany('App\Dislike');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
