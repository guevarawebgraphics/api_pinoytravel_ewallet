{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

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
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                        <div class="field tooltip is-tooltip-bottom" data-tooltip="Enter your email/username">
                                                <label class="is-left">Email</label>
                                                <div class="control">
                                                        <p class="control has-icons-left">
                                                                <input id="email" class="input is-primary tooltip @error('email') is-invalid @enderror" name="email" data-tooltip="Tooltip Text" value="{{ old('email') }}" type="text" placeholder="Enter Email/Username" required autocomplete="email" autofocus> <span class="icon is-small is-left"><i class="far fa-envelope"></i></span>

                                                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                        </p>
                                                </div>                            
                                        </div>
                                        <div class="field tooltip is-tooltip-bottom" data-tooltip="Enter your password">
                                            <label class="is-left">Password</label>
                                            <div class="control">
                                                                <p class="control has-icons-left has-icons-left">
                                                                        <input id="password" class="input is-primary @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password"> <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>

                                                                        
                                                                        {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
                                                                        
                                                                        @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </p>                            
                                                                    </div>                           
                                                                </div>
                                        <div class="field">
                                            
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>                                            
                                                    
                                        </div>
                                        <div class="field">
                                                @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    @endif

                                        </div>
                        </div>
                </div>
                <div class="has-text-right">                        
                        {{-- <input class="button is-success" type="submit" value="Sign In" style="margin-bottom:1em;margin-right:1em">   --}}
                        <button type="submit" class="button is-success" value="Sign In" style="margin-bottom:1em;margin-right:1em">
                                {{ __('Login') }}
                            </button>             
                                </form>
                </div>
        </div>        
</div>

@endsection



{{-- <form method="POST" action="{{ route('login') }}">
@csrf
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

<label class="form-check-label" for="remember">
    {{ __('Remember Me') }}
</label> --}}