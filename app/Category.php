<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'avatar'];

    public function topic()
    {
        return $this->belongsToMany('App\Topic');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
