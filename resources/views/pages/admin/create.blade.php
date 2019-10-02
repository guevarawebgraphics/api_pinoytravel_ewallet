@extends('layouts.appAdmin')
@section('content')  

        <div class="column auto" style=" overflow-x: auto;">  
             

            <div class="box">
                {{-- title--}}
                <p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Overall PT-Reseller Balance: <strong>
                        @if(count($sumBal))
                        ₱{{ number_format((float)$sumBal[0]->total_balance, 2, '.', ',') }}
                        @else
                        ₱0.00
                        @endif
                    </strong></p>    
                    
                <div style="margin:1.5em 1.5em 1.5em 0;">
                    <h1 class="title is-size-4">Create Reseller Account</h1>
                </div>
                <hr>

                {{-- START OF PARENT FORM TAG--}}
                <form action="{{ route('admin.store.reseller') }}" method="post">
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
                                    <input type="password" name="password" class="input" placeholder="Enter Password" value="{{ old('password') }}">
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
                                    <input name="password_confirmation"class="input" type="password" placeholder="" value="">
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="field is-grouped is-grouped-centered" style="margin-top:1em">
                            <p class="control">                    
                                <button type='submit' class="button is-success">
                                        <span class="file-icon">
                                                <i class="fas fa-plus"></i>
                                        </span>
                                        Save
                                </button>                    
                            </p>                               
                    </div>
                                                 
                </form>
            </div>      
            @include('includes.createNotifs')         
        <div class="box">
          {{-- title--}}
          <h1 class="title is-4">Reseller Accounts</h1>
            {{-- start of search bar--}}    
            {{-- <div class="field has-addons is-grouped is-grouped-right">
                <div class="control">
                    <form action="/admin/search/reseller" method="GET">
                    <input class="input is-small" type="text" name="Search" placeholder="Find Reseller">
                    @csrf
                </div>
                <div class="control">
                    <button class="button is-info is-small" type="submit"> Search</button>
                    </form>
                </div>
            </div>       --}}
                {{-- end of search bar--}}  
            {{-- start of table--}}        
            <div class="" style="overflow-y: auto;">  
            <table id="ResellerAccountTable" class="table is-clear-fix is-bordered is-fullwidth is-striped" id="CreateReseller" style="margin-bottom: 1.5em; margin-top: 1.5em;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Account Balance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
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
                                                <a class="button is-rounded is-warning modal-button" data-target="modalHold{{$reseller->id}}">On Hold</a>
                                                @else
                                                <a class="button is-rounded modal-button" data-target="modalHold{{$reseller->id}}">Hold</a>
                                                @endif
                                        </div>
                                        <div class="control">
                                            <a class="button is-rounded modal-button" data-target="modalDelete{{$reseller->id}}">Delete</a>
                                        </div>
                                    </div>
                                </td>

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

                            </tr>
                        @endforeach                  
                    @else
                    <p class="title is-5 has-text-centered">No Reseller Accounts Found </p>
                    @endif
                </tbody>
            </table>
            </div>
            {{-- {{$resellers->links()}} --}}
        </div>            
    </div>         
</div>  

<script>
$('#ResellerAccountTable').DataTable({
    "serverSide": false, 
    "retrieve": true,
    "ordering": false
});
</script>
@endsection


