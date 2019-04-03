<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function reposts()
    {
        return $this->hasMany('App\Repost');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function is_reposted_by_auth()
    {
        $id = Auth::id();
        $reposters = [];
        foreach($this->reposts as $repost) {
            array_push($reposters, $repost->user_id);
        }

        if(in_array($id, $reposters)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_liked_by_auth()
    {
        $id = Auth::id();
        $likers = [];
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if(in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
