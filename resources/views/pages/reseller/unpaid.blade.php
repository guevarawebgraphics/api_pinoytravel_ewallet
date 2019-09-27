
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

<p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Balance: <strong>
    @if(count($userBal))
        ₱{{number_format((float)$userBal[0]->total_balance, 2, '.', ',')}}
    @else
        ₱0.00
    @endif
</strong></p>    

<div style="margin:1.5em 1.5em 1.5em 1.5em;">
    <h1 class="title is-size-4"><i class="fa fa-list-alt"></i> Pending Topup</h1>
</div>


<div id="divEWBal" class="box">
    <div class="" style="overflow-y: auto;">      

        <table id="rcrdUnpaidTable" class="table is-clear-fix is-bordered is-fullwidth is-hoverable is-striped" style="margin-bottom: 1.5em; margin-top: 1.5em;">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Reference Code</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            
            <tbody id="rcrdUnpaid">
                <tr class="">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script>
getUnpaid();
function getUnpaid(){
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('getUnpaidReseller') }}",
        method: "GET",
        data: {}, 
        success:function(data)
        {
            $('#rcrdUnpaid').html(data);
            $('#rcrdUnpaidTable').DataTable({
                "serverSide": false, 
                "retrieve": true,
                "ordering": false
            });
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
</script>

@endsection