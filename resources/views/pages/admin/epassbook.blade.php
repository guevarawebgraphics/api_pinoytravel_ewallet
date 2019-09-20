<br>
<div id="divEWBal" class="box" style="display:none;">
    <h1 class="title is-4">Reseller EPassbook</h1>
    <br>
    <div class="" style="overflow-y: auto;">        
            <table id="rcrdPassbookTable" class="table is-clear-fix is-bordered is-fullwidth is-striped" style="margin-bottom: 1.5em; margin-top: 1.5em;">
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

<a class="is-link" onClick="toggleEWBal();" data-attribute="{{ $reseller->id }}">
    <em id="hideLabel">Show Reseller EPassbook..</em>
</a>

<script>

function getEPassbook(){
    var userId = "{{ $reseller->id }}";
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('getEPassbook') }}",
        method: "POST",
        data: {userId:userId}, 
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

function toggleEWBal() {
        var x = document.getElementById("divEWBal");
        if (x.style.display === "none") {

            x.style.display = "block";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Hide Reseller EPassbook..";
            getEPassbook();

        } else {

            x.style.display = "none";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Show Reseller EPassbook..";

        }
}
</script>