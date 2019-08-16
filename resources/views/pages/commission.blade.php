@extends('layouts.appReseller')
@section('content')        
  <p class="is-large is-pulled-right" style="margin-top:1em; margin-right:10px;">Balance: <strong> PHP 3000.00</strong></p>    

<div class="" style="margin:1.5em 1.5em 1.5em 0">
        <h1 class="title is-size-4">Commission</h1>
        {{-- <img src="{{asset('img/icon/pt_logo.png')}}" alt="PinoyTravel" style="margin-top:4em"> --}}
</div>
          {{-- start of search bar--}}    

          <div class="field has-addons is-grouped is-grouped-right">
                <div class="control">
                  <input class="input is-small" type="text" placeholder="Find a repository">
                </div>
                <div class="control">
                    <a class="button is-info is-small">
                        Search
                    </a>
                </div>
            </div>      
        {{-- end of search bar--}}        
      <table class="table is-clear-fix is-bordered" style="margin-bottom: 1.5em">
          <thead>
              <tr>
              {{-- <th><abbr title="RefCode">Reference Code</abbr></th> --}}
              <th>Reference Code</th>
              <th>Ticket No</th>
              <th>Date Time Requested</th>
              <th>Contacts</th>
              <th>Operator</th>
              <th>Itinerary Details</th>
              <th>No. Of Seats</th>
              <th>Commission</th>
              {{-- <th><abbr title="Played">Pld</abbr></th>
              <th><abbr title="Won">W</abbr></th>
              <th><abbr title="Drawn">D</abbr></th>
              <th><abbr title="Lost">L</abbr></th>
              <th><abbr title="Goals for">GF</abbr></th>
              <th><abbr title="Goals against">GA</abbr></th>
              <th><abbr title="Goal difference">GD</abbr></th>
              <th><abbr title="Points">Pts</abbr></th>
              <th>Qualification or relegation</th> --}}
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>Reference Code</th>
              <th>Ticket No</th>
              <th>Date Time Requested</th>
              <th>Contacts</th>
              <th>Operator</th>
              <th>Itinerary Details</th>
              <th>No. Of Seats</th>        
              <th>Commission</th>
              {{-- <th><abbr title="Position">Pos</abbr></th>
              <th>Team</th>
              <th><abbr title="Played">Pld</abbr></th>
              <th><abbr title="Won">W</abbr></th>
              <th><abbr title="Drawn">D</abbr></th>
              <th><abbr title="Lost">L</abbr></th>
              <th><abbr title="Goals for">GF</abbr></th>
              <th><abbr title="Goals against">GA</abbr></th>
              <th><abbr title="Goal difference">GD</abbr></th>
              <th><abbr title="Points">Pts</abbr></th>
              <th>Qualification or relegation</th> --}}
              </tr>
          </tfoot>
          <tbody>
              <tr class="is-selected">
              <th>FS6544</th>
              <td></td>
              <td>April 10, 2019 02:51 PM</td>
              <td>Sample@sample.com</td>
              <td>DLTB</td>
              <td>April 17, 2019 @ 11:00 PM <br>Sampaloc, Metro Manila <br> Laoag, Ilocos Norte</td>
              <td>3</td>
              <td>PHP 32.00</td>
          </tr>
          <tr>
              <th>FS6544</th>
              <td></td>
              <td>April 10, 2019 02:51 PM</td>
              <td>Sample@sample.com</td>
              <td>DLTB</td>
              <td>April 17, 2019 @ 11:00 PM Sampaloc, Metro Manila - Laoag, Ilocos Norte</td>
              <td>3</td>
              <td>PHP 32.00</td>
          </tr>
      </tbody>
  </table>
  <nav class="pagination" role="navigation" aria-label="pagination" style="margin-bottom:1.5em">
          <a class="pagination-previous">Previous</a>
          <a class="pagination-next">Next page</a>
          <ul class="pagination-list">
            <li>
              <a class="pagination-link" aria-label="Goto page 1">1</a>
            </li>
            <li>
              <span class="pagination-ellipsis">&hellip;</span>
            </li>
            <li>
              <a class="pagination-link" aria-label="Goto page 45">45</a>
            </li>
            <li>
              <a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a>
            </li>
            <li>
              <a class="pagination-link" aria-label="Goto page 47">47</a>
            </li>
            <li>
              <span class="pagination-ellipsis">&hellip;</span>
            </li>
            <li>
              <a class="pagination-link" aria-label="Goto page 86">86</a>
            </li>
          </ul>
        </nav>

@endsection


