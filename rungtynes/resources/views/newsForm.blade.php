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
        <form action="../newsCreate" method="POST">
        <label>antraštė</label>
        <input type="text" name="description" style="width: 300px;" value="{{ session('desc') }}"><br><br>
        <label>tekstas</label>
        <textarea name="content" style="width: 300px; height: 350px;" >{{ session('content') }}</textarea><br>
        {{ csrf_field() }}
        <input type="hidden" name="sport" value="{{$sportId}}">
        <input type="submit" name="submit">
        </form>
    </div>
</div>
  
@endsection