<?php

namespace App\Http\Controllers;

use App\Team;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function teamForm($sportId){

        return view('teamForm', ['sportId' => $sportId ]);
    }

    public function teamList($sportId){

        $teams = Sport::find($sportId)->teams;
 
        return view('teamList' , compact('teams') , ['sportId' => $sportId]);
    }

    public function teamDelete($teamId)
    {
        $team = Team::find($teamId);
        Team::where('id','=',$teamId)->delete();

        return redirect('teamList/' . $team->sport->id)->with('success', 'komanda pašalinta');

    }

    public function teamEdit($teamId)
    {
        $team = Team::find($teamId);

        return view('teamEdit' , compact('team') );
    }

    public function teamEditApply(Request $request, $teamId)
    {
        $validator = Validator::make(
            [   
                'name' =>$request->input('name'),
                'trum' =>$request->input('trum'),
                'sport' =>$request->input('sport_fk')

                
            ],
            [
                'name' => 'required|max:60',
                'trum' => 'required|alpha_num|max:60|min:2',
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
    
                $team = Team::where('id','=',$teamId)->update($appendableData);
            }
            return Redirect::to('teamList/' . $request->input('sport_fk') )->with('success', 'komanda paredaguota');
    }

    public function teamCreate(Request $request)
    {
        $validator = Validator::make(
            [   
                'name' =>$request->input('name'),
                'trum' =>$request->input('trum'),
                'sport' =>$request->input('sport')
            ],
            [
                'name' => 'required|alpha_num|max:60',
                'trum' => 'required|alpha_num|max:60|min:2',
                'sport' =>  'required'
            ]
            );
    
            if ($validator->fails())
            {
                return Redirect::to('teamAdd/' . $request->sport)->withErrors($validator)
                ->with('name' , $request->input('name'))->with('trum' , $request->input('trum'));
            }
            else
            {
              $team = new Team();

              $team->name = $request->name;
              $team->trum = $request->trum;
              $team->sport_fk = $request->sport;

              $team->save();
            }
            return Redirect::to('teamAdd/' . $request->input('sport') )->with('success', 'komanda pridėta');
    }
}
