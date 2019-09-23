
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
<br>
<div id="divEWBal" class="box">
    <h1 class="title is-4">Reseller EPassbook</h1>
    <br>
    <div class="" style="overflow-y: auto;">        
            <table id="rcrdPassbookTable" class="table is-clear-fix is-bordered is-fullwidth is-hoverable" style="margin-bottom: 1.5em; margin-top: 1.5em;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                    </tr>
                </thead>
              
                <tbody id="rcrdPassbook">
                    <tr class="">
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

getEPassbook();
function getEPassbook(){
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('getEPassbookReseller') }}",
        method: "GET",
        data: {}, 
        success:function(data)
        {
            $('#rcrdPassbook').html(data);
            $('#rcrdPassbookTable').DataTable({
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


function pbDiv(id, rowId){
    if(id != "NONE"){
        var x = document.getElementById(id);
        if (x.style.display === "none") {

            x.style.display = "block";

        } else {

            x.style.display = "none";

        } 
    }
}
</script>

@endsection