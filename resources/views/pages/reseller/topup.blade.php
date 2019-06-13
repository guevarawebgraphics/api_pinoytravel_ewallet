@extends('layouts.appReseller')
@section('content') 
<div class="is-pulled-right">
  <p class="is-large" style="margin-top:1em">Balance: <strong> ₱ 3000.00</strong></p>   
  <p class="is-large" style="margin-top:1em"><a href="#">Top Up History </a></p>    
</div>       
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
                {{-- <div class="field has-addons">
                    <p class="control tooltip is-tooltip-bottom" data-tooltip="Enter amount to top-up">
                        <input type="text" class="input" placeholder="Enter Amount To Top Up">
                    </p>
                    <p class="control">
                        <a href="" class="button is-success">Top Up</a>
                    </p>
                </div> --}}

                {{-- START OF RESELLER PAYMENT DETAILS--}}
                <div class="box">
                  <article class="media">
                    {{-- <div class="media-left">
                      <figure class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                      </figure>
                    </div> --}}
                    <div class="media-content">
                      <div class="content">
                          <h1 class="title is-3">Top Up Amount</h1>
                        <p>
                          <strong>{{ Auth::user()->name }}</strong> <small>{{Auth::user()->email}}</small> 
                          {{-- <strong>{{ Auth::user()->name }}</strong> <small>@johnsmith</small> <small>31m</small> --}}
                          <br>
                          
                        </p>
                      </div>







                      <div class="field has-addons">
                          <div class="control">
                            <div class="select">
                              <select id="paymentAmount" name="paymentAmount" class="selector">
                                <option value="50">₱ 50</option>
                                <option value="150">₱ 150</option>
                                <option value="250">₱ 250</option>
                                <option value="300">₱ 300</option>
                                <option value="500">₱ 500</option>
                                <option value="1000">₱ 1000</option>
                                <option value="2500">₱ 2500</option>
                                <option value="5000">₱ 5000</option>
                                <option value="10000">₱ 10000</option>
                                <option value="custom">Custom Amount</option>
                              </select>
                            </div>
                          </div>
                          <div class="control" style="display:none" id="customForm">
                            <input class="input" placeholder="Enter Amount To Top Up">
                          </div>
                          <div class="control">
                            <button type="submit" class="button is-link">Top Up</button>
                          </div>
                        </div>
                        <label class="checkbox">
                            <input type="checkbox">
                            I agree to the <a href="#">terms and conditions</a>
                          </label>












                      {{-- <nav class="level is-mobile">
                        <div class="level-left">
                          <a class="level-item" aria-label="reply">
                            <span class="icon is-small">
                              <i class="fas fa-reply" aria-hidden="true"></i>
                            </span>
                          </a>
                          <a class="level-item" aria-label="retweet">
                            <span class="icon is-small">
                              <i class="fas fa-retweet" aria-hidden="true"></i>
                            </span>
                          </a>
                          <a class="level-item" aria-label="like">
                            <span class="icon is-small">
                              <i class="fas fa-heart" aria-hidden="true"></i>
                            </span>
                          </a>
                        </div>
                      </nav> --}}
                    </div>
                  </article>
                </div>
                {{-- END OF RESELLER PAYMENT DETAILS--}}






                <h1 class="title is-5"> Choose Payment Option </h1>

                
                {{-- START OF TABS--}}
                <div class="tabs is-boxed" id="tabs">
                  <ul>
                    <li class="is-active" data-tab="1">
                      <a>
                        <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
                        <span>Card Payment</span>
                      </a>
                    </li>
                    <li data-tab="2">
                      <a>
                        <span class="icon is-small"><i class="fas fa-music" aria-hidden="true"></i></span>
                        <span>Online Banking</span>
                      </a>
                    </li>
                    <li data-tab="3">
                      <a>
                        <span class="icon is-small"><i class="fas fa-film" aria-hidden="true"></i></span>
                        <span>OTC Bank/ATM</span>
                      </a>
                    </li>
                    <li data-tab="4">
                      <a>
                        <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                        <span>Non Bank</span>
                      </a>
                    </li>
                    <li data-tab="5">
                      <a>
                        <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                        <span>GCash</span>
                      </a>
                    </li>
                  </ul>
                </div>

                {{-- START OF TAB CONTENT--}}
                <div id="tab-content">
                  <p class="is-active" data-content="1">
                    <img src="{{asset('img/paypal.png')}}" alt="payment" width="300px" height="155px">
                  </p>
                  <p data-content="2">
                    Online Banking
                  </p>
                  <p data-content="3">
                    OTC Bank/ATM
                  </p>
                  <p data-content="4">
                    Non Bank
                  </p>
                  <p data-content="5">
                    GCash
                  </p>
                </div>
                {{-- END OF TAB CONTENT--}}
                {{-- END OF TABS--}}




                {{-- <nav class="breadcrumb" aria-label="breadcrumbs">
                        <ul>
                          <li>
                            <a href="/">
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
                </nav> --}}
                      
                       
                      
            </div>        
</div>



@endsection


