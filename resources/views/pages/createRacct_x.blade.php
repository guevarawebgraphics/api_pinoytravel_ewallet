@extends('layouts.app')
@section('content')        

{{-- DEFAULT VIEW FOR DASHBOARD IS RESERVATIONS--}}
 <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/dashboard/1">
        <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" width="112" height="28">
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end">
        <div class="navbar-item">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
                Administrator
            </a>            
            <div class="navbar-dropdown">
                <a class="navbar-item" href="/dashboard/1">
                    Administrator
                </a>
                <hr class="navbar-divider">                
                <a class="navbar-item" href="/dashboard/2">
                    Reseller Acct 1
                </a>
                <a class="navbar-item" href="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX7056622.jpg">
                    Reseller Acct 2
                </a>
                <a class="navbar-item" href="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX7056622.jpg">
                    Reseller Acct 3                    
                </a>
            </div>
        </div>          
            <div class="buttons">
            <a class="button is-danger is-small" href="/login">
              <strong>Log Out</strong>
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>   
  <div class="columns is-clearfix" style="margin: 1em">
        <aside class="menu column is-3">
        <p class="menu-label">
            Admin
        </p>
        <ul class="menu-list">
            <li><a href="/createRacct">Create Reseller Account</a></li>
            <li><a>Edit Reseller Information</a></li>
            <li><a>Delete Reseller</a></li>        
            <li><a>Hold Reseller</a></li>               
            <li><a>View Reseller Account</a></li>        
            <li><a>Get Total Wallet Value</a></li>        
            <li><a>Reports</a></li>        
        </ul>
        </aside>
        <div class="column auto" style="">
          {{-- title--}}
          <h1 class="title is-4">Create Reseller Account</h1>
          {{-- form start--}}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Name</label>
            </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="name" placeholder="Enter Name" value="{{ old('name') }}">
                  </p>
                </div>
              </div>
            </div>
          {{-- form start--}}
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Email</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="email" placeholder="Enter Email" value="{{ old('email') }}" >
                  </p>
                </div>
              </div>
            </div>
          {{-- form end--}}
          {{-- form start--}}
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Address</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="text" placeholder="Enter Address" value="{{ old('address') }}">
                  </p>
                </div>
              </div>
            </div>
          {{-- form end--}}
          {{-- form start--}}
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Contact No.</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="number" placeholder="Enter Contact No." value="{{ old('contact') }}">
                  </p>
                </div>
              </div>
            </div>
          {{-- form end--}}
          {{-- form start--}}
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Password</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control">
                    <input class="input" type="text" placeholder="Default('*pass@csi')" value="*pass@csi">
                  </p>
                </div>
              </div>
            </div>
          {{-- form end--}}
          {{-- form start--}}
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Image</label>
              </div>
              <div class="field-body">
                <div class="field">
                    <div class="file is-info has-name">
                        <label class="file-label">
                          <input class="file-input" type="file" name="resume">
                          <span class="file-cta">
                            <span class="file-icon">
                              <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                              Upload File
                            </span>
                          </span>
                          <span class="file-name">
                            image.png
                          </span>
                        </label>
                      </div>
                </div>
              </div>
            </div>
          {{-- form end--}}          
      </div>   
    </div>
        
     

@endsection


