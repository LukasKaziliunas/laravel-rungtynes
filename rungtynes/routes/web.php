<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\MatchController;

Route::get('/', 'HomeController@index');

Route::get('/index.html', 'HomeController@index');

Route::get('matches/{sportId}', 'MatchController@viewMathces');

Route::get('news/{sportId}', 'NewsController@newsView');

Route::get('contacts', 'ContactsController@showContacts');

Route::get('newsAdd/{sportId}', 'NewsController@newsForm');

Route::post('newsCreate', 'NewsController@newsCreate');

Route::get('newsDelete/{newsId}', 'NewsController@newsDelete');

Route::get('newsEdit/{newsId}', 'NewsController@newsEdit');

Route::post('newsEditApply/{newsId}', 'NewsController@newsEditApply');

Route::get('matchAdd/{sportId}', 'MatchController@matchForm');

Route::post('matchCreate', 'MatchController@matchCreate');

Route::get('matchDelete/{matchId}', 'MatchController@matchDelete');

Route::get('matchEdit/{matchId}', 'MatchController@matchEdit');

Route::post('matchEditApply/{matchId}', 'MatchController@matchEditApply');

Route::get('teamAdd/{sportId}', 'TeamController@teamForm');

Route::post('teamCreate', 'TeamController@teamCreate');

Route::get('teamList/{sportId}', 'TeamController@teamList');

Route::get('teamDelete/{sportId}', 'TeamController@teamDelete');

Route::get('teamEdit/{teamId}', 'TeamController@teamEdit');

Route::post('teamEditApply/{teamId}', 'TeamController@teamEditApply');

Route::get('lang/{lang}', 'languageController@index');

Route::get('sportAdd', 'sportController@sportForm');

Route::post('sportCreate', 'sportController@sportCreate');

Route::get('sportList', 'sportController@sportList');

Route::get('sportDelete/{sportId}', 'sportController@sportDelete');

Route::get('sportEdit/{sportId}', 'sportController@sportEdit');

Route::post('sportEditApply/{sportId}', 'sportController@sportEditApply');

Route::get('testing' , function(){
    $sport = App\Sport::find(1);
    
    
        foreach($sport->news as $new){
           echo $new . "<br>";
        }
         
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

