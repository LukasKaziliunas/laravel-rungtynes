<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class MatchController extends Controller
{
    public function viewMathces($sportId){

        $matches = Match::matchesBySport($sportId);
 
        return view('matchesList' , compact('matches') , ['sportId' => $sportId]);
    }

    public function matchForm($sportId){

        $teams = Team::teamsBySport($sportId);

        return view('matchForm', ['sportId' => $sportId , 'teams' => $teams]);
    }

    //********************************************** */
    public function matchCreate(Request $request){

        $validator = Validator::make(
            [   
                'name' =>$request->input('name'),
                'time' =>$request->input('time'),
                'date' =>$request->input('date'),
                'place' =>$request->input('place'),
                'team1' =>$request->input('team1'),
                'team2' =>$request->input('team2'),
                'sport' =>$request->input('sport')

                
            ],
            [
                'name' => 'required|alpha_num',
                'time' =>'required',
                'date' =>  'required|date',
                'place' =>  'required',
                'team1' =>  'required',
                'team2' =>  'required',
                'sport' =>  'required'
            ]
            );
    
            if ($validator->fails())
            {
                return Redirect::to('matchAdd/' . $request->sport)->withErrors($validator)
                ->with('name' , $request->input('name'))
                ->with('time' , $request->input('time'))
                ->with('date' , $request->input('date'))
                ->with('place' , $request->input('place'))
                ->with('team1' , $request->input('team1'))
                ->with('team2' , $request->input('team2'))
                ->with('sport' , $request->input('sport'));
            }
            else
            {
              $match = new Match;

              $match->name = $request->name;
              $match->time = $request->time;
              $match->date = $request->date;
              $match->place = $request->place;
              $match->team1 = $request->team1;
              $match->team2 = $request->team2;
              $match->sport = $request->sport;

              $match->save();
            }
            return Redirect::to('matchAdd/' . $request->input('sport') )->with('success', 'rungtynes sukurtos');
    }

    //********************************************** */
    public function matchDelete($matchId)
    {
        $match = Match::find($matchId);
        Match::where('id','=',$matchId)->delete();

        return redirect('matches/' . $match->_sport->id)->with('success', 'rungtynes pašalintos');

    }

    //********************************************** */
    public function matchEdit($matchId)
    {
        $match = Match::find($matchId);
        $teams = Team::teamsBySport($match->sport);

        return view('matchEdit' , compact('match') , ['teams' => $teams] );
    }

    //**************************************************** */
    public function matchEditApply(Request $request, $matchId)
    {
        $validator = Validator::make(
            [   
                'name' =>$request->input('name'),
                'time' =>$request->input('time'),
                'date' =>$request->input('date'),
                'place' =>$request->input('place'),
                'team1' =>$request->input('team1'),
                'team2' =>$request->input('team2'),
                'sport' =>$request->input('sport')

                
            ],
            [
                'name' => 'required|max:60',
                'time' =>'required',
                'date' =>  'required|date',
                'place' =>  'required|max:60',
                'team1' =>  'required',
                'team2' =>  'required',
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
    
                $match = Match::where('id','=',$matchId)->update($appendableData);
            }
            return Redirect::to('matches/' . $request->input('sport') )->with('success', 'rungtynes paredaguotos');
    }
}
