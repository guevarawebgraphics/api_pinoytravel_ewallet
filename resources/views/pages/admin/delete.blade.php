@extends('layouts.appAdmin')
@section('content')        
    <div class="column auto" style="overflow-x: auto;">
        {{-- title--}}
        <h1 class="title is-3">Delete Reseller Account</h1>
        @include('includes.createNotifs')
            {{-- start of search bar--}}    
            <div class="field has-addons is-grouped is-grouped-right">
                <div class="control">
                    <input class="input is-small" type="text" placeholder="Find a repository">
                </div>
                <div class="control">
                    <a class="button is-info is-small"> Search </a>
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
                                <th style="white-space: nowrap">{{$resellers->name}}</th>                        
                                <td>{{$resellers->email}}</td>
                                <td>{{$resellers->address}}</td>
                                <td>{{$resellers->contact_no}}</td>
                                <td><img src="" alt="{{$resellers->profile_pic}}" height="25px" width="100px"></td>                                                
                                <td>
                                    <p class="control is-centered" style="">   
                                            {{-- <form id="form" method="post"> --}}
                                            {{-- <form id="form" method="post"> --}}
                                            {{-- <form id="delReseller" method="POST" action="{{route('reseller.destroy',$reseller->reseller_id)}}"> --}}
                                            {{-- <form id="delReseller" method="POST"> --}}
                                        <form id="delReseller" method="post" action="/reseller/{{$resellers->reseller_id}}">
                                            {{-- <input type="hidden" name="_method" value="PUT">--}}
                                            @method('PUT')
                                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                            {{-- {{csrf_field()}}--}}
                                            @csrf
                                            <input type="hidden" name="Edit" value="2">                                        
                                                
                                            <button id="btn-submit" class="button is-danger">
                                                <span class="file-icon">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    Delete Reseller
                                            </button>                                                          
                                        {{-- <a class="button is-danger" onclick="delAlert('{{$reseller->reseller_id}}','{{$reseller->name}}')">
                                            <span class="file-icon">
                                                <i class="fas fa-trash"></i>
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
                    {{-- <tr>
                        <th>Sample</th>
                        <td>sample@sample.com</td>
                        <td>Sample City</td>
                        <td>+1235-3524-6544</td>
                        <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAAB9CAMAAABH0HuwAAAAM1BMVEX///8EBARBQUHu7u4TExNgYGBQUFC/v7+fn5/f398xMTGurq4iIiLOzs5vb2+Pj49/f39vBQ4DAAAB7UlEQVR4nO2a3ZLCIAxGCxT6p7Xv/7Rr6apbW0iVEDqz37ncG88kJiRZqwoAAAAAAAAAAADDqJVHj0NZEzPV6g/1ZMq53FYqXudWSMXodxWfrSLBuW7C8huc63lcStiYS8hFqYt0plzYRSkn6zLEXJSS7TiRJPlESbq0cRelWkGZnpLp5Vw6ykWpTkyGzJJkniwtY8Vkdh+lNfp/ytAuSonJEC1vRq7tnSpNp5KZaJlJTIZ4s2fk3m1DywjOV9HRakZyvGoomUZQ5lTDFRUa0cCcayCvTHBtui9O4kvlNSxTYKUMjnuSwzhlU8TlnqmdAr8UyNGCGd9dxoLXoqpbzeZWbkHZx7TWr3S9bUtGBYBP6EYXfJkbN0pWVePXA7f7kUuxa6khonluKm4zdg/P0UJEx6wmmdq2z/h0rV3NFS573xl25hjt2f69zryvHLjMrN6HjCqGvOW902dL1ecu+Wy+cclm85VLpivsh9/dFxm+xQfOrSHYp+IusidR1NxPFXl3iMG8YZJnhzi879SBK14M1gtfYmB4Q/N1WT9gLO8DNzwKvj6c0GMe8PWapLpe4KvudBe+f2wk19IMVz3dOGS4fj6SXNgzXMWd2H4XuJpwwoP9omaS4XBhKyfIhNAsMMkAAAAAAAAAAABbfgCCshA8UlE1ggAAAABJRU5ErkJggg==" height="25px" width="100px"></td>                                                
                        <td>
                                <p class="control is-centered" style="margin-top:1em">                    
                                    <a class="button is-danger">
                                        <span class="file-icon">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                            Delete Reseller
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


