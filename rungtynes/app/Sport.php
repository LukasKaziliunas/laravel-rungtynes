<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    function news(){
        return $this->hasMany('App\News', 'sport_fk', 'id');
    }

    function teams(){
        return $this->hasMany('App\Team', 'sport_fk', 'id');
    }

    function matches(){
        return $this->hasMany('App\Match', 'sport' , 'id');
    }
}
