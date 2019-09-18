@extends('layouts.appAdmin')

@section('content')        
        <div class="column auto" style=" overflow-x: auto;">
            <div class="box">
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
              {{-- <form method="post" action="/admin/update/{{$reseller->id}}"> --}}
                <form id="form{{$reseller->id}}Edit" method="post" action="/admin/update/{{$reseller->id}}">
                @method('PUT')
                @csrf                                            
                <input type="hidden" name="Edit" value="1">
                  {{-- <input type="hidden" name="_method" value="PUT">  --}}
                  {{-- {{method_field('PUT')}}--}}
                  {{-- @method('PUT') --}}
                  {{-- <input type="hidden" name="_method" value="PUT"> --}}
                  {{-- <input type="hidden" name="Edit" value="1"> --}}
                  
                  {{--CSRF token--}} 
                  {{-- {{ csrf_field() }} --}}
                  {{-- @csrf --}}

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
                            <label class="label">Account Balance</label>
                        </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <?php
                                if(!empty($walletBal[0]->userId)){
                                    if($walletBal[0]->userId == $reseller->id){
                                        
                                        $bal = number_format((float)$walletBal[0]->total_balance, 2, '.', ',');
                                        $balCompute = $walletBal[0]->total_balance;
                                        $userIdBal = $walletBal[0]->userId;
                                    }else{
                                        $bal = number_format((float)0, 2, '.', ',');
                                        $balCompute = 0;
                                        $userIdBal = 0;
                                    }
                                }else{
                                    $bal = number_format((float)0, 2, '.', ',');
                                    $balCompute = 0;
                                    $userIdBal = 0;
                                }
                               ?>

                                <input type="hidden" name="" id="userId" value="{{ $reseller->id }}">
                                <input class="input" type="text" name="ewalletbal" placeholder="₱0.00" value="₱{{old('ewalletbal',$bal)}}" readonly>
                                
                            </p>
                            <br>
                            <div id="divEWBal" class="box" style="display:none;">

                                    <p class="modal-card-title"><span class="file-icon is-inline"><i class="fas fa-credit-card"></i></span>Manage Account Balance</p> 
                                    <hr>
                                    <p class="has-text-info has-text-weight-bold">Note:</p> 
                                    <em>You are trying to modify the Account Balance of <b>{{$reseller->name}}</b></em>
                                    <br>
                                    <br>
                                    <div class="field">
                                        <label class="label">Enter your amount</label>
                                        <div class="control">
                                            <input class="input decimal"  id='second' type="text"  placeholder="e.g 15000.00" require>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="field">
                                    <div class="control">
                                        <label class="radio">
                                        <input type="radio" name="balOption" class="input_amount" value="add">
                                        Add to reseller account
                                        </label>
                                        <label class="radio">
                                        <input type="radio" name="balOption" class="input_amount" value="deduct">
                                        Deduct to reseller account
                                        </label>
                                    </div>
                                    </div>

                                    <br>

                                    Account balance: <b>₱{{ $bal }}</b>
                    
                                    <br />
                                    <div class="field">
                                        <div class="control">
                                            Total account balance: <b><span id="total_expenses1"></span></b>
                                        </div>
                                    </div>
                    
                                    <hr>
                    
                                    <div class="field">
                                    <label class="label">Enter your password</label>
                                    <div class="control">
                                        <input class="input" id="modifyPwd" type="password" name="modifyPwd" require>
                                    </div>
                                    </div>
                                    <br>
                                <a class="button is-info" data-userId="{{ $reseller->id }}" id="proceedBal">
                                        Continue
                                    </a>
                            </div>
                            <a class="" onClick="toggleEWBal();">
                                <em id="hideLabel">Click here to manage balance..</em>
                            </a>
                        </div>
                    </div>
                    </div>

                    
                {{-- form end--}}

                  {{-- form start--}}
                      <div class="field is-horizontal">
                          <div class="field-label is-normal">
                              <label class="label">New Password</label>
                          </div>
                          <div class="field-body">
                              <div class="field">
                                  <p class="control">
                                  <input class="input" type="password" name="password" placeholder="Enter a Password" value="{{old('password')}}">
                                            @if ($errors->has('password'))
                                                <p class="help is-danger">{{ $errors->first('password') }}</p>                      
                                            @endif                                       
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
                                      <input name="password_confirmation" class="input" type="password" placeholder="" value="">
                                  </p>
                              </div>
                          </div>
                      </div>
                  {{-- form end--}}

                  {{-- form start--}}
                      {{-- <div class="field is-horizontal">
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
                      </div> --}}
                  {{-- form end--}}   

                  {{-- form start--}}
                      {{-- <div class="field is-horizontal">
                          <div class="field-label is-normal">
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
                      </div> --}}
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
                          <a class="button is-success modal-button" data-target="modalEdit{{$reseller->id}}">
                          {{-- <button class="button is-success" type="submit"> --}}
                          {{-- <button class="button is-success modal-button" data-target="modalEdit{{$reseller->id}}"> --}}
                              <span class="file-icon">
                                      <i class="fas fa-plus"></i>
                              </span>
                              Save
                            </a>                  
                      </p>
                      <p class="control">
                          <a class="button is-light" href="/admin/edit/reseller/{{$reseller->id}}">
                              Cancel
                          </a>
                      </p> 
                  </div> 
                  
                  
                {{-- MODAL FOR EDIT --}}                                
                <div class="modal animated fadeIn" id="modalEdit{{$reseller->id}}">
                        <div class="modal-background"></div>
                            <div class="modal-card">
                                <header class="modal-card-head">
                                <p class="modal-card-title"><span class="file-icon is-inline"><i class="far fa-edit"></i></span>Edit Account</p> 
                                    <button class="delete" aria-label="close"></button>
                                </header>
                                <section class="modal-card-body">
                                Edit the account of <p class="has-text-weight-bold is-inline">{{$reseller->name}}</p>?
                            </section>
                            <footer class="modal-card-foot">                                                                      
                                    <button class="button is-success has-text-weight-bold" type="submit">Edit</button>
                                </form>
                                <button class="button">Cancel</button>
                            </footer>
                        </div>
                </div>
                {{--END OF MODAL FOR EDIT --}}
                  {{-- form end--}}           
        {{-- </form> --}}
        {{-- END OF PARENT FORM TAG--}}   


    </div>
    @include('includes.createNotifs')
    
    <div class="box">
          {{-- title--}}
          <h1 class="title is-3">Reseller Accounts</h1> 
          <a href="/admin/create/reseller" class="button is-success"><span class="file-icon"><i class="fas fa-plus"></i></span>Create</a>                     
          <br><br>  
          {{-- start of search bar--}}    
            <div class="field has-addons is-grouped is-grouped-right">
                    <div class="control">
                            {{-- <form action="/test2" method="GET"> --}}
                            <form action="/admin/search/reseller" method="GET">
                            <input class="input is-small" type="text" name="Search" placeholder="Find Reseller">
                            @csrf
                        </div>
                        <div class="control">
                            <button class="button is-info is-small" type="submit"> Search</button>
                            </form>
                        </div>
                            {{-- <a class="button is-info is-small" type="submit">
                                Search
                            </a> --}}
                        {{-- <div class="control">
                        </div>                     --}}
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
            <div class="" style="overflow-y: auto;">      
            <table class="table is-clear-fix is-bordered is-fullwidth is-striped" style="margin-bottom: 1.5em">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Account Balance</th>
                        {{-- <th>Image</th>   --}}
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
                    @if(count($resellers) >= 1)
                        @foreach($resellers as $reseller)
                            <tr class="">
                                <td>{{$reseller->name}}</td>                        
                                <td>{{$reseller->email}}</td>
                                <td>{{$reseller->address}}</td>
                                <td>{{$reseller->contact_no}}</td>
                                <td>
                                ₱{{ number_format((float)$reseller->total_balance, 2, '.', ',') }}
                                </td>
                                {{-- <td><img src="" alt="{{$reseller->profile_pic}}" height="25px" width="100px"></td>                                                                         --}}
                                <td>
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <a class="button is-rounded" href="/admin/reseller/{{$reseller->id}}">View</a>                                            
                                        </div>
                                        <div class="control">
                                            <a class="button is-rounded" href="/admin/edit/reseller/{{$reseller->id}}">Edit</a>
                                        </div>
                                        <div class="control">
                                                @if($reseller->on_hold == 1)
                                                <a class="button is-rounded modal-button is-warning" data-target="modalHold{{$reseller->id}}">On Hold</a>
                                                @else
                                                <a class="button is-rounded modal-button" data-target="modalHold{{$reseller->id}}">Hold</a>
                                                @endif
                                        </div>
                                        <div class="control">
                                            <a class="button is-rounded modal-button" data-target="modalDelete{{$reseller->id}}">Delete</a>
                                        </div>
                                      </div>     



                            {{-- MODAL FOR HOLD --}}
                            <div class="modal animated fadeIn" id="modalHold{{$reseller->id}}">
                                    <div class="modal-background"></div>
                                        <div class="modal-card">
                                            <header class="modal-card-head is-warning">
                                                    @if($reseller->on_hold == 0)
                                                <p class="modal-card-title"><span class="file-icon is-inline"><i class="fas fa-lock"></i></span>Hold Account</p>
                                                <button class="delete" aria-label="close"></button>
                                            </header>
                                            <section class="modal-card-body">
                                            The account of <p class="has-text-weight-bold is-inline">{{$reseller->name}}</p> will not be able to perform any transactions.
                                        </section>
                                        <footer class="modal-card-foot">
                                            <form id="form{{$reseller->id}}" method="post" action="/admin/update/{{$reseller->id}}">
                                            @method('PUT')
                                            @csrf                                            
                                            <input type="hidden" name="Edit" value="3">
                                        </form>
                                            <button class="button is-success is-warning has-text-weight-bold" onclick="$('#form{{$reseller->id}}').submit();">Hold</button>
                                            <button class="button">Cancel</button>
                                        </footer>
                                        @else

                                        <p class="modal-card-title"><span class="file-icon is-inline"><i class="fas fa-lock"></i></span>Unhold Account</p>
                                        <button class="delete" aria-label="close"></button>
                                    </header>
                                    <section class="modal-card-body">
                                    The account of <p class="has-text-weight-bold is-inline">{{$reseller->name}}</p> will be able to perform transactions immediately.
                                </section>
                                <footer class="modal-card-foot">
                                    <form id="form{{$reseller->id}}" method="post" action="/admin/update/{{$reseller->id}}">
                                    @method('PUT')
                                    @csrf                                            
                                    <input type="hidden" name="Edit" value="4">
                                    </form>
                                <button class="button is-success is-warning has-text-weight-bold" onclick="$('#form{{$reseller->id}}').submit();">Unhold</button>
                                    <button class="button">Cancel</button>

                                        @endif
                                        </div>
                                    </div>
                                    {{-- END OF MODAL FOR HOLD --}}
                                {{-- MODAL FOR DELETE --}}
                                <div class="modal animated fadeIn" id="modalDelete{{$reseller->id}}">
                                    <div class="modal-background"></div>
                                        <div class="modal-card">
                                            <header class="modal-card-head">
                                            <p class="modal-card-title"><span class="file-icon is-inline"><i class="fas fa-trash"></i></span>Delete Account</p> 
                                                <button class="delete" aria-label="close"></button>
                                            </header>
                                            <section class="modal-card-body">
                                            Delete the account of <p class="has-text-weight-bold is-inline">{{$reseller->name}}</p>?
                                            <p class="has-text-danger has-text-weight-bold">Warning!</p> This action is irreversible.
                                        </section>
                                        <footer class="modal-card-foot">
                                                <form id="form{{$reseller->id}}Delete" method="post" action="/admin/update/{{$reseller->id}}">
                                                @method('PUT')
                                                @csrf                                            
                                                <input type="hidden" name="Edit" value="2">
                                                </form>
                                            <button class="button is-danger has-text-weight-bold" onclick="$('#form{{$reseller->id}}Delete').submit();">Delete</button>
                                            <button class="button">Cancel</button>
                                        </footer>
                                        </div>
                                    </div>
                                    {{-- END OF MODAL FOR DELETE --}}                                       
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
            </div>
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
          {{$resellers->links()}}

 

        </div>
      </div>         
    </div>
    
    <script>
    function toggleEWBal() {
        var x = document.getElementById("divEWBal");
        if (x.style.display === "none") {

            x.style.display = "block";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Exit manage balance..";

        } else {

            x.style.display = "none";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Click here to manage balance..";

        }
    }

    $('.decimal').keypress(function(evt){
        return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
    });

    var formatter = new Intl.NumberFormat('en-PH', {
        style: 'currency',
        currency: 'PHP',
    })

    $('.input_amount').change(function(){ 
        var x = $('input[name=balOption]:checked').val();
        var firstValue  = Number("<?php echo number_format((float)$balCompute, 2, '.', ''); ?>");
        var secondValue = Number($('#second').val());

        if(secondValue != ""){
            if(x == "add"){
                var resValue = firstValue + secondValue;
                $('#total_expenses1').html(formatter.format(resValue));
            }
            else if(x == "deduct"){
                var resValue = firstValue - secondValue;
                if(resValue < 0){
                    $('#total_expenses1').html(formatter.format(0));
                }else{
                    $('#total_expenses1').html(formatter.format(resValue));
                }
            }
        }else{
            $('#total_expenses1').html(formatter.format(0));
        }   
    });

    $('#proceedBal').click(function(){ 


        var amount = $('#second').val();
        var modifyPwd = $('#modifyPwd').val();
        var radio = $('input[name=balOption]:checked').val();
        var userId = $(this).attr('data-userId');

        $.ajax({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('modifyVal') }}",
                method: "POST",
                data:{
                    proceed:"TRUE",
                    radio:radio,
                    amount:amount,
                    modifyPwd:modifyPwd,
                    userId:userId
                }, 
                dataType: "json",
                success:function(data)
                {
                    if(data.success.length > 0){
                        $.ajax({
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{ route('modifybalance') }}",
                            method: "POST",
                            data:{
                                proceed:"TRUE",
                                radio:radio,
                                amount:amount,
                                modifyPwd:modifyPwd,
                                userId:userId
                            }, 
                            dataType: "json",
                            success:function(data)
                            {
                                if(data.success.length > 0){
                                    location.reload();
                                    // bulmaToast.toast({ 
                                    //     message: data.success[0],
                                    //     dismissible: true,
                                    //     duration: 3000,
                                    //     pauseOnHover: true,
                                    //     animate: { in: "fadeIn", out: "fadeOut" },
                                    //     type: "is-success" 
                                    // });
                                    
                                }else{
                                    bulmaToast.toast({ 
                                        message: data.error[0],
                                        dismissible: true,
                                        duration: 3000,
                                        pauseOnHover: true,
                                        animate: { in: "fadeIn", out: "fadeOut" },
                                        type: "is-danger" 
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError){
                                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });
                    }else{
                        bulmaToast.toast({ 
                            message: data.error[0],
                            dismissible: true,
                            duration: 3000,
                            pauseOnHover: true,
                            animate: { in: "fadeIn", out: "fadeOut" },
                            type: "is-danger" 
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
    });
    </script>

@endsection


