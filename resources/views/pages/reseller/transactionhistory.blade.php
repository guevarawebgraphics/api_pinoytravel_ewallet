@extends('layouts.appReseller')
@section('content')

    
<div style="margin:1.5em 1.5em 1.5em 1.5em;">
        <h1 class="title is-3"><i class="fa fa-file-text-o"></i> Transaction History</h1>
</div>        

<div class="box">    
    <div class="" style="margin-bottom:2em; overflow-x:auto!important;">  
        <table class="table is-bordered is-responsive is-hoverable table-row-hover-background-color" id="TableTxnRecords" style="margin-bottom: 1.5em; width:100%; margin-top: 1.5em;">
            <thead>
                <tr>
                    <th>Merchant ID</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>refCode</th>
                    <th>Email</th>
                    <th>Proc ID</th> 
                    <th>Created Date</th>                                              
                </tr>
            </thead>
            <tbody id="TxnRecords">
                <tr class="">
                    <td></td>                        
                    <td></td>
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

<div id="ToastDiv">


</div>


<script>
    txnDtls();
    function txnDtls(){
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('getTxnHistory') }}",
            method: "GET",
            data: {}, 
            success:function(data)
            {
                $('#TxnRecords').html(data);
                $('#TableTxnRecords').DataTable({
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

    toastDtls();
    function toastDtls(){
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('getToastDtls') }}",
            method: "GET",
            data: {}, 
            success:function(data)
            {
                $('#ToastDiv').html(data);
            },
            error: function(xhr, ajaxOptions, thrownError){
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

</script>
    
@endsection