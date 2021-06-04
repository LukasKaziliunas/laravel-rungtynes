<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <title></title>
    <style>
        body{
    
            background-color: darkslategrey;
        }
        
        table{
            margin: 0px;
            padding: 0px;
        }

        table, th, td {
        /* border: 1px solid black; */
        border-collapse: collapse;
        text-align: left;}

        tr:nth-child(odd) {
         
         
         tr:nth-child(even) {
         

         .content{
            margin: 0px;
         }
}
}
    </style>

    </head>
    <body>
        
        <div id="container">
            <div id="header">
                <h1 id="slogan">@yield('title')</h1>
            </div>
            <div id="meniu">
                @yield('meniu')
            </div>
            <div id="middle">
            
                <div id="sidemeniu">

                    <?php $sports = App\Sport::all()  ?>
                   @foreach ($sports as $sport)
                    <div class="button" >
                    <p class="pavadinimas"><a href="/rungtynes/public/matches/{{$sport->id}}"  >{{ $sport->name }}</a></p>
                    </div>
                   @endforeach
                   <!-- <div class="button" >
                        <p class="pavadinimas"><a href="/rungtynes/public/matches/1"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.bs') }}</a></p>
                    </div>
                    <div class="button" >
                        <p class="pavadinimas"><a href="/rungtynes/public/matches/2"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.fb') }}</a></p>
                    </div>
                    <div class="button" >
                        <p class="pavadinimas"><a href="/rungtynes/public/matches/3"  >{{ Config::get('menu' . session()->get('lang', 'LT') .'.ih') }}</a></p>
                    </div>-->
                </div>

                <div id="content">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{!! \Session::get('success') !!}</p>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <p>jūsų įvedamuose duomenyse yra klaidu:</p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                     @endforeach
                                </ul>
                            </div>
                        @endif

                    @yield('content')
                </div>
            </div>
            <div id="footer">
                   
            </div>
            
        </div>
    </body>
</html>