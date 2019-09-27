<br>
<div id="divEWBal" class="box" style="display:none;">
    <h1 class="title is-4">Pending Topup</h1>
    <br>
    <div class="" style="overflow-y: auto;">        
            <table id="rcrdUnpaidTable" class="table is-clear-fix is-bordered is-fullwidth is-hoverable is-striped" style="margin-bottom: 1.5em; margin-top: 1.5em;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody id="rcrdUnpaid">
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



<a class="is-link" onClick="toggleEWBal();" data-attribute="{{ $reseller->id }}">
    <em id="hideLabel">Show Pending Topup..</em>
</a>


<script>
getUnpaid();
function getUnpaid(){
    var userId = "{{ $reseller->id }}";
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('getunpaid') }}",
        method: "POST",
        data: {userId:userId}, 
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

function toggleEWBal() {
        var x = document.getElementById("divEWBal");
        if (x.style.display === "none") {

            x.style.display = "block";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Hide Pending Topup..";
            getEPassbook();

        } else {

            x.style.display = "none";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Hide Pending Topup..";

        }
}

function markAs(id,userId){
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('markaspaid') }}",
        method: "POST",
        data:{
            proceed:"TRUE",
            paidId:id,
            userId:userId
        }, 
        dataType: "json",
        success:function(data)
        {
            if(data.success.length > 0){
                location.reload();
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