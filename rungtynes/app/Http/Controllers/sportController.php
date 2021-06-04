<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class sportController extends Controller
{
    public function sportForm(){

        return view('sportForm');
    }

    public function sportList(){

        $sports = Sport::all();
 
        return view('sportList' , compact('sports'));
    }

    public function sportDelete($sportId)
    {
        Sport::where('id','=',$sportId)->delete();

        return redirect('sportList')->with('success', 'sporto šaka pašalinta');

    }

    public function sportEdit($sportId)
    {
        $sport = Sport::find($sportId);

        return view('sportEdit' , compact('sport') );
    }

    public function sportEditApply(Request $request, $sportId)
    {
        $validator = Validator::make(
            [   
                'name' =>$request->input('name'),
            ],
            [
                'name' => 'required|max:60',
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
    
                $sport = Sport::where('id','=',$sportId)->update($appendableData);
            }
            return Redirect::to('sportList')->with('success', 'sporto šaka paredaguota');
    }

    public function sportCreate(Request $request)
    {
        $validator = Validator::make(
            [   
                'name' =>$request->input('name'),
            ],
            [
                'name' => 'required|alpha_num|max:60',
            ]
            );
    
            if ($validator->fails())
            {
                return Redirect::to('sportAdd')->withErrors($validator)
                ->with('name' , $request->input('name'));
            }
            else
            {
              $sport = new Sport();

              $sport->name = $request->name;
              

              $sport->save();
            }
            return Redirect::to('sportAdd')->with('success', 'sporto šaka pridėta');
    }
}
