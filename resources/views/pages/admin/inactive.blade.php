@extends('layouts.appAdmin')
@section('content')  

<div class="column auto" style=" overflow-x: auto;">
        <div class="box">
            <h1 class="title is-4">Deleted Reseller Accounts</h1>

            <table class="table is-bordered is-responsive is-hoverable table-row-hover-background-color" id="TableDeletedRecords" style="margin-bottom: 1.5em; width:100%; margin-top: 1.5em;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Account Balance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="TxnRecords">
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

@endsection