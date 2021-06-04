<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class languageController extends Controller
{
    public function index($lang)
    {
        if($lang == 1)
        {
            session()->put('lang' , 'EN');
        }
        else if($lang == 2)
        {
            session()->put('lang' , 'LT');
        }
        else
        {
            session()->put('lang' , 'LT');
        }

        return redirect()->back();
    }
}
