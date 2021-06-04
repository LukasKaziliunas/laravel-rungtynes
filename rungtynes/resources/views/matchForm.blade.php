@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="../index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="../news/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.news') }}</a></li>
      <li><a href="../matchAdd/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.newMatch') }}</a></li>
  </ul>

@endsection

@section('content')


<div style=" width: auto; height: 500px; background-color: white">
    <div style="margin-left: auto; margin-right: auto; width: 300px">
        <form action="../matchCreate" method="POST">
        <label>pavadinimas</label>
        <input type="text" name="name" style="width: 300px;" value="{{ session('name') }}"><br><br>
        <label>vieta</label>
        <input type="text" name="place" style="width: 300px;" value="{{ session('place') }}"><br><br>
        <label>data</label>
        <input type="date" name="date" value="{{ session('date') }}"><br><br>
        <label>laikas</label>
        <input type="time" name="time" value="{{ session('time') }}"><br><br>
        <input type="hidden" name="sport" value="{{$sportId}}">
        {{ csrf_field() }}

        <label>pirma komanda</label><br>
        <select name="team1" value="{{ session('team1') }}">
                @foreach ($teams as $t)
        <option value="{{$t->id}}">{{$t->name}}</option>  
                @endforeach      
        </select><br>

        <label>antra komanda</label><br>
        <select name="team2" value="{{ session('team2') }}">
                @foreach ($teams as $t)
        <option value="{{$t->id}}">{{$t->name}}</option>  
                @endforeach     
        </select><br><br>

        <input type="submit" name="submit">
        </form>
   </div>
</div>

  
@endsection

