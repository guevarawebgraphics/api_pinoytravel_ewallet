@extends('layouts.appAdmin')
@section('content')           
        <div class="column auto" style="overflow-x: auto;">
            {{-- title--}}
            <h1 class="title is-3">Hold Reseller Account</h1>
            @include('includes.createNotifs')
            {{-- start of search bar--}}    
            <div class="field has-addons is-grouped is-grouped-right">
                    <div class="control">
                        <input class="input is-small" type="text" placeholder="Find a repository">
                    </div>
                    <div class="control">
                        <a class="button is-info is-small">Search</a>
                    </div>
            </div>      
            {{-- end of search bar--}}  
            {{-- start of table--}}          
            <table class="table is-clear-fix is-bordered" style="margin-bottom: 1.5em">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Image</th>  
                        <th></th>                                              
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
                    @if(count($reseller) > 1)
                        @foreach($reseller as $resellers)                         
                            <tr class="">
                                <td>{{ $resellers->name}}</td>
                                <td>{{$resellers->email}}</td>
                                <td>{{$resellers->address}}</td>
                                <td>{{$resellers->contact_no}}</td>
                                <td><img src="" alt="{{$resellers->profile_pic}}" height="25px" width="100px"></td>                                                
                                <td>
                                    <p class="control is-centered" style="">                    
                                        <form id="delReseller" method="post" action="/reseller/{{$resellers->reseller_id}}">
                                            {{-- <input type="hidden" name="_method" value="PUT">                   --}}
                                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="Edit" value="3">                                        
                                            @if($resellers->on_hold == 1)
                                                <input type="hidden" name="Edit" value="4">
                                                    <button id="btn-submit" class="button is-warning">
                                                        <span class="file-icon">
                                                                <i class="fas fa-lock"></i>
                                                        </span> On Hold
                                                    </button>                                                        
                                            @else
                                                    <button id="btn-submit" class="button is-warning">
                                                        <span class="file-icon">
                                                                <i class="fas fa-lock"></i>
                                                        </span>
                                                        Hold Reseller
                                                    </button>
                                            @endif  
                                    {{-- <a class="button is-danger" onclick="delAlert('{{$reseller->reseller_id}}','{{$reseller->name}}')">
                                        <span class="file-icon">
                                            <i class="fas fa-lock"></i>
                                        </span> 
                                            Delete Reseller
                                    </a>  --}}
                                        </form>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        
                        {{-- IF THERE WERE NO reseller TO FETCH --}}                    
                        @else  
                    </tbody>
                </table>
                    <p class="title is-5 has-text-centered">No Reseller Accounts Found </p>
                @endif                      
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


