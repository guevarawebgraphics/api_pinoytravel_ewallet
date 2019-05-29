<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
        <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}">
        <link rel="icon" href="{{asset('img/icon/favicon.ico')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/bulma-tooltip.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
        <title>{{config('app.name', 'Pinoy Travel | Reseller')}}</title>
        
    </head>
    <body>
        {{-- @include('inc.navbar') --}}
        <div class="container">
            @yield('content')
        </div>
        {{-- <script src="{{asset('/node_modules/bulma-extensions/bulma-tooltip/dist/css/bulma-tooltip.min.css')}}"></script> --}}
        {{-- <script src="{{asset('/node_modules/bulma-extensions/bulma-tooltip/dist/css/bulma-tooltip.min.css')}}"></script>
        --}}
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/sweetalerts2.min.css')}}">   
        <script src="{{asset('js/sweetalerts2.js')}}"></script>
        
    </body>
</html>
