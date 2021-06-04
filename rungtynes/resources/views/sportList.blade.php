@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="sportAdd" >pridėti sporto šaką</a></li>
  </ul>

@endsection

@section('content')

  <table style="background-color: white ; width: 100% ">
  @foreach($sports as $sport)
  <tr>
    <td style="border: 1px solid #dddddd;">{{$sport->name}}</td>
  <td style="border: 1px solid #dddddd;"><a href="sportDelete/{{$sport->id}}">trinti</a> <a href="sportEdit/{{$sport->id}}">redaguoti</a></td>
  </tr>
  @endforeach
  </table>


@endsection