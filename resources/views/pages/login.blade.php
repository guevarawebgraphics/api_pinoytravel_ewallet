@extends('layouts.app')
@section('content')        

  

<div class="has-text-centered animated fadeIn">
        <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" style="margin-top:4em; margin-bottom:2em;">
</div>
<div class="columns animated fadeIn">        
        <div class="column is-three-fifths is-offset-one-fifth card">
                <header class="card-header">
                        <p class="card-header-title"> Sign In to PinoyTravel Reseller </p>          
                </header>
                <div class="card-content">
                        <div class="content">
                                <form action="/reseller/view">
                                        <div class="field tooltip is-tooltip-bottom" data-tooltip="Enter your email/username">
                                                <label class="is-left">Email</label>
                                                <div class="control">
                                                        <p class="control has-icons-left">
                                                                <input class="input is-primary tooltip" data-tooltip="Tooltip Text" type="text" placeholder="Enter Email/Username"> <span class="icon is-small is-left"><i class="far fa-envelope"></i></span>
                                                        </p>
                                                </div>                            
                                        </div>
                                        <div class="field tooltip is-tooltip-bottom" data-tooltip="Enter your password">
                                                <label class="is-left">Password</label>
                                                        <div class="control">
                                                                <p class="control has-icons-left has-icons-left">
                                                                        <input class="input is-primary" type="password" placeholder="Enter your password"> <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                                                </p>                            
                                                        </div>                           
                                        </div>
                        </div>
                </div>
                <div class="has-text-right">                        
                        <input class="button is-success" type="submit" value="Sign In" style="margin-bottom:1em;margin-right:1em">               
                                </form>
                </div>
        </div>        
</div>

@endsection


