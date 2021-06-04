

@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="../index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="../teamAdd/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.newTeam') }}</a></li>
  </ul>

@endsection

@section('content')

  <table style="background-color: white ; width: 100% ">
  @foreach($teams as $team)
  <tr>
    <td style="border: 1px solid #dddddd;">{{$team->name}}</td>
    <td style="border: 1px solid #dddddd;">{{$team->trum}}</td>
  <td style="border: 1px solid #dddddd;"><a href="../teamDelete/{{$team->id}}">trinti</a> <a href="../teamEdit/{{$team->id}}">redaguoti</a></td>
  </tr>
  @endforeach
  </table>


@endsection