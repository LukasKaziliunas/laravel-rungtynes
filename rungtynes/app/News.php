<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $fillable = [
        'description', 'text', 'sport_fk'
    ];

    public $timestamps = false;

    public static function newsBySport($sportId){
     # $news = DB::select('select * from news where sport_fk = ?', [$sportId]);
     # $news = News::where('sport_fk' , '=' , $sportId)->get();

       $news = Sport::find($sportId)->news()->paginate(2);
      return $news;
     }


     public static function newsAdd($request){ //

        $news = new News;

        $news->description = $request->description;
        $news->text = $request->content;
        $news->sport_fk = $request->sport;

        $news->save();

     }

    function sport(){
        return $this->belongsTo('App\Sport', 'sport_fk', 'id');
    }
}
