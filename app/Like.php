<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'user_id'
    ];

    public function topic()
    {
        return $this->belongsToMany('App\Topic');
    }
}
