<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    

    protected $fillable = [
        'name', 'trum' ,'sport_fk', 
    ];

    public $timestamps = false;

    public static function teamsBySport($sportId){
        $teams = Sport::find($sportId)->teams;
        return $teams;
    }

    function sport(){
        return $this->belongsTo('App\Sport' , 'sport_fk' , 'id');
    }
   
}
