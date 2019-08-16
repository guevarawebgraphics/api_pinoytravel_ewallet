@extends('layouts.appReseller')
@section('content') 

<p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Balance: <strong>
        @if($userBal != "")
          ₱{{ number_format((float)$userBal[0]->total_balance, 2, '.', ',') }}
        @else
          ₱0.00
        @endif
    </strong></p>    
  
     
<div style="margin:1.5em 1.5em 1.5em 1.5em;">
        <h1 class="title is-size-4"><i class="fa fa-history"></i> Top Up History</h1>

</div>        

<div class="box">    
    <div class="" style="margin-bottom: 2em;overflow-x:auto!important;">    
        <table class="table is-bordered is-responsive is-hoverable table-row-hover-background-color" id="TableTopUpRecords" style="margin-bottom: 1.5em; width:100%; margin-top: 1.5em;">
            <thead>
                <tr class="">
                    <th>Transaction ID</th>
                    <th>Reference Code</th>
                    <th>Proc ID</th>
                    <th>Amount</th>
                    <th>Created Date</th>                                              
                </tr>
            </thead>
            <tbody id="TopUpRecords">
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

<!-- Get Top Up History --->
<script>
    topupDtls();
    function topupDtls(){
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('getTopup') }}",
            method: "GET",
            data: {}, 
            success:function(data)
            {
                $('#TopUpRecords').html(data);
                $('#TableTopUpRecords').DataTable({
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


