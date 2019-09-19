@extends('testing.appTest')
@section('content')        
        <div class="column auto" style=" overflow-x: auto;">


            
                {{-- title--}}
                <h1 class="title is-4">Create Reseller Account</h1>
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
                                        Save
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
            

          {{-- title--}}
          <h1 class="title is-4">Reseller Accounts</h1>
          <button type='submit' class="button is-success">
                <span class="file-icon">
                        <i class="fas fa-plus"></i>
                </span>
                Create Reseller
        </button>
            {{-- start of search bar--}}    
            <div class="field has-addons is-grouped is-grouped-right">
                <form action="/test2" method="GET">
                    <div class="control">
                        <input class="input is-small" type="text" name="Search" placeholder="Find Reseller">
                        @csrf
                    </div>
                    <div class="control">
                        <button class="button is-info is-small" type="submit"> Search</button>
                    </div>
                        {{-- <a class="button is-info is-small" type="submit">
                            Search
                        </a> --}}
                    {{-- <div class="control">
                    </div>                     --}}
                </form>
                    {{-- <div class="control">
                        <input class="input is-small" type="text" placeholder="Find a repository">
                    </div>
                    <div class="control">
                        <a class="button is-info is-small">
                            Search
                        </a>
                    </div> --}}
            </div>      
            {{-- end of search bar--}}  
            {{-- start of table--}}          
            <table class="table is-clear-fix is-bordered is-fullwidth is-striped" style="margin-bottom: 1.5em">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Image</th>  
                        <th>Actions</th>  
                        {{-- <th></th>--}}
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Image</th>
                        <th></th>
                        </tr>
                    </tfoot> --}}
                <tbody>
                    {{-- START CHECK RESELLER TABLE FOR DATA --}}
                    @if(count($reseller) >= 1)
                        @foreach($reseller as $resellers)
                            <tr class="">
                                <td>{{ $resellers->name}}</td>                        
                                <td>{{$resellers->email}}</td>
                                <td>{{$resellers->address}}</td>
                                <td>{{$resellers->contact_no}}</td>
                                <td><img src="" alt="{{$resellers->profile_pic}}" height="25px" width="100px"></td>                                                                        
                                <td>
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <a class="button is-rounded" href="/reseller/{{$resellers->reseller_id}}">View</a>                                            
                                        </div>
                                        <div class="control">
                                            <a class="button is-rounded">Edit</a>
                                        </div>
                                        <div class="control">
                                            <a class="button is-rounded">Hold</a>
                                        </div>
                                        <div class="control">
                                            <a class="button is-rounded">Delete</a>
                                        </div>
                                      </div>     
                                    {{--  TIPS --}}
                        {{-- <ul class="menu-list">
                            <li><a href="/reseller/create">Create Reseller Account</a></li>
                            <li><a href="/reseller/edit">Edit Reseller Information</a></li>
                            <li><a href="/reseller/delete">Delete Reseller</a></li>        
                            <li><a href="/reseller/hold">Hold Reseller</a></li>               
                            <li><a href="/reseller/view">View Reseller Account</a></li>        
                            <li><a href="/reseller/wallet">Get Total Wallet Value</a></li>        
                            <li><a href="#">Reports</a></li>        
                        </ul>                                    
                                </td>
                                {{-- <td>
                                    <p class="control is-centered">                    
                                        <a class="button is-success" href="/viewRacctForm">
                                            <span class="file-icon">
                                                <i class="fas fa-folder-open"></i>
                                            </span>
                                                View
                                        </a>
                                    </p>
                                </td> --}}
                            </tr>
                        @endforeach
                        
                        {{-- IF THERE WERE NO reseller TO FETCH --}}                    
                    @else
                        {{-- <tr></tr> --}}
                    </tbody>
            </table>
                <p class="title is-5 has-text-centered">No Reseller Account Found </p>
                    @endif
                
                
                {{-- <tr>
                    <th>Sample</th>
                    <td>sample@sample.com</td>
                    <td>Sample City</td>
                    <td>+1235-3524-6544</td>
                    <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAAB9CAMAAABH0HuwAAAAM1BMVEX///8EBARBQUHu7u4TExNgYGBQUFC/v7+fn5/f398xMTGurq4iIiLOzs5vb2+Pj49/f39vBQ4DAAAB7UlEQVR4nO2a3ZLCIAxGCxT6p7Xv/7Rr6apbW0iVEDqz37ncG88kJiRZqwoAAAAAAAAAAADDqJVHj0NZEzPV6g/1ZMq53FYqXudWSMXodxWfrSLBuW7C8huc63lcStiYS8hFqYt0plzYRSkn6zLEXJSS7TiRJPlESbq0cRelWkGZnpLp5Vw6ykWpTkyGzJJkniwtY8Vkdh+lNfp/ytAuSonJEC1vRq7tnSpNp5KZaJlJTIZ4s2fk3m1DywjOV9HRakZyvGoomUZQ5lTDFRUa0cCcayCvTHBtui9O4kvlNSxTYKUMjnuSwzhlU8TlnqmdAr8UyNGCGd9dxoLXoqpbzeZWbkHZx7TWr3S9bUtGBYBP6EYXfJkbN0pWVePXA7f7kUuxa6khonluKm4zdg/P0UJEx6wmmdq2z/h0rV3NFS573xl25hjt2f69zryvHLjMrN6HjCqGvOW902dL1ecu+Wy+cclm85VLpivsh9/dFxm+xQfOrSHYp+IusidR1NxPFXl3iMG8YZJnhzi879SBK14M1gtfYmB4Q/N1WT9gLO8DNzwKvj6c0GMe8PWapLpe4KvudBe+f2wk19IMVz3dOGS4fj6SXNgzXMWd2H4XuJpwwoP9omaS4XBhKyfIhNAsMMkAAAAAAAAAAABbfgCCshA8UlE1ggAAAABJRU5ErkJggg==" height="25px" width="100px"></td>                                                
                    <td>
                        <p class="control is-centered" style="margin-top:1em">                    
                            <a class="button is-success" href="/viewRacctForm">
                                <span class="file-icon">
                                    <i class="fas fa-folder-open"></i>
                                </span>
                                View Reseller
                            </a>
                        </p>
                    </td>
                </tr> --}}
                </tbody>
            </table>
        
            {{-- end of table--}}          
            {{-- start of pagination--}}          
            {{-- <nav class="pagination" role="navigation" aria-label="pagination" style="margin-bottom:1.5em">
                    <a class="pagination-previous">Previous</a>
                    <a class="pagination-next">Next page</a>
                    <ul class="pagination-list">
                        <li>
                            <a class="pagination-link" aria-label="Goto page 1">1</a>
                        </li>
                        <li>
                        <span class="pagination-ellipsis">&hellip;</span>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 45">45</a>
                    </li>
                    <li>
                        <a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 47">47</a>
                    </li>
                    <li>
                        <span class="pagination-ellipsis">&hellip;</span>
                    </li>
                    <li>
                        <a class="pagination-link" aria-label="Goto page 86">86</a>
                    </li>
                </ul>
            </nav>         --}}
            {{-- end of pagination--}}          
          {{-- form start--}}
          {{-- <div class="field is-grouped is-grouped-centered" style="margin-top:1em">
                <p class="control">                    
                  <a class="button is-success">
                        <span class="file-icon">
                                <i class="fas fa-plus"></i>
                        </span>
                        Edit Reseller
                  </a>
                </p>
                <p class="control">
                  <a class="button is-light">
                    Cancel
                  </a>
                </p> 
            </div> --}}
          {{-- form end--}}          
          {{$reseller->links()}}
      </div>         
    </div>         
@endsection


