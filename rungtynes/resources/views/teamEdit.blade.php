@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="../index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="../teamList/{{$team->sport->id}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.teamList') }}</a></li>
  </ul>

@endsection

@section('content')
<div style=" width: auto; height: 500px; background-color: white">
    <div style="margin-left: auto; margin-right: auto; width: 300px">
    <form action="../teamEditApply/{{ $team->id }}" method="POST">
        <label>pavadinimas</label>
        <input type="text" name="name" style="width: 300px;" value="{{ $team->name }}"><br><br>
        <label>trumpinys</label>
        <input type="text" name="trum" style="width: 300px;" value="{{ $team->trum  }}"><br><br>
        {{ csrf_field() }}
        <input type="hidden" name="sport_fk" value="{{ $team->sport->id }}">
        <input type="submit" name="submit">
        </form>
    </div>
</div>
  
@endsection