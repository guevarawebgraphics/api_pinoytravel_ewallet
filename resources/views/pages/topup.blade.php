@extends('layouts.appReseller')
@section('content')        
  <p class="is-large is-pulled-right" style="margin-top:1em">Balance: <strong> PHP 3000.00</strong></p>    

<div style="margin:1.5em 1.5em 1.5em 0">
        <h1 class="title is-1">Top Up E-Wallet</h1>
        {{-- <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" style="margin-top:4em"> --}}
</div>        

{{-- <div class="card"></div> --}}
<div class="box">    
        {{-- <label class="is-left">Amount to Top Up</label>
         <div class="control">
          <p class="control has-icons-left">
                <input class="input is-primary" type="number" placeholder="Amount to top up"> <span class="icon is-small is-left"><i class="fa fa-money"></i></span>
          </p>
        </div>                             --}}

            <div class="block">
                <div class="field has-addons">
                    <p class="control tooltip is-tooltip-bottom" data-tooltip="Enter amount to top-up">
                        <input type="text" class="input" placeholder="Enter Amount To Top Up">
                    </p>
                    <p class="control">
                        <a href="" class="button is-success">Top Up</a>
                    </p>
                </div>
                <h1 class="title is-5"> Choose Payment Option </h1>
                <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                          <li>
                            <a href="#">
                              <span class="icon is-small">
                                <i class="fas fa-home" aria-hidden="true"></i>
                              </span>
                              <span>Card Payment</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="icon is-small">
                                <i class="fas fa-book" aria-hidden="true"></i>
                              </span>
                              <span>Online Banking</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="icon is-small">
                                <i class="fas fa-puzzle-piece" aria-hidden="true"></i>
                              </span>
                              <span>OTC Bank/ATM</span>
                            </a>
                          </li>
                          <li class="is-active">
                            <a href="#">
                              <span class="icon is-small">
                                <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                              </span>
                              <span>Non Bank</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="icon is-small">
                                <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                              </span>
                              <span>GCash</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                      
                        <img src="{{asset('img/paypal.png')}}" alt="payment" width="300px" height="155px">
                      
            </div>        
</div>



@endsection


