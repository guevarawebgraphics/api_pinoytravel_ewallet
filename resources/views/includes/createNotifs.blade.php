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
    <div class="columns is-mobile is-centered">
        <p class="help is-danger is-size-7">Please Fill Up Fields Correctly</p>
    </div>
@endif  

@if(session('success'))
    <div class="columns is-mobile is-centered alert alert-success">
            {{-- <button class="delete"></button> --}}
            <p class="help is-success is-size-5">{{session('success')}}</p>            
            
        </div>
        @endif
        @if(session('error'))
        <div class="columns is-mobile is-centered alert alert-danger">
            {{-- <button class="delete"></button> --}}            
            <p class="help is-danger is-size-5">{{session('error')}}</p>                        
        </div>
@endif