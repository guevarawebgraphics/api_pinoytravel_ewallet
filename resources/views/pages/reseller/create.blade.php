@extends('layouts.appAdmin')
@section('content')           
    <div class="column auto" style="">
        {{-- title--}}
        <h1 class="title is-3">Create Reseller Account</h1>
        {{-- START OF PARENT FORM TAG--}}
        <form action="{{ route('reseller.store') }}" method="post">
        {{-- <form action="/" method="post"> --}}
        {{--CSRF token--}}
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

        {{-- form start--}}
            {{-- {{ csrf_field() }} --}}
            @csrf
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Name</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input type="name" style="text-transform: capitalize;" name="Name" class="input" placeholder="Enter Name" value="{{ old('Name') }}">
                                @if ($errors->has('Name'))
                                    <p class="help is-danger">{{ $errors->first('Name') }}</p>                      
                                @endif
                        </p>
                    </div>
                </div>
            </div>
            {{-- form end--}}

            {{-- form start--}}
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input type="email" name="Email" class="input" placeholder="Enter Email" value="{{ old('Email') }}">
                                @if ($errors->has('Email'))
                                    <p class="help is-danger">{{ $errors->first('Email') }}</p>                      
                                @endif
                        </p>
                    </div>
                </div>
            </div>
            {{-- form end--}}

            {{-- form start--}}
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Address</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input type="text" style="text-transform: capitalize;" name="Address" class="input" placeholder="Enter Address" value="{{ old('Address') }}">
                                @if ($errors->has('Address'))
                                    <p class="help is-danger">{{ $errors->first('Address') }}</p>                      
                                @endif
                        </p>
                    </div>
                </div>
            </div>
            {{-- form end--}}

            {{-- form start--}}
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Contact No.</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input type="text" name="Contact" class="input" placeholder="Enter Contact No." value="{{ old('Contact') }}">
                                @if ($errors->has('Contact'))
                                    <p class="help is-danger">{{ $errors->first('Contact') }}</p>                      
                                @endif
                        </p>
                    </div>
                </div>
            </div>
            {{-- form end--}}

            {{-- form start--}}
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Password</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input type="text" name="Password" class="input" placeholder="Default('*pass@csi')" value="*pass@csi" disabled>                      
                        </p>
                    </div>
                </div>
            </div>
            {{-- form end--}}

            {{-- form start--}}
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Image</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="file is-info has-name">
                            <label class="file-label">
                                <input type="file" name="resume" class="file-input">
                                    <span class="file-cta">
                                        <span class="file-icon"><i class="fas fa-upload"></i></span>
                                        <span class="file-label"> Upload File</span>
                                    </span>
                                    <span class="file-name"> image.png </span>
                            </label>
                        </div>
                        <p class="help is-danger">This image is invalid</p>
                    </div>
                </div>
            </div>
            {{-- form end--}}

            {{-- form start--}}
            <div class="field is-grouped is-grouped-centered" style="margin-top:1em">
                    <p class="control">                    
                        <button type='submit' class="button is-success">
                                <span class="file-icon">
                                        <i class="fas fa-plus"></i>
                                </span>
                                Create Reseller
                        </button>                    
                    </p>
                    {{-- <p class="control">
                    <a class="button is-light">
                        Cancel
                    </a>
                    </p> --}}                                  
            </div>
                @include('includes.createNotifs')
            {{-- form end--}} 
                                         
        </form>
        {{-- END OF PARENT FORM TAG--}}
    </div>   
</div>
@endsection


