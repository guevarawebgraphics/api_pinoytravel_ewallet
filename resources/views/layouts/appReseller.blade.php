<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="icon" href="{{asset('img/icon/favicon.ico')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/bulma-tooltip.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">    
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/dataTables.bulma.min.css')}}">
        {{-- <script src="{{asset('js/dataTables.bulma.min.js')}}"></script> --}}
        <script src="{{asset('js/datatable.min.js')}}"></script>
        {{-- <title>{{config('app.name', 'Pinoy Travel | Reseller')}}</title> --}}
        <title>{{ config('app.name', 'Pinoy Travel | Reseller') }}</title>
        <script src="{{asset('js/pace.min.js')}}"></script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>.pace { -webkit-pointer-events: none; pointer-events: none; -webkit-user-select: none; -moz-user-select: none; user-select: none; } .pace-inactive { display: none; } .pace .pace-progress { background: #29a0da; position: fixed; z-index: 2000; top: 0; right: 100%; width: 100%; height: 4px; }</style>
        
    </head>
    <body>
        {{-- @include('inc.navbar') --}}
        <div class="container animated fadeIn">
            {{-- DEFAULT VIEW FOR DASHBOARD IS RESERVATIONS--}}

            <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                    <a class="navbar-item" href="/reseller/reservation/view">
                        <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" width="112" height="28">
                        
                    </a>
                
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                    </div>
                
                    <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="/reseller/reservation/view">
                        Reservations
                        </a>
                
                        <a class="navbar-item" href="/reseller/topup">
                        Top-up E-Wallet
                        </a>
                        <a class="navbar-item" href="/reseller/commission/view">
                        Commission
                        </a>          
                        {{-- <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Commission
                            </a>
                            
                            <div class="navbar-dropdown">
                                <a class="navbar-item">
                                    About
                                </a>
                                <a class="navbar-item">
                                    Jobs
                                </a>
                                <a class="navbar-item">
                                    Contact
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item">
                                    Report an issue
                                </a>
                            </div>
                        </div> --}}
                    </div>
                    
                    <div class="navbar-end">
                        <div class="navbar-item">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                    {{ Auth::user()->name }}
                            </a>
                            
                            <div class="navbar-dropdown">
                                Logged in as
                                <a class="navbar-item has-text-link has-text-weight-bold">
                                   Reseller
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="/reseller/transactions">
                                    Top Up History
                                </a>
                                <a class="navbar-item" href="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX7056622.jpg">
                                    Reseller Acct 2
                                </a>
                                <a class="navbar-item" href="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX7056622.jpg">
                                    Reseller Acct 3                    
                                </a>
                                {{-- <hr class="navbar-divider"> --}}
                                {{-- <a class="navbar-item">
                                    Reseller Acct 2                    
                                </a> --}}
                            </div>
                        </div>          
                            <div class="buttons">

                                <button class="button is-danger is-small modal-button" data-target="modalLogout">                            
                                    <strong>Log Out</strong>
                                </button>

                            {{-- <a class="button is-light">
                            Log in
                            </a> --}}
                        </div>
                        </div>
                    </div>
                    </div>
                </nav>
            @yield('content')
        {{-- MODAL FOR LOGOUT --}}
        <div class="modal animated fadeIn" id="modalLogout">
                <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title"><span class="file-icon is-inline"><i class="fas fa-sign-out-alt"></i></span>Log Out</p>
                            <button class="delete" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                        Are you sure?
                    </section>
                    <footer class="modal-card-foot">                            
                        <form id="out" action="{{route('logout')}}" method="POST">
                            @csrf                                                                                              
                        </form>
                        <button class="button is-danger" onclick="$('#out').submit();">Logout</button>
                        <button class="button">Cancel</button>
                    </footer>
                </div>
        </div>
                {{-- END OF MODAL FOR LOGOUT --}}               
        </div>
        {{-- <script src="{{asset('/node_modules/bulma-extensions/bulma-tooltip/dist/css/bulma-tooltip.min.css')}}"></script> --}}
        {{-- <script src="{{asset('/node_modules/bulma-extensions/bulma-tooltip/dist/css/bulma-tooltip.min.css')}}"></script>
        --}}        
        
        <script src="{{asset('js/script.js')}}"></script>
        {{-- <script src="{{asset('js/bulma-toast.min.js')}}"></script> --}}
        <link rel="stylesheet" href="{{asset('css/sweetalerts2.min.css')}}">   
        <script src="{{asset('js/sweetalerts2.js')}}"></script>
    </body>
</html>
