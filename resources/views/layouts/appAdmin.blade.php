<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
        <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}">
        <link rel="icon" href="{{asset('img/icon/favicon.ico')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/bulma-tooltip.min.css')}}">   
        <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">     
        <title>{{config('app.name', 'Pinoy Travel | Reseller')}}</title>
        <script src="{{asset('js/pace.min.js')}}"></script>
        <style>.pace { -webkit-pointer-events: none; pointer-events: none; -webkit-user-select: none; -moz-user-select: none; user-select: none; } .pace-inactive { display: none; } .pace .pace-progress { background: #29a0da; position: fixed; z-index: 2000; top: 0; right: 100%; width: 100%; height: 4px; }</style>

    </head>
    <body>
        {{-- @include('inc.navbar') --}}
        <div class="container animated fadeIn">
            {{-- DEFAULT VIEW FOR DASHBOARD IS RESERVATIONS--}}
            <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                    <a class="navbar-item" href="/reseller/view">
                        <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" width="112" height="28">
                    </a>
                
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                    </div>
                
                    <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-end">
                        <div class="navbar-item">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Administrator
                            </a>            
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="/reseller/view">
                                    Administrator
                                </a>
                                <hr class="navbar-divider">                
                                <a class="navbar-item" href="#">
                                    Reseller Acct 1
                                </a>
                                <a class="navbar-item" href="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX7056622.jpg">
                                    Reseller Acct 2
                                </a>
                                <a class="navbar-item" href="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX7056622.jpg">
                                    Reseller Acct 3                    
                                </a>
                            </div>
                        </div>          
                            <div class="buttons">
                            <a class="button is-danger is-small" href="/admin/login">
                            <strong>Log Out</strong>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </nav>
                <div class="columns is-clearfix" style="margin: 1em">
                        <aside class="menu column is-3">
                        <p class="menu-label">
                            Admin
                        </p>
                        <ul class="menu-list">
                            <li><a href="/reseller/create">Create Reseller Account</a></li>
                            <li><a href="/reseller/edit">Edit Reseller Information</a></li>
                            <li><a href="/reseller/delete">Delete Reseller</a></li>        
                            <li><a href="/reseller/hold">Hold Reseller</a></li>               
                            <li><a href="/reseller/view">View Reseller Account</a></li>        
                            <li><a href="/reseller/wallet">Get Total Wallet Value</a></li>        
                            <li><a href="#">Reports</a></li>        
                        </ul>
                        </aside>                
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
