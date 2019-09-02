@extends('layouts.app')
@section('content') 

<script>
var session = '<?php echo session()->get("merchId"); ?>';
var loggedIn = "{{ auth()->check() ? 'true' : 'false' }}";

if(loggedIn == "false"){
    var merchId = '<?php if(isset($_GET["merchantid"])){ echo $_GET["merchantid"]; } ?>';
    var txnid = '<?php if(isset($_GET["txnid"])){ echo $_GET["txnid"]; } ?>';
    var ccy = '<?php if(isset($_GET["ccy"])){ echo $_GET["ccy"]; } ?>';
    var amount = '<?php if(isset($_GET["amount"])){ echo $_GET["amount"]; } ?>';
    var description = '<?php if(isset($_GET["description"])){ echo $_GET["description"]; } ?>';
    var email = '<?php if(isset($_GET["email"])){ echo $_GET["email"]; } ?>';
    var digest = '<?php if(isset($_GET["digest"])){ echo $_GET["digest"]; } ?>';
    var param1 = '<?php if(isset($_GET["param1"])){ echo $_GET["param1"]; } ?>';
    var param2 = '<?php if(isset($_GET["param2"])){ echo $_GET["param2"]; } ?>';
    var procid = '<?php if(isset($_GET["procid"])){ echo $_GET["procid"]; } ?>';

    window.location = '//192.168.0.35:902/login?merchantid='+merchId+'&txnid='+txnid+'&amount='+amount+'&ccy='+ccy+'&description='+description+'&email='+email+'&digest='+digest+'&param1='+param1+'&param2='+param2+'&procid='+procid;
}
</script>

@auth
    <?php
        if(session()->get("merchId") == ""){
        $merchId = $_GET["merchantid"];
        $txnid = $_GET["txnid"];
        $amount = $_GET["amount"];
        $param1 = $_GET["param1"];
        $param2 = $_GET["param2"];
        $procid = $_GET["procid"];
        $digest = $_GET["digest"];

        session()->put('merchId',$merchId);
        session()->put('txnid',$txnid);
        session()->put('amount',$amount);
        session()->put('param1',$param1);
        session()->put('param2',$param2);
        session()->put('procid',$procid);
        session()->put('digest',$digest);
        }
    ?>
@endauth

<div class="has-text-centered animated fadeIn">
    <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" style="margin-top:4em; margin-bottom:2em;">
</div>
<div class="columns animated fadeIn">        
    <div class="column is-three-fifths is-offset-one-fifth card">
            <div class="card-content">

                    <div class="content" id="EWalletContent">

                    </div>
            </div>
            <div class="has-text-right">
                <button type="button" class="button is-success" id="payNow" name="payNow" value="" style="margin-bottom:1em;margin-right:1em">
                    Pay Now
                </button>
            </div>
            
                    
    </div>
    
</div>
<center><small><a href="#" id="cancelEwallet">Cancel and return to Reseller Page.</a></small></center>

<footer class="footer animated bounceIn has-background-white">
<div class="has-text-centered">
  <p>
    <strong>v0.2</strong> - PinoyTravelReseller
  </p>
</div>
</footer>



<!-- Get Receipt Details --->
<script>

    getDtls();
    function getDtls(){
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('getReceipt') }}",
            method: "GET",
            data: {}, 
            success:function(data)
            {
                $('#EWalletContent').html(data);
            },
            error: function(xhr, ajaxOptions, thrownError){
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
</script>

<!-- Pay Now Function -->
<script>
    $(document).on('click', '#payNow', function (){    
            payNow();
    });


    function payNow(){
        //Agreement
        if($('#chkAgreement').prop("checked") == true){
            var is_agreed = $("#chkAgreement").val();
            //Validation
                //Proceed with the payment
            $.ajax({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('payVal') }}",
                method: "POST",
                data:{payVal: "TRUE", chkVal: is_agreed}, 
                dataType: "json",
                success:function(data)
                {
                    if(data.error.length > 0)
                    {
                        bulmaToast.toast({ 
                            message: data.error[0],
                            dismissible: true,
                            duration: 3000,
                            pauseOnHover: true,
                            animate: { in: "fadeIn", out: "fadeOut" },
                            type: "is-danger" 
                        });
                        getDtls();
                    }
                    else if(data.success.length > 0)
                    {
                        $.ajax({
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{ route('payNow') }}",
                            method: "POST",
                            data:{payNow: "TRUE"}, 
                            dataType: "json",
                            success:function(data)
                            {
                                if(data.success.length > 0){
                                    //Comment
                                        // window.location = "//192.168.0.35:902/message/success";
                                        // window.location = "//192.168.0.35:902/reseller/transaction_history";
                                        //Working POST REQUEST Data API
                                        //Soon will need to call an API to notify if payment is successful or not
                                        //Uncomment and modify which api endpoint is needed and replace the params&values
                                        // $.ajax({
                                        //     url: "http://103.93.223.103:205/api/login",
                                        //     method: "POST",
                                        //     data:{ companyID:"2018-101", password:"123456" }, 
                                        //     dataType: "json",
                                        //     success:function(data)
                                        //     {
                                        //         alert(data.data.access_token);
                                        //     },
                                        //     error: function(xhr, ajaxOptions, thrownError){
                                        //         console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        //     }
                                        // });
                                    //Comment End

                                    var merchId = '<?php echo session()->get("merchId"); ?>';
                                    var txnid = '<?php echo session()->get("txnid"); ?>';
                                    var amount = '<?php echo session()->get("amount"); ?>';
                                    var param1 = '<?php echo session()->get("param1"); ?>';
                                    var param2 = '<?php echo session()->get("param2"); ?>';
                                    var procid = '<?php echo session()->get("procid"); ?>';

                                    $.ajax({
                                        url: "http://192.168.0.17:2330/v1/payment/ewallet",
                                        method: "POST",
                                        data:{ 
                                            merchID:merchId,
                                            transID:txnid,
                                            amount:amount,
                                            refCode:param1,
                                            email:param2,
                                            procID:procid
                                        }, 
                                        dataType: "json",
                                        success:function(data)
                                        {
                                            // alert(data.results);
                                            $.ajax({
                                                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                url: "{{ route('cancelSession') }}",
                                                method: "POST",
                                                data:{cancelSession: "TRUE"}, 
                                                dataType: "json",
                                                success:function(data)
                                                {
                                                    if(data.success.length > 0){
                                                        window.location = "//192.168.0.35:902/message/success";
                                                    }else{
                                                        alert("Successfully Paid!");
                                                    }
                                                },
                                                error: function(xhr, ajaxOptions, thrownError){
                                                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                                }
                                            });
                                        },
                                        error: function(){
                                            $.ajax({
                                                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                url: "{{ route('cancelSession') }}",
                                                method: "POST",
                                                data:{cancelSession: "TRUE"}, 
                                                dataType: "json",
                                                success:function(data)
                                                {
                                                    if(data.success.length > 0){
                                                        window.location = "//192.168.0.35:902/message/success";
                                                    }else{
                                                        alert("Successfully Paid!");
                                                    }
                                                },
                                                error: function(xhr, ajaxOptions, thrownError){
                                                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                                }
                                            });
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
                    }
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
        else
        {
            bulmaToast.toast({ 
                message: "Please read and accept our policies to proceed with your payment",
                dismissible: true,
                duration: 3000,
                pauseOnHover: true,
                animate: { in: "fadeIn", out: "fadeOut" },
                type: "is-danger" 
            });
        }
    }


    $(document).on('click', '#cancelEwallet', function (){    
            cancelEwallet();
    });

    function cancelEwallet(){
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('cancelEwallet') }}",
            method: "POST",
            data:{cancelEwallet: "TRUE"}, 
            dataType: "json",
            success:function(data)
            {
                if(data.success.length > 0){
                    window.location = "//192.168.0.35:902/reseller/reservation/view";
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
    }
</script>
@endsection