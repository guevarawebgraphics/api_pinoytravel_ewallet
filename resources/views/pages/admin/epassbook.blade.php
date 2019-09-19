<br>
<div id="divEWBal" class="box" style="display:none;">
    <h1 class="title is-4">Reseller EPassbook</h1>
    <br>
    <div class="" style="overflow-y: auto;">        
            <table class="table is-clear-fix is-bordered is-fullwidth is-striped" style="margin-bottom: 1.5em">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Account Balance</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
              
                <tbody>
                    <tr>
                        <td><p>No record found..</p></td>
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

<a class="is-link" onClick="toggleEWBal();">
    <em id="hideLabel">Show Reseller EPassbook..</em>
</a>

<script>

function toggleEWBal() {
        var x = document.getElementById("divEWBal");
        if (x.style.display === "none") {

            x.style.display = "block";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Hide Reseller EPassbook..";

        } else {

            x.style.display = "none";

            var hideAccount = document.getElementById("hideLabel");
            hideAccount.innerHTML = "Show Reseller EPassbook..";

        }
}
</script>