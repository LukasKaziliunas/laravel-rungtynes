
@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="../index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="../news/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.news') }}</a></li>
      <li><a href="../matchAdd/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.newMatch') }}</a></li>
      <li><a href="../teamAdd/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.newTeam') }}</a></li>
      <li><a href="../teamList/{{$sportId}}" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.teamList') }}</a></li>
  </ul>

@endsection

@section('content')

  @foreach($matches as $m)
  <div class="rungtynes">
    <p class="data">{{ $m->date }} | pavadinimas : {{ $m->name }} | vieta : {{ $m->place }}
      <a href="../matchEdit/{{$m->id}}"> <span style="color: blue">redaguoti</span> </a>
      <a href="../matchDelete/{{$m->id}}"> <span style="color: red">ištrinti</span> </a>
    </p>
      <div class="rungtyniu_duom">
        <div class="laikas">{{ $m->time }}</div>
        <div class="komandos">
          <div class="komanda1">{{ $m->_team1->name }}</div>
          <div class="dash">-</div>   
          <div class="komanda2">{{ $m->_team2->name }}</div>
        </div>
      </div>
  </div>
  @endforeach
  <div style="margin-top: 20px; margin-left: 10px">
  {{ $matches->links() }}
  </div>
@endsection