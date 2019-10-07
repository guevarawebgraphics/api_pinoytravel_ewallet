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
                        <h1 class="title is-size-4"> Reseller Account Profile</h1>
                    </div>
                    <hr>
                    {{-- form start--}}
                    <div class="field is-horizontal">
                          <div class="field-label is-normal">
                            <label class="label">Name</label>
                          </div>
                            <div class="field-body">
                              <div class="field">
                                <p class="control">
                                  <input class="input" type="name" placeholder="Enter Name" value="{{$reseller->name}}" readonly>
                                </p>
                              </div>
                            </div>
                          </div>
                        {{-- form start--}}
                          <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">Email</label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <p class="control">
                                  <input class="input" type="email" placeholder="Enter Email" value="{{$reseller->email}}" readonly>
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
                                  <input class="input" type="text" placeholder="Enter Address" value="{{$reseller->address}}" readonly>
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
                                  <input class="input" type="number" placeholder="Enter Contact No." value="{{$reseller->contact_no}}" readonly>
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
                                  if(!empty($walletBal[0]->userId))
                                      if($walletBal[0]->userId == $reseller->id){
                                          
                                          $bal = number_format((float)$walletBal[0]->total_balance, 2, '.', ',');
                                      }else{
                                          $bal = number_format((float)0, 2, '.', ',');
                                      }
                                  else{
                                      $bal = number_format((float)0, 2, '.', ',');
                                  }
                                  ?>
                                <input class="input" type="text" placeholder="₱0.00" value="₱{{ $bal }}" readonly>
                              </p>
                            </div>
                          </div>
                        </div>
                        {{-- form end--}}
                        
                        @include('pages.admin.epassbook') 
                        @include('pages.admin.unpaid') 
                        
            </div> 
            @include('includes.createNotifs') 
            <div class="box">                 
          {{-- title--}}
          <h1 class="title is-4">Reseller Accounts</h1>  
          <a href="/admin/create/reseller" class="button is-success"><span class="file-icon"><i class="fas fa-plus"></i></span>Create</a>         
          <br>
          <br>
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
            <table id="ResellerAccountTable" class="table is-clear-fix is-bordered is-fullwidth is-striped" style="margin-bottom: 1.5em; margin-top: 1.5em;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Account Balance</th>
                        <th>Contact</th>
                        {{-- <th>Image</th>   --}}
                        <th>Actions</th>  
                        {{-- <th></th>--}}
                    </tr>
                </thead>
              
                <tbody>
                    {{-- START CHECK RESELLER TABLE FOR DATA --}}
                    @if(count($resellers) >= 1)
                        @foreach($resellers as $reseller)
                            <tr class="">
                                <td>{{$reseller->name}}</td>                        
                                <td>{{$reseller->email}}</td>
                                <td>{{$reseller->address}}</td>
                                <td>
                                    ₱{{ number_format((float)$reseller->total_balance, 2, '.', ',') }}
                                </td>
                                <td>{{$reseller->contact_no}}</td>
                                {{-- <td><img src="" alt="{{$reseller_temp->profile_pic}}" height="25px" width="100px"></td>                                                                         --}}
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
                                              <a class="button is-warning is-rounded modal-button" data-target="modalHold{{$reseller->id}}">On Hold</a>
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
                                          

                                      <textarea class="textarea" onkeyup="holdText({{$reseller->id}})" id="holdID{{$reseller->id}}" placeholder="Remarks" style="margin-top: 1.5em;"></textarea>
                                  </section>
                                  <footer class="modal-card-foot">
                                      <form id="form{{$reseller->id}}" method="post" action="/admin/update/{{$reseller->id}}">
                                      @method('PUT')
                                      @csrf                                            
                                      <input type="hidden" name="Edit" value="3">
                                      <input type="hidden" name="holdText" id="holdText{{$reseller->id}}" value="" required>
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
                          
                                  
                              <textarea class="textarea" onkeyup="unholdText({{$reseller->id}})" id="unholdID{{$reseller->id}}" placeholder="Remarks" style="margin-top: 1.5em;"></textarea>
                          </section>
                          <footer class="modal-card-foot">
                              <form id="form{{$reseller->id}}" method="post" action="/admin/update/{{$reseller->id}}">
                              @method('PUT')
                              @csrf                                            
                              <input type="hidden" name="Edit" value="4">
                              <input type="hidden" name="unholdText" id="unholdText{{$reseller->id}}" value="" required>
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
                                      

                                      <textarea class="textarea" onkeyup="deltxtArea({{$reseller->id}})" id="txtID{{$reseller->id}}" placeholder="Remarks" style="margin-top: 1.5em;"></textarea>
                                  </section>
                                  <footer class="modal-card-foot">
                                          <form id="form{{$reseller->id}}Delete" method="post" action="/admin/update/{{$reseller->id}}">
                                          @method('PUT')
                                          @csrf       
                                                                              
                                          <input type="hidden" name="Edit" value="2">
                                          <input type="hidden" name="Textarea" id="txtArea{{$reseller->id}}" value="" required>
                                          
                                          </form>
                                      <button class="button is-danger has-text-weight-bold" onclick="$('#form{{$reseller->id}}Delete').submit();">Delete</button>
                                      <button class="button">Cancel</button>
                                  </footer>
                                  </div>
                              </div>
                  {{-- END OF MODAL FOR DELETE --}}
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
                

                </tbody>
            </table>
        
            {{-- end of table--}}          
          {{-- form end--}}          
          {{-- {{$resellers->links()}} --}}
          <br>
          <a class="button is-link" href="/admin/view/all">Go Back</a>
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

<script type="text/javascript">
  function deltxtArea(id){
      var txtAreaValue = $('#txtID'+id).val();
      // alert(txtAreaValue);
      $('#txtArea'+id).val(txtAreaValue);
  }

  function holdText(id){
      var txtAreaValue = $('#holdID'+id).val();
      // alert(txtAreaValue);
      $('#holdText'+id).val(txtAreaValue);
  }

  function unholdText(id){
      var txtAreaValue = $('#unholdID'+id).val();
      // alert(txtAreaValue);
      $('#unholdText'+id).val(txtAreaValue);
  }
</script> 
@endsection


