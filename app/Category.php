<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['isOpen', 'leftColumn', 'rightColumn', 'bottemColumn', 'theme', 'subject_id'];

    

}
