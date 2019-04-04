<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Category extends Model
{
    //
    protected $fillable = ['name', 'avatar'];

    public function topic()
    {
        return $this->belongsToMany('App\Topic');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function is_subscribed_by_id()
    {
        $id = Auth::id();
        $user = User::find($id);

        foreach ($this->user as $item) {
            if($item->id === $id) {
                return true;
            } else{
                return false;
            }
        }
        return false;
    }


}
