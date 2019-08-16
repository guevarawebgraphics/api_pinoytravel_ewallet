<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pinoy Travel | Reseller') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="{{asset('img/icon/favicon.ico')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bulma-tooltip.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bulma.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bulma.min.css')}}">

    {{-- <link rel="stylesheet" href="{{asset('css/datatable.css')}}"> --}}

    <script src="{{asset('js/jquery-3.3.1.min.js')}}" ></script>

    {{-- <script src="{{asset('js/dataTables.bulma.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bulma.js')}}"></script> --}}

    <script src="{{asset('js/datatable.min.js')}}"></script>
    <script src="{{asset('js/datatable.js')}}"></script>
    <script src="{{asset('js/bulma-toast.min.js')}}"></script>
    
    <title>{{config('app.name', 'Pinoy Travel | Reseller')}}</title>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Scripts -->
    <style>.pace { -webkit-pointer-events: none; pointer-events: none; -webkit-user-select: none; -moz-user-select: none; user-select: none; } .pace-inactive { display: none; } .pace .pace-progress { background: #29a0da; position: fixed; z-index: 2000; top: 0; right: 100%; width: 100%; height: 4px; }</style>
</head>
<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <div class="container">
            @yield('content')
    </div>
    <script src="{{asset('js/script.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/sweetalerts2.min.css')}}">   
    <script src="{{asset('js/sweetalerts2.js')}}"></script>
</body>
</html>
