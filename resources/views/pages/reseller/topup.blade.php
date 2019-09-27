@extends('layouts.appReseller')
@section('content') 
<?php
if(session()->forget('merchId') != ""){
            session()->forget('merchId');
            session()->forget('txnid');
            session()->forget('amount');
            session()->forget('param1');
            session()->forget('param2');
            session()->forget('procid');
}
?>

<div class="is-pulled-right">

    <p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Balance: <strong>
        @if(count($userBal))
          ₱{{ number_format((float)$userBal[0]->total_balance, 2, '.', ',') }}
        @else
          ₱0.00
        @endif
    </strong></p>    
    
</div>       
<div style="margin:1.5em 1.5em 1.5em 1.5em;">
    <h1 class="title is-size-4"><i class="fa fa-credit-card"></i> Top Up E-Wallet</h1>
</div>     

{{-- <div class="card"></div> --}}
<div class="box">    
        

            <div class="block">          
                {{-- START OF RESELLER PAYMENT DETAILS--}}
                <div class="box">
                  <article class="media">
                    <div class="media-content">
                      <div class="content">
                          <h3 class="title">Select Load Amount</h3>
                        <p>
                          <strong>{{ Auth::user()->name }}</strong> <small>{{Auth::user()->email}}</small> 
                          {{-- <strong>{{ Auth::user()->name }}</strong> <small>@johnsmith</small> <small>31m</small> --}}
                          <br>
                          
                        </p>
                      </div>                                                
                          <div class="field has-addons">
                            <div class="control">
                              <div class="select">
                                {{-- START OF PAYPAL PAYMENT FORM--}}
                                {{-- <form action="{{route('/reseller/topup/payment')}}" method="POST">       --}}
                              <form action="/reseller/topup/checkout" id="frmPost" method="POST">
                                <select id="paymentAmount" name="paymentAmount" class="selector" required>
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
                                <input name="paymentAmountCustom" class="input" placeholder="Enter Amount To Top Up">
                              </div>
                              <div class="control">
                                {{-- <button type="submit" class="button is-link">Top Up</button> --}}
                              </div>
                            </div>
                                <label class="is-fullwidth">
                                  @error('paymentAmount')
                                  <span class="help is-danger">{{ $message }} </span>
                                  @enderror
                                  @error('paymentAmountCustom')
                                  <span class="help is-danger">{{ $message }} </span>
                                  @enderror
                                </label>                                                                                                                                                                                                                                                                                                                                          
                                                                                                                                                                                                                                                                                                                                       
                    </div>
                  </article>
                </div>
                {{-- END OF RESELLER PAYMENT DETAILS--}}                                                          
                
                <h1 class="title is-5"> Choose Payment Option </h1>                                
                {{-- START OF TABS--}}
                <div class="tabs is-boxed" id="tabs">
                  <ul>
                    <li class="top-up-tab is-active" data-tab="1">
                      <a>
                        <span class="icon is-small"><i class="fas fa-credit-card" aria-hidden="true"></i></span>
                        <span><strong>Card Payment</strong></span>
                      </a>
                    </li>
                    <li class="top-up-tab" data-tab="2">
                      <a>
                        <span class="icon is-small"><i class="fas fa-globe" aria-hidden="true"></i></span>
                        <span><strong>Online Banking</strong></span>
                      </a>
                    </li>
                    <li class="top-up-tab" data-tab="3">
                      <a>
                        <span class="icon is-small"><i class="fas fa-money-check-alt" aria-hidden="true"></i></span>
                        <span><strong>OTC Bank/ATM</strong></span>
                      </a>
                    </li>
                    <li class="top-up-tab" data-tab="4">
                      <a>
                        <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                        <span><strong>Non Bank</strong></span>
                      </a>
                    </li>
                    <li class="top-up-tab" data-tab="5">
                      <a>
                        <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                        <span><strong>GCash</strong></span>
                      </a>
                    </li>
                    <li class="top-up-tab" data-tab="6">
                      <a>
                        <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                        <span><strong>Direct Deposit</strong></span>
                      </a>
                    </li>
                  </ul>
                </div>

                {{-- START OF TAB CONTENT--}}
                <div id="tab-content">
                  <div class="is-active" data-content="1">
                    <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="payment" width="300px" height="155px">
                        @csrf
                        {{-- <input class="button is-link" type="submit" value="Top Up"> --}}
                        <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" id="userAgreement1">
                            I agree to the <a href="#">terms and conditions</a>
                          </label>   
                        </div>
                       <div class="control" style="margin-top:1em"> <input id="topupBtn1" class="button is-link" value="Top Up" type="submit">
                      </div>
                      {{-- END OF PAYPAL PAYMENT FORM--}}
                      
                        
                  </div>
                  <div data-content="2">
                  {{-- @foreach($responseProc1 as $response)
                          {{$responseProc1->longName}}
                        @endforeach --}}

                                {{-- <select>
                                    @foreach ($responseProc1 as $responseNameProc1)
                                      <option>{{$responseNameProc1->longName}}</option>
                                    @endforeach
                                  </select> --}}
                                  
                        <div class="select is-fullwidth" style="margin-bottom:0.3em">
                          <select id="selectProc1" name="selectProc1" required>
                            <option value="">Choose Payment Option</option>                            
                            @foreach ($responseProc1 as $responseNameProc1)
                              <option value="{{$responseNameProc1->procId}}">{{$responseNameProc1->longName}}</option>                            
                              @endforeach                     
                            </select>                         
                        </div>
                        <div id="procDetailSection" class="control">
                          <img id="procImgsrc" src="" style="margin:0.5em;object-fit:contain"> 
                              @foreach ($responseProc1 as $responseNameProc1)                    
                                <p id="{{$responseNameProc1->procId}}text" class="box" style="margin:0.3em;display:none;">
                                  <strong>{{$responseNameProc1->longName}}  </strong> 
                                <br>
                                  {!!$responseNameProc1->remarks!!}                            
                                </p>
                              @endforeach
                        </div> 
                        
                        <label class="checkbox">
                            <input type="checkbox" id="userAgreement2" required>
                            I agree to the <a href="#">terms and conditions</a>
                          </label>   
                          <div class="control" style="margin-top:1em">
                        <input id="topupBtn2" class="button is-link" value="Top Up" type="submit">
                      </div>
                      
                  </div>
                  <div data-content="3">
                      <div class="select is-fullwidth" style="margin-bottom:0.3em">
                          <select id="selectProc2" name="selectProc2">
                              <option value="">Choose Payment Option</option> 
                            @foreach ($responseProc2 as $responseNameProc2)
                              <option value="{{$responseNameProc2->procId}}">{{$responseNameProc2->longName}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="control">
                          <img id="procImgsrc2" src="" style="margin:0.5em;object-fit:contain"> 
                              @foreach ($responseProc2 as $responseNameProc2)                    
                                <p id="{{$responseNameProc2->procId}}text" class="box" style="margin:0.3em;display:none;">
                                  <strong>{{$responseNameProc2->longName}}  </strong> 
                                <br>
                                  {!!$responseNameProc2->remarks!!}                            
                                </p>
                              @endforeach
                        </div> 
                        <label class="checkbox">
                            <input type="checkbox">
                            I agree to the <a href="#" id="userAgreement3">terms and conditions</a>
                          </label>   
                          <div class="control" style="margin-top:1em">
                        <input id="topupBtn3" class="button is-link" value="Top Up" type="submit">
                          </div>
                  </div>
                  <div data-content="4">
                      <div class="select is-fullwidth" style="margin-bottom:0.3em">
                          <select id="selectProc4" name="selectProc4">
                              <option value="">Choose Payment Option</option> 
                            @foreach ($responseProc4 as $responseNameProc4)
                              <option value="{{$responseNameProc4->procId}}">{{$responseNameProc4->longName}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="control">
                            <img id="procImgsrc4" src="" style="margin:0.5em;object-fit:contain"> 
                                @foreach ($responseProc4 as $responseNameProc4)                    
                                  <p id="{{$responseNameProc4->procId}}text" class="box" style="margin:0.3em;display:none;">
                                    <strong>{{$responseNameProc4->longName}}  </strong> 
                                  <br>
                                    {!!$responseNameProc4->remarks!!}                            
                                  </p>
                                @endforeach
                          </div>
                          <label class="checkbox">
                              <input type="checkbox" onclick="showMe()">
                              I agree to the <a href="#">terms and conditions</a>
                            </label>
                            <div class="control" style="margin-top:1em">   
                          <input class="button is-link" id="topupBtn4" value="Top Up" type="submit">                   
                            </div>
                  </div>
                  <div data-content="5">
                      {{-- <div class="select is-fullwidth" style="margin-bottom:0.3em">
                          <select id="selectProc4" name="selectProc4">
                              <option value="">Choose Payment Option</option> 
                            @foreach ($responseProc4 as $responseNameProc4)
                              <option value="{{$responseNameProc4->procId}}">{{$responseNameProc4->longName}}</option>
                            @endforeach
                          </select>
                        </div> --}}
                        <div class="control">
                            <img id="procImgsrc5" src="https://www.gcash.com/wp-content/uploads/2017/11/GCashLogo25H.png" style="margin:0.5em;object-fit:contain"> 
                                                  
                                  <p  class="box" style="margin:0.3em">
                                      Not a GCash user? Visit <a href="https://www.gcash.com/faqs">https://www.gcash.com/faqs</a> to find out how to get started.                           
                                  </p>
                               
                          </div>
                          <label class="checkbox">
                              <input type="checkbox" onclick="showMe()">
                              I agree to the <a href="#">terms and conditions</a>
                            </label>
                            <div class="control" style="margin-top:1em">   
                          <input class="button is-link" value="Top Up" id="topupBtn5" type="submit">                   
                            </div>                                        
                  </div>
                </form>
                  <div data-content="6">
                      <div class="box">
                        <p><b>
                          
                          {{-- <label class="has-text-danger">ZERO PAYMENT GATEWAY FEE!!</label>  --}}
                          
                          Pay CASH directly to PinoyTravel through over-the-counter bank deposit or ONLINE TRANSFER. This process may take 8-12 hours. 
                          
                          {{-- Please make sure that your booking expiration is not within this period. --}}
                        
                        </b></p>
                      </div>

                      <ul>
                         <li>
                           <p>1. DEPOSIT/Transfer here:PESO Account details:</p>
                          <ul class="has-text-danger" style="margin-left:1.5em;">
                            <li><b>Bank of Philippine Islands (BPI)<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Number:3990-0176-29</b></li>
                            <li><b>Banco de Oro (BDO)<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Number:3920-0636-48</b></li>
                          </ul>

                         </li>
                         <li><p>2. Take a clear picture of the deposit slip or screenshot of the online transfer confirmation, as your PROOF of payment.</p></li>
                         <li><p>3. Go back to the PinoyTravel MAIN PAGE and click “VERIFY DIRECT PAYMENT” (located at the upper right corner beside “To Pay” red Button) to upload your proof of payment.</p></li>
                         <li><p>4. Check the EMAIL with subject DIRECT PAYMENT CONFIRMATION for the actual amount you need to deposit. Follow next steps indicated in the email.</p></li>
                         <li><p>5. PinoyTravel will verify your payment. Once verified your travel voucher will be sent to your email.</p></li>
                         <li><p>6. If you agree with these terms, please the click the “I Agree..” box, press “Continue with Payment” and follow steps 1- 4 as stated above.</p></li>
                      </ul>

                      <button class="button is-link" id="drtDepo" style="margin-top: 1.5em;">Continue</button>
                    </div>
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
                {{-- @include('includes.createNotifs') --}}
                       
                      
            </div>        
</div>
<script>
// //Continue this to validate individually the "Agreement"
// var item = $('.is-active').attr("data-tab");
// if(item != ""){
//   alert(item);
//   document.getElementById('frmPost').removeAttribute('action');
//   // /reseller/topup/checkout
// }
// var load = $('#paymentAmount').val();
// var mop = $('#selectProc1').val();
// var chck = $('#userAgreement2').val();
// if(load == ""){
//   bulmaToast.toast({ 
//       message: "Select Load Amount",
//       dismissible: true,
//       duration: 3000,
//       pauseOnHover: true,
//       animate: { in: "fadeIn", out: "fadeOut" },
//       type: "is-danger" 
//   });
// }
// else if(mop == ""){
//   bulmaToast.toast({ 
//       message: "Choose your Payment Option",
//       dismissible: true,
//       duration: 3000,
//       pauseOnHover: true,
//       animate: { in: "fadeIn", out: "fadeOut" },
//       type: "is-danger" 
//   });
// }
// else if(chck == ""){
//   bulmaToast.toast({ 
//       message: "You didn't agree with out terms & condition.",
//       dismissible: true,
//       duration: 3000,
//       pauseOnHover: true,
//       animate: { in: "fadeIn", out: "fadeOut" },
//       type: "is-danger" 
//   });
// }

$("#drtDepo").click(function(){
  directDeposit();
});
function directDeposit(){
  var amount = $("#paymentAmount").val();
  var app_redirect = "<?php echo env('APP_REDIRECT'); ?>";

  if(amount == ""){
    alert("Amount is required!");
  }else{
      $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('directdeposit') }}",
        method: "POST",
        data:{
            proceed:"TRUE",
            amount:amount
        }, 
        dataType: "json",
        success:function(data)
        {
            if(data.success.length > 0)
            {
              window.location = "//"+app_redirect+"/message/pending";
            }
            else
            {
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
  }
}

</script>
@endsection


