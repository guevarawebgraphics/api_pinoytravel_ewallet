@extends('layouts.appAdmin')
@section('content')             
        <div class="column auto" style="">
          {{-- title--}}
          <h1 class="title is-3"> <a id="iconPicker" href="/reseller/view" class="is-4"> <i class="fas fa-arrow-left"></i> </a>  Reseller Account Profile</h1>
          {{-- form start--}}
          <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Name</label>
                </div>
                  <div class="field-body">
                    <div class="field">
                      <p class="control">
                        <input class="input" type="name" placeholder="Enter Name" value="{{$reseller->name}}" readonly>
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
                        <input class="input" type="email" placeholder="Enter Email" value="{{$reseller->email}}" readonly>
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
                        <input class="input" type="text" placeholder="Enter Address" value="{{$reseller->address}}" readonly>
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
                        <input class="input" type="number" placeholder="Enter Contact No." value="{{$reseller->contact_no}}" readonly>
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
                        <input class="input" type="text" placeholder="Default('*pass@csi')" value="{{$reseller->password}}" readonly>
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
                                    {{-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAAB9CAMAAABH0HuwAAAAM1BMVEX///8EBARBQUHu7u4TExNgYGBQUFC/v7+fn5/f398xMTGurq4iIiLOzs5vb2+Pj49/f39vBQ4DAAAB7UlEQVR4nO2a3ZLCIAxGCxT6p7Xv/7Rr6apbW0iVEDqz37ncG88kJiRZqwoAAAAAAAAAAADDqJVHj0NZEzPV6g/1ZMq53FYqXudWSMXodxWfrSLBuW7C8huc63lcStiYS8hFqYt0plzYRSkn6zLEXJSS7TiRJPlESbq0cRelWkGZnpLp5Vw6ykWpTkyGzJJkniwtY8Vkdh+lNfp/ytAuSonJEC1vRq7tnSpNp5KZaJlJTIZ4s2fk3m1DywjOV9HRakZyvGoomUZQ5lTDFRUa0cCcayCvTHBtui9O4kvlNSxTYKUMjnuSwzhlU8TlnqmdAr8UyNGCGd9dxoLXoqpbzeZWbkHZx7TWr3S9bUtGBYBP6EYXfJkbN0pWVePXA7f7kUuxa6khonluKm4zdg/P0UJEx6wmmdq2z/h0rV3NFS573xl25hjt2f69zryvHLjMrN6HjCqGvOW902dL1ecu+Wy+cclm85VLpivsh9/dFxm+xQfOrSHYp+IusidR1NxPFXl3iMG8YZJnhzi879SBK14M1gtfYmB4Q/N1WT9gLO8DNzwKvj6c0GMe8PWapLpe4KvudBe+f2wk19IMVz3dOGS4fj6SXNgzXMWd2H4XuJpwwoP9omaS4XBhKyfIhNAsMMkAAAAAAAAAAABbfgCCshA8UlE1ggAAAABJRU5ErkJggg==" height="100px" width="150px"> --}}
                              <img src="" alt="{{$reseller->profile_pic}}" height="100px" width="150px">
                            </label>
                          </div>
                    </div>
                  </div>
                </div>
              {{-- form end--}}


              {{-- form start--}}
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                                  
                </div>
                <div class="field-body">
                  <div class="field">
                      <div class="file is-info has-name">
                        <p class="control is-centered">                    
                          <a class="button is-success" href="/reseller/{{$reseller->reseller_id}}/edit">
                              <span class="file-icon">
                                  <i class="fa fa-edit"></i>
                              </span>
                                  Edit Reseller
                          </a>
                      </p> 
                        </div>
                  </div>
                </div>
              </div>
            {{-- form end--}}                                                
      </div>   
    </div>
@endsection


