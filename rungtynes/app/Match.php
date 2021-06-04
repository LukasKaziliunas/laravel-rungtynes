<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Match extends Model
{
    protected $fillable = [
        'name', 'time', 'date', 'place', 'team1', 'team2', 'sport'
    ];

    public $timestamps = false;

    protected $table = 'matches';

    public static function matchesBySport($sportId){
    
       $matches = Sport::find($sportId)->matches()->paginate(2);

       return $matches;
    }

    public static function matchAdd($request){
        $match = new Match();
        
        $match->name = $request->name;
        $match->date = $request->date;
        $match->time = $request->time;
        $match->place = $request->place;
        $match->team1 = $request->team1;
        $match->team2 = $request->team2;
        $match->sport = $request->sport;

        $match->save();
    }

    function _team1(){
        return $this->belongsTo('App\Team' , 'team1' , 'id');
    }

    function _team2(){
        return $this->belongsTo('App\Team' , 'team2' , 'id');
    }

    function _sport(){
        return $this->belongsTo('App\Sport' , 'sport' , 'id');
    }
}
