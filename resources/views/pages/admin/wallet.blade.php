@extends('layouts.appAdmin')
@section('content')           
        <div class="column auto" style="">
            <div class="box">
          {{-- title--}}
          <h1 class="title is-3">Get Total Wallet Value</h1>          
            {{-- start of search bar--}}    
            <div class="field has-addons is-grouped is-grouped-right">
                @if($searched == 0)                   
                    <div class="control"> 
                        {{-- <span class="tag">{{Request::input('Search')}}</span>--}}
                    </div>
                @else
                    <div class="control"> 
                            <span class="tag is-link">{{Request::input('Search')}} <a class="delete is-small" href="/admin/wallet/reseller"></a></span>                    
                    </div>
                @endif
                    <div class="control">
                            {{-- <form action="/test2" method="GET"> --}}
                            <form action="/admin/search/reseller" method="GET">
                            <input class="input is-small" type="text" name="Search" placeholder="Find Reseller">
                            @csrf
                        </div>
                        <div class="control">
                            <button class="button is-info is-small" type="submit"> Search</button>
                            <input type="hidden" name="wallet_search" value="1">
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
            <table class="table is-clear-fix is-bordered" style="margin-bottom: 1.5em; width:100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Image</th>   --}}
                        <th>Wallet Value</th>                                              
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
                @if(count($resellers) >= 1)
                    @foreach($resellers as $reseller)                    
                        <tbody>
                            <tr class="">
                                <td>{{ $reseller->name}}</td>                        
                                <td>{{$reseller->email}}</td>
                                {{-- <td><img src="" alt="{{$reseller->profile_pic}}" height="25px" width="100px"></td> --}}
                                <td> ₱ {{$reseller->wallet_bal}}</td>
                            </tr>
                    @endforeach                        
                    {{-- IF THERE WERE NO reseller TO FETCH --}}                    
                @else  
                        </tbody>
            </table>
                <p class="title is-5 has-text-centered">No Reseller Accounts Found 
                    <a class=" is-link" href="/admin/wallet/reseller">Go Back</a>
                </p>
                @endif                     
                        </tbody>
            </table>
            {{-- end of table--}}     
          {{$resellers->links()}}
        </div>
      </div>   
    </div>
@endsection


