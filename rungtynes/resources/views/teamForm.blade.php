@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="../index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="../teamList/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.teamList') }}</a></li>
  </ul>

@endsection

@section('content')


<div style=" width: auto; height: 500px; background-color: white">
    <div style="margin-left: auto; margin-right: auto; width: 300px">
        <form action="../teamCreate" method="POST">
        <label>pavadinimas</label>
        <input type="text" name="name" style="width: 300px;" value="{{ session('name') }}"><br><br>
        <label>trumpinys</label>
        <input type="text" name="trum" style="width: 300px;" value="{{ session('trum') }}"><br><br>
        <input type="hidden" name="sport" value="{{$sportId}}">
        {{ csrf_field() }}

        <input type="submit" name="submit">
        </form>
   </div>
</div>

  
@endsection