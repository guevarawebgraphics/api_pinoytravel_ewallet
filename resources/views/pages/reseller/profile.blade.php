
@extends('layouts.appReseller')
@section('content')
<style>

.container.profile {
  margin-top: 50px;
}

.profile-heading {
  margin: 20px 0;
  padding-bottom: 30px;
}

.profile-heading .name {
  border-right: 1px solid #f1f1f1;
  margin: -30px 0;
  padding: 40px 30px 0 30px;
}

.profile-heading .followers, .profile-heading .following {
  border-right: 1px solid #f1f1f1;
  margin: -30px 0;
  padding: 70px 30px;
}

.profile-heading .likes {
  margin: -30px 0;
  padding: 70px 30px;
}

.profile-heading .stat-key {
  font-size: 20px;
  font-weight: 200;
}

.profile-heading .stat-val {
  font-size: 35px;
  font-weight: bold;
}

.profile-options {
  background-color: #f1f1f1;
  margin: -20px 0 20px 0;
}

.profile-options .link a {
  padding: 18px;
  font-size: 18px;
}

.profile-options .link .icon {
  font-size: 16px;
  padding-top: 2px;
}

.tagline {
  padding: 20px 0;
  font-size: 16px;
  line-height: 1.4;
}

.avatar {
  float: right;
}

.follow {
  float: right;
}

.avatar img {
  border-radius: 200px;
}

p.title.is-bold {
  font-weight: bold;
}

.card .timestamp {
  float: right;
  color: #bbb;
}

</style>
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

@include('includes.createNotifs') 

<div class="box" style="margin-top:1.5em;">  
    {{-- <div style="overflow-x:auto!important;"> --}}
        <div>
            <div class="container profile">

                    <div class="section profile-heading">
                      <div class="columns">
                        <div class="column is-2">
                          <div class="image is-128x128 avatar">
                            <img src="https://placehold.it/256x256">
                          </div>
                        </div>
                        <div class="column is-4 name">
                          <p>
                            <span class="title is-bold">{{auth()->user()->name}}</span>
                            {{-- <span class="button is-primary is-outlined follow">Follow</span> --}}
                          </p>
                        <p class="tagline"><i class="fas fa-map-marker"></i>&nbsp;{{ auth()->user()->address }}</p>
                        </div>
                        <div class="column followers has-text-centered" style="border: none!important;">
                            <p class="stat-val">
                                    @if(count($userBal))
                                    ₱{{ number_format((float)$userBal[0]->total_balance, 2, '.', ',') }}
                                  @else
                                    ₱0.00
                                  @endif
                            </p>
                            <p class="stat-key">Total Account Balance</p>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="profile-options">
                      <div class="tabs is-fullwidth">
                        <ul>
                          <li class="link is-active"><a><span class="icon"><i class="fa fa-list"></i></span> <span>My Lists</span></a></li>
                          <li class="link"><a><span class="icon"><i class="fa fa-heart"></i></span> <span>My Likes</span></a></li>
                          <li class="link"><a><span class="icon"><i class="fa fa-th"></i></span> <span>My Posts</span></a></li>
                        </ul>
                      </div>
                    </div> --}}
                
                    <div class="spacer"></div>
                    <div class="columns is-centered" style="margin:0 auto;">
                    <div class="column is-5">
                            <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                    <input class="input" type="text" placeholder="Text input" value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                  </div>
                                  
                                  
                                  
                                  <div class="field">
                                    <label class="label">Email</label>
                                    <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Email input" value="{{ auth()->user()->email }}" readonly>
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                      </span>
                                    </div>
                                  </div>
                                  
                                  
                                  
                                  
                                  
                    </div>
                    

                    <div class="column is-5">

                        <div class="field">
                            <label class="label">Current Password</label>
                            <div class="control">
                              <input class="input" type="password" placeholder="" value="" id="curPwd" name="curPwd">
                              
                            </div>
                          </div>
                        <hr>
                        <div class="field">
                            <label class="label">New Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="" value="" id="newPwd" name="newPwd">
                            </div>
                          </div>
                          
                          
                          
                          <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="" value="" id="cnfrmPwd" name="cnfrmPwd">
                              
                            </div>
                          </div>
                          
                         
                          
                          <div class="field is-grouped">
                            <div class="control">
                              <button class="button is-link" id="chngPwd">Change password</button>
                            </div>
                            <div class="control">
                              <button class="button is-text" onClick="location.href=;;">Cancel</button>
                            </div>
                          </div>

                    </div>
                    </div>
                  </div>
                  <br>
                  <br>
    </div>
</div>
<script>
$(document).on('click', '#chngPwd', function (){    
  changePassword();
});

function changePassword(){
var newPwd = $('#newPwd').val();
var cnfrmPwd = $('#cnfrmPwd').val();
var curPwd = $('#curPwd').val();
$.ajax({
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ route('changePwdVal') }}",
      method: "POST",
      data:{
        proceed: "TRUE",
        newPassword:newPwd,
        cnfrmPassword:cnfrmPwd,
        curPwd:curPwd
      }, 
      dataType: "json",
      success:function(data)
      {
        if(data.success.length > 0)
        {
          var x = document.getElementById("chngPwd");
          x.innerHTML = "Loading...";
          document.getElementById("chngPwd").disabled = true;
          $.ajax({
              headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: "{{ route('changePwd') }}",
              method: "POST",
              data:{
                proceed: "TRUE",
                newPassword:newPwd,
                cnfrmPassword:cnfrmPwd,
                curPwd:curPwd
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
                  var x = document.getElementById("chngPwd");
                  x.innerHTML = "Change Password";
                  document.getElementById("chngPwd").disabled = false;
                  $('#newPwd').val("");
                  $('#cnfrmPwd').val("");
                  $('#curPwd').val("");
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
}
</script>
@endsection