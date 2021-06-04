@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
   <ul>
      <li><a href="lang/1" >EN</a></li>
      <li style="color: white">|</li>
      <li><a href="lang/2" >LT</a></li>
      <li><a href="contacts" >{{ Config::get('menu' . session()->get('lang', 'LT') .'.contacts') }}</a></li>
   </ul>

@endsection

@section('content')

   <li><a href="sportAdd" >prideti sporto šaka</a></li><br>
   <li><a href="sportList" >sporto šakų sąrašas</a></li>
@endsection