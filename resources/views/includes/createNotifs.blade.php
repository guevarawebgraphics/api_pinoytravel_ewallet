{{-- @if(count($errors) > 0) --}}
    {{-- @foreach($errors->all() as $error) --}}
    {{-- <div class="notification is-danger"> --}}
            {{-- <button class="delete"></button> --}}
            {{-- {{$error}} --}}
                {{-- <p class="title"> Please fill the fields correctly --}}
          {{-- </div> --}}
    {{-- @endforeach --}}
{{-- @endif --}}
@if(count($errors) > 0)
    {{-- <div class="columns is-mobile is-centered">
        <p class="help is-danger is-size-7">Please Fill Up Fields Correctly</p>
    </div> --}}

{{-- 
    <div id="notif" class="columns is-mobile is-centered notification animated fadeIn">
            <button id="notifDelete"class="delete"></button>
           <p class="help is-danger is-size-7">Please Fill Up Fields Correctly</p>
    </div> --}}

    <div id="notif" class="notification is-4 has-text-centered is-danger" style="margin-top:0.5em">
            <button id="notifDelete"class="delete"></button>
           <p class="help is-size-5">Please Fill Up Fields Correctly</p>
    </div>
@endif  

@if(session('success'))
    <div class="columns is-mobile is-centered alert alert-success notification is-success" style="margin-top:0.5em">
        <button class="delete"></button>
            <p class="help is-size-5">{{session('success')}}</p>
    </div>
        {{-- <div class="columns is-mobile is-centered alert alert-success">            
            <p class="help is-success is-size-5">{{session('success')}}</p>                        
        </div> --}}
@endif
@if(session('error'))
    <div class="columns is-mobile is-centered alert alert-danger notification is-danger" style="margin-top:0.5em">
        <button class="delete"></button>
            <p class="help is-size-5">{{session('error')}}</p>                        
    </div>            
        {{-- <div class="columns is-mobile is-centered alert alert-danger"> --}}
            {{-- <button class="delete"></button> --}}            
            {{-- <p class="help is-danger is-size-5">{{session('error')}}</p>--}}
        {{-- </div> --}}
@endif
@if(session('hold'))
    <div class="columns is-mobile is-centered alert alert-success notification is-warning" style="margin-top:0.5em">
        <button class="delete"></button>
            <p class="help is-size-5">{{session('hold')}}</p>
    </div>
        {{-- <div class="columns is-mobile is-centered alert alert-success">            
            <p class="help is-success is-size-5">{{session('success')}}</p>                        
        </div> --}}
@endif