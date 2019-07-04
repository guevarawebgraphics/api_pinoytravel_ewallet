@extends('layouts.appReseller')
@section('content') 
     
<div style="margin:1.5em 1.5em 1.5em 0">
        <h1 class="title is-1">Top Up History</h1>
        {{-- <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" style="margin-top:4em"> --}}
</div>        

{{-- <div class="card"></div> --}}
<div class="box">    
    <div class="column auto" style="">
      {{-- title--}}
      {{-- <h1 class="title is-3">Get Total Wallet Value</h1>           --}}
 

        {{-- start of table--}}          
        <table class="table is-clear-fix is-bordered" style="margin-bottom: 1.5em; width:100%;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Description</th>
                    {{-- <th>Image</th>   --}}
                    <th>Amount</th>                                              
                </tr>
            </thead>
            {{-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Wallet Value</th>
                    </tr>
                </tfoot> --}}
                {{-- START CHECK RESELLER TABLE FOR DATA --}}
                <tbody>
                    <tr class="">
                        <td>DATE</td>                        
                        <td>TYPE</td>
                        <td>DESC</td>
                        <td> ₱ AMount XXX</td>
                    </tr>
                </tbody>
            </table>                    
            {{-- @if(count($resellers) >= 1)
                @foreach($resellers as $reseller)                    
                    <tbody>
                        <tr class="">
                            <td>{{ $reseller->name}}</td>                        
                            <td>{{$reseller->email}}</td>
                            <td> ₱ {{$reseller->wallet_bal}}.00</td>
                        </tr>
                @endforeach                         --}}
                {{-- IF THERE WERE NO reseller TO FETCH --}}                    
            {{-- @else  
                    </tbody>
        </table>
            <p class="title is-5 has-text-centered">No Reseller Accounts Found 
                    <a class=" is-link" href="/admin/wallet/reseller">Go Back</a>
            </p>
            @endif                     
                    </tbody>
        </table> --}}
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
      {{-- {{$resellers->links()}} --}}
  </div> 
</div>



@endsection


