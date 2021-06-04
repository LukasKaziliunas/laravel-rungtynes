
@extends('layout')

@section('title', 'Sporto rungtynės');

@section('meniu')
<ul>
      <li><a href="../index.html"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.main') }}</a></li>
      <li><a href="../newsAdd/{{$sportId}}"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.addNews') }}</a></li>
  </ul>

@endsection

@section('content')
<div class="container">
        <table class="table table-striped">
        @foreach ($news as $n)
             <tr>
             <th>   
                <div style="width: 595px">
                        <div class="description-field" style="width: 500px ; float:left"> <h1 style="color: white"> {{$n->description}} </h1> </div>
                        <div class="news-article-buttons" style="width: 95px ; float:right"><a href="../newsEdit/{{$n->id}}" >redaguoti</a> <a href="../newsDelete/{{$n->id}}" >trinti</a></div>
                </div>
             </tr>
             </tr>
             <tr>
              <th> <p style="color: #939b9f"> {{$n->text}} </p> </th>
             </tr>
             
        @endforeach
        
</table>
{{ $news->links() }}
</div>
@endsection