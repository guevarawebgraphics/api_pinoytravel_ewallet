@extends('layouts.appAdmin')
@section('content')
<div class="column auto" style=" overflow-x: auto;">
    <div class="box">
        <p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Overall PT-Reseller Balance: <strong>
                @if(count($sumBal))
                ₱{{ number_format((float)$sumBal[0]->total_balance, 2, '.', ',') }}
                @else
                ₱0.00
                @endif
            </strong></p>    
            
            <div style="margin:1.5em 1.5em 1.5em 0;">
                <h1 class="title is-size-4"> Create Admin Account</h1>
            </div>
            <hr>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Name</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" name="name" id="adName" style="text-transform: capitalize;" type="name" placeholder="Juan Dela Cruz" value="">
                            
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Email</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" name="email" id="adEmail" type="name" placeholder="youremail@mail.com" value="">
                            
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Password</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" name="password" id="adPassword" type="password" placeholder="" value="">
                            
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Address</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" name="address" id="adAddress"  type="name" placeholder="" value="">
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Contact No</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" name="contact" id="adContact" type="text" placeholder="+6397 792 7818" value="">
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-grouped is-grouped-centered" style="margin-top:1em">
            <p class="control">                    
                <button type="button" id="adSave" class="button is-success" >
                    <span class="file-icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    Save
                </button> 
            </p>
        </div>
        
    </div>
</div>


<script>
    $('#adSave').click(function(){

        var adName = $('#adName').val();
        var adEmail = $('#adEmail').val();
        var adPassword = $('#adPassword').val();
        var adAddress = $('#adAddress').val();
        var adContact = $('#adContact').val();
        
        $.ajax({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('newAdminVal') }}",
                method: "POST",
                data:{
                    proceed:"TRUE",
                    name:adName,
                    email:adEmail,
                    password:adPassword,
                    address:adAddress,
                    contact:adContact
                }, 
                dataType: "json",
                success:function(data)
                {
                    if(data.success.length > 0)
                    {
                        $.ajax({
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{ route('newAdmin') }}",
                            method: "POST",
                            data:{
                                proceed:"TRUE",
                                name:adName,
                                email:adEmail,
                                password:adPassword,
                                address:adAddress,
                                contact:adContact
                            }, 
                            dataType: "json",
                            success:function(data)
                            {
                                if(data.success.length > 0)
                                {
                                    bulmaToast.toast({ 
                                        message: data.success[0],
                                        dismissible: true,
                                        duration: 3000,
                                        pauseOnHover: true,
                                        animate: { in: "fadeIn", out: "fadeOut" },
                                        type: "is-success" 
                                    });
                                }
                                else
                                {
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
                    else
                    {
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
        });
</script>
@endsection