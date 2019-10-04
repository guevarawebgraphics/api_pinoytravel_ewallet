
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
     
<div class="box">  
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
                            <span class="button is-primary is-outlined follow">Follow</span>
                          </p>
                          <p class="tagline">The users profile bio would go here, of course. It could be two lines</p>
                        </div>
                        <div class="column followers has-text-centered">
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
                    
                    <div class="column is-4">
                            <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                      <input class="input" type="text" placeholder="Text input">
                                    </div>
                                  </div>
                                  
                                  <div class="field">
                                    <label class="label">Username</label>
                                    <div class="control has-icons-left has-icons-right">
                                      <input class="input" type="text" placeholder="Text input" value="bulma" readonly>
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                      </span>
                                  </div>
                                  
                                  <div class="field">
                                    <label class="label">Email</label>
                                    <div class="control has-icons-left has-icons-right">
                                      <input class="input" type="email" placeholder="Email input" value="hello@" readonly>
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                      </span>
                                    </div>
                                  </div>
                                  
                                  
                                  
                                  
                                  
                                  
                                  <div class="field is-grouped">
                                    <div class="control">
                                      <button class="button is-link">Submit</button>
                                    </div>
                                    <div class="control">
                                      <button class="button is-text">Cancel</button>
                                    </div>
                                  </div>
                    </div>
                    
                  </div>
    </div>
</div>

@endsection