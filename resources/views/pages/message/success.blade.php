@extends('layouts.appReseller')
@section('content')

<style>
/* body{
    background: #edf3f7;
	height: 100%;
} */
.text-center{
    background: transparent; margin: 0 auto; text-align: center;
}
h3{
    font-size:5vw; 
    color:#44b550!important;
}
hr{
    margin-top: 20px; 
    margin-bottom: 20px; 
    border: 0;
}
.lead{
    margin-bottom: 20px;
    font-size: 16.099999999999998px;
}
</style>

<div class="container" style="margin-top: 5em;">
    <div class="text-center">
        <img src="{{asset('img/icon/pt_logo.png')}}">
        <h3>Payment Successful!</h3>
        <p class="lead">Success! We received your payment. Please check your email/sms inbox for the notice.</p>
        <!-- <a href="http://www.agoda.com/pinoytravel" target="_blank"><img src="https://s3-us-west-2.amazonaws.com/pinoytravel/public/img/banner/pt_agoda_banner.jpg" style="width: 100%"></a> -->
        <hr>
        <p class="lead">Any Question or problems? <a href="mailto:support@pinoytravel.com.ph">Contact PinoyTravel Support</a></p>
        <p class="lead text-muted">Copyright &copy; PinoyTravel, Inc. All rights reserved.</p>
    </div>
</div>

@endsection