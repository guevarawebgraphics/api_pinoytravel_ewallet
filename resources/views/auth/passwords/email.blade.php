@extends('layouts.app')

@section('content')

<div class="has-text-centered animated fadeIn">
    <a href="/">
        <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" style="margin-top:4em; margin-bottom:2em;">
    </a>
</div>
<div class="columns animated fadeIn">        
    <div class="column is-three-fifths is-offset-one-fifth card">
        <header class="card-header">
                <p class="card-header-title"> {{ __('Reset Password') }} - PinoyTravel Reseller </p>          
        </header>

        <div class="card-content">
                @if (session('status'))
                    <div class="notification is-success">
                        <button class="delete"></button>
                        {{ session('status') }}
                    </div>
                    {{-- <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div> --}}

                    {{-- <script>
                        bulmaToast.toast({ 
                            message: "{{ session('status') }}}",
                            dismissible: true,
                            duration: 3000,
                            pauseOnHover: true,
                            animate: { in: "fadeIn", out: "fadeOut" },
                            type: "is-success" 
                        });
                    </script> --}}
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @error('email')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <p class="control has-icons-left">
                                <input id="email" type="email" class="input is-primary tooltip @error('email') is-invalid  @enderror" placeholder="Please Enter your Email here.." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="icon is-small is-left"><i class="far fa-envelope"></i></span>
                            </p>
                        </div>
                    </div>

                    
                
        </div>
        <div class="has-text-right">  
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="button is-success">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </div>

        </form>
    </div>
</div>
<footer class="footer animated bounceIn has-background-white">
    <div class="has-text-centered">
        <p>
        <strong><?php echo env("APP_VERSION"); ?></strong> - PinoyTravelReseller
        </p>
    </div>
</footer>

@endsection
