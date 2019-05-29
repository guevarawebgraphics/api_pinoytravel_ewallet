@extends('layouts.appAdmin')
@section('content')             
        <div class="column auto" style="">
          {{-- title--}}
          <h1 class="title is-3">
              {{-- <a id="iconPicker" href="#" class="is-4"> <i class="fas fa-arrow-left"></i>  --}}
        </a>Edit Reseller Account</h1>
          {{-- START OF PARENT FORM TAG--}}          
                {{-- <form action="{{action('update')}}" method="post"> --}}
                {{-- <form action="{{ 'ResellerController@store', $reseller->id) }}" method="POST" > --}}
                {{-- <form method="POST" action="{{route('reseller.update',$reseller->id)}}"> --}}
                {{-- <form method="post" action="{{action('ResellerController@update',$reseller->id)}}"> --}}
                {{-- gumagana tong 3rd --}}
                {{-- <form method="post" action="{{route('reseller.update',$reseller->id)}}"> --}}
                <form method="post" action="/reseller/{{$reseller->reseller_id}}">
                    {{-- <input type="hidden" name="_method" value="PUT">  --}}
                    {{-- {{method_field('PUT')}}--}}
                    @method('PUT')
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    <input type="hidden" name="Edit" value="1">
                    
                    {{--CSRF token--}} 
                    {{-- {{ csrf_field() }} --}}
                    @csrf

                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    {{-- @method('PUT') --}}
                    {{-- {{ method_field('PUT') }} --}}
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    {{-- {{csrf_field()}} --}}
                    {{-- <input type="hidden" name="_method" value="PATCH">                   --}}
                    {{-- form start--}}
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input" name="Name" style="text-transform: capitalize;" type="name" placeholder="Enter a Name" value="{{old('Name', $reseller->name)}}">
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
                                    <input class="input" name="Email" type="email" placeholder="Enter Email" value="{{old('Email', $reseller->email)}}">
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
                                        <input class="input" type="text" style="text-transform: capitalize;" name="Address" placeholder="Enter Address" value="{{old('Address', $reseller->address)}}">
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
                                    <input class="input" type="text" name="Contact" placeholder="Enter Contact No." value="{{old('Contact',$reseller->contact_no)}}">
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
                                        <input class="input" type="password" name="Password" placeholder="Default('*pass@csi')" value="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    {{-- form end--}}

                    {{-- form start--}}
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" style="white-space: nowrap">Confirm Password</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="password" placeholder="" value="">
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
                                                <img src="" alt="{{$reseller->profile_pic}}" height="100px" width="150px">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- form end--}}   

                    {{-- form start--}}
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                {{-- <label class="label">Image</label>--}}
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="file is-info has-name">
                                        <label class="file-label">                              
                                        <input class="file-input" type="file" name="resume">
                                        <span class="file-cta">
                                            <span class="file-icon"><i class="fas fa-upload"></i></span>
                                            <span class="file-label"> Upload File </span>
                                        </span>
                                            <span class="file-name"> image.png </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- form end--}}          
              

                    {{-- form start--}}
                    <div class="field is-grouped is-grouped-centered" style="margin-top:1em">
                        <p class="control">                    
                        {{-- <a class="button is-success">
                                <span class="file-icon">
                                        <i class="fa fa-edit"></i>
                                </span>
                                Edit Reseller
                        </a> --}} 
                        {{-- <input type="hidden" name="_method" value="PUT"> --}}                                                                                    
                            <button type='submit' class="button is-success">
                                <span class="file-icon">
                                        <i class="fas fa-plus"></i>
                                </span>
                                Edit Reseller
                            </button>                  
                        </p>
                        <p class="control">
                            <a class="button is-light" href="/reseller/{{$reseller->reseller_id}}/edit">
                                Cancel
                            </a>
                        </p> 
                    </div>
                    @include('includes.createNotifs')
                    {{-- form end--}}           
          </form>
          {{-- END OF PARENT FORM TAG--}}                   
      </div>   
    </div>
@endsection


