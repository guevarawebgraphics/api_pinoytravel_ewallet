@extends('layouts.appAdmin')
@section('content')  
<div class="column auto" style=" overflow-x: auto;">
        @include('includes.createNotifs') 

<div id="" class="box">
        <p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Overall PT-Reseller Balance: <strong>
            @if(count($sumBal))
            ₱{{ number_format((float)$sumBal[0]->total_balance, 2, '.', ',') }}
            @else
            ₱0.00
            @endif
        </strong></p>    
        
        <div style="margin:1.5em 1.5em 1.5em 0;">
            <h1 class="title is-size-4"> Deleted Accounts</h1>
        </div>
        <hr>
        <div class="" style="overflow-y: auto; max-width:100%;">     

                <table id="rcrdDeletedTable" class="table is-clear-fix is-bordered is-fullwidth is-striped" style="margin-bottom: 1.5em; margin-top: 1.5em;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 346px;">Address</th>
                            <th>Contact</th>
                            <th>Account Balance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody id="rcrdDeleted">
                        <tr class="">
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
    <div class="modal modalActivate">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">Reactivate Account</p>
            <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">

                The account of <p class="modalName has-text-weight-bold is-inline"></p> will be able to perform any transactions.
                                             

                <textarea class="textarea reactArea" placeholder="Remarks" style="margin-top: 1.5em;"></textarea>
            </section>
            <footer class="modal-card-foot">
                <form method="post" class="frmPost">
                @method('PUT')
                @csrf                                            
                <input type="hidden" name="Edit" value="5">
                <input type="hidden" name="reactText" class ="reactHidden">
            </form>
                <button class="button is-success has-text-weight-bold btnPost">Reactivate</button>
                <button class="button">Cancel</button>
            </footer>
        </div>
    </div>

</div>
    <script>
    getDeletedRcrds();
    function getDeletedRcrds(){
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('RcrdsDeletedAccounts') }}",
            method: "GET",
            data: {}, 
            success:function(data)
            {
                $('#rcrdDeleted').html(data);
                $('#rcrdDeletedTable').DataTable({
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

    function activateModal(id,name){

        $(".modalActivate").addClass("is-active"); 
        $('.modalName').html(name);

        $('.frmPost').attr('id', 'form'+id);
        $('.reactHidden').attr('id', 'reactText'+id);
        $('.reactArea').attr('id', 'reactID'+id);
        $('.frmPost').attr('action', '/admin/update/'+id);

        var btn = "$('#form"+id+"').submit();";
        $('.btnPost').attr('onclick', btn);

        var txtOnkeyup = "reactText("+id+")";
        $('.reactArea').attr('onkeyup', txtOnkeyup);

    }

    function reactText(id){
        var txtAreaValue = $('#reactID'+id).val();
        // alert(txtAreaValue);
        $('#reactText'+id).val(txtAreaValue);
    }

    function activate(id){
        var userId = id;
        var btn = "btn"+id;
        var x = document.getElementById(btn);
        x.innerHTML = "Loading...";
        document.getElementById(btn).disabled = true;
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('activateAccount') }}",
            method: "POST",
            data: {userId:userId}, 
            dataType: "json",
            success:function(data)
            {
                if(data.success.length > 0)
                {
                    location.reload();
                    // bulmaToast.toast({ 
                    //     message: data.success[0],
                    //     dismissible: true,
                    //     duration: 3000,
                    //     pauseOnHover: true,
                    //     animate: { in: "fadeIn", out: "fadeOut" },
                    //     type: "is-success" 
                    // });
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