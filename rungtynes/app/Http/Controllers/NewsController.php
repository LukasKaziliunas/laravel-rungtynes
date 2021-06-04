<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    public function newsView($sportId){

         $news = News::newsBySport($sportId);
       // $news = News::paginate(1);
        return view('newsList', compact('news'), ['sportId' => $sportId] , ['test' => 'testas']);
    }

    public function newsForm($sportId){

        return view('newsForm', ['sportId' => $sportId]);
    }

    //********************************************** */
    public function newsCreate(Request $request){

       $validator = Validator::make(
        [   
            'description' =>$request->input('description'),
            'content' =>$request->input('content'),
            'sport' => $request->input('sport')
        ],
        [
            'description' => 'required',
            'content' =>'required|min:10|max:150',
            'sport' =>  'required'
        ]
        );

        if ($validator->fails())
        {
            return Redirect::to('newsAdd/' . $request->sport)->withErrors($validator)->with('desc' , $request->input('description'))->with('content' , $request->input('content'));
        }
        else
        {
        $news = new News;

        $news->description = $request->description;
        $news->text = $request->content;
        $news->sport_fk = $request->sport;

        $news->save();
        }
        return Redirect::to('newsAdd/' . $request->sport)->with('success', 'Naujiena pridėta');
    }

    //********************************************** */
    public function newsDelete($newsId)
    {
        $sport = News::find($newsId)->sport()->first();
        News::where('id','=',$newsId)->delete();

        return redirect('news/' . $sport->id)->with('success', 'Naujiena pašalinta');

    }

    //********************************************** */
    public function newsEdit($newsId)
    {
        $article = News::find($newsId);

        return view('newsEdit' , compact('article'));
    }

    //********************************************** */
    public function newsEditApply(Request $request, $newsId)
    {
        $validator = Validator::make(
            [   
                'description' =>$request->input('description'),
                'content' =>$request->input('text'),
                'sport' => $request->input('sport_fk')
            ],
            [
                'description' => 'required|alpha_num|max:60',
                'content' =>'required|min:10',
                'sport' =>  'required'
            ]
        );
    
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $appendableData = $request->all();

            //pašaliname iš masyvo saugumui naudojamą _token kintamąjį
            unset($appendableData ['_token']);
            unset($appendableData ['submit']);

            $news = News::where('id','=',$newsId)->update($appendableData);

        }
        return Redirect::to('news/' . $request->input('sport_fk'))->with('success', 'Naujiena atnaujinta');
    }

}
