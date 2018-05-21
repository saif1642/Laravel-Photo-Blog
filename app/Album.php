<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Album extends Model
{
    protected $fillable = array('name','description','cover_image');
    //Create one to many Relation with photos table
    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
