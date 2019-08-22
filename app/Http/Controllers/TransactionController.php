<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use DateTime;
use App\Models\UserBalance;

class TransactionController extends Controller
{
    public function index()
    {
        $userBal = UserBalance::where('userId', auth()->user()->id)->get();
        return view('pages.reseller.transactionhistory')->with('userBal', $userBal);     
    }
    public function getTxnHistory(){
        
        $txnRecords = DB::connection('mysql')->select("SELECT * FROM transaction_details WHERE userId = '".auth()->user()->id."'
        ORDER BY created_at DESC");

        $data = "";
        $counter = 1;
        if(count($txnRecords) > 0){
            foreach($txnRecords as $field){
                $data .= '
                <tr class="">
                    <td>'.$field->merchId.'</td>                        
                    <td>'.$field->transId.'</td>
                    <td>₱'.number_format((float)$field->amount, 2, '.', ',').'</td>
                    <td>'.$field->refCode.'</td>
                    <td>'.$field->transEmail.'</td>
                    <td>'.$field->procId.'</td>
                    <td>'.date("F d Y - h:i a",strtotime($field->created_at)).'</td>
                </tr>
                ';
                $counter++;
            }
        }
        echo $data;

    }

    // public function getToastDtls(){
        
    //     $data = "";

    //     if(session()->get('tnxSuccess') != ""){
    //         $data .= '
            
    //             <input type="text" id="tnxid" value="'.session()->get('txnid').'" style="display:none;"> 
    //             <input type="text" id="refCode" value="'.session()->get('param1').'" style="display:none;"> 
    //             <script>
    //                 var tnxid = $("#tnxid").val();
    //                 var refCode = $("#refCode").val();
    //                 var is_success = "Ref. Code: "+refCode+" Transaction ID: "+tnxid+" Successfully paid!";
                    
                    
    //                 bulmaToast.toast({ 
    //                     message: is_success,
    //                     dismissible: true,
    //                     duration: 3000,
    //                     pauseOnHover: true,
    //                     animate: { in: "fadeIn", out: "fadeOut" },
    //                     type: "is-success" 
                        
    //                 });
                    

    //             </script>';
    //             session()->forget('merchId');
    //             session()->forget('txnid');
    //             session()->forget('amount');
    //             session()->forget('param1');
    //             session()->forget('param2');
    //             session()->forget('procid');
    //             session()->forget('tnxSuccess');
    //     }else{
    //         $data .= '';
    //     }
    //     echo $data;
    // }
}
