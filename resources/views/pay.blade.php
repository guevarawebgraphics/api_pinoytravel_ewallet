@extends('layouts.app')
@section('content') 


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
<center><small><a href="/reseller/reservation/view">Cancel and return to Reseller Page.</a></small></center>

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
                        alert(data.error[0]);
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
                                    alert(data.success[0]);
                                    getDtls();
                                }else{
                                    alert(data.error[0]);
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
            alert("Please read and accept our policies to proceed with your payment");
        }
    }
</script>
@endsection