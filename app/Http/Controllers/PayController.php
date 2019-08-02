<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use DateTime;
use App\Models\TransactionDetails;

class PayController extends Controller
{
    public function index()
    {
        return view('pay');
    }

    public function getReceipt(Request $request)
    {
        $userBal = DB::connection('mysql')->select("
        SELECT a.id as userId, 
            (select sum(tuhh.amount) from top_up_history as tuhh where tuhh.userId = a.id) as total_topup,
            ((select sum(tuh.amount) from top_up_history as tuh where tuh.userId = a.id)
            -
            (select sum(tr.amount) from transaction_details as tr where tr.userId = a.id)) as total_balance
        FROM users AS a
        LEFT JOIN  top_up_history AS b ON a.id = b.userId
        LEFT JOIN transaction_details as c ON a.id = c.userId
        WHERE a.id = '".auth()->user()->id."' AND b.is_paid = 1
        GROUP BY a.id
        ");
        $data = "";
        $data .= '
        <div class="columns">
        <div class="column">
            <h1><label style="color:#2ca0da;">e</label>Wallet</h1>
        </div>
        <div class="column">
        </div>
        <div class="column">

        </div>
        <div class="column">
        <!-- <i class="fa fa-shopping-cart" style="margin-right:5px;"></i> -->
            <b>Balance:&nbsp;<span>₱'.number_format((float)$userBal[0]->total_balance, 2, '.', ',').'</span></b>
        </div>
        </div>
        <hr>
        <div class="">
        <h4>Hi '.auth()->user()->name.',</h4>
            <div class=""
                <p>Please check your transaction details before proceeding with the payment.</p>
            </div>
            <div class="" style="margin-top: 1em;">
                <table style="margin: none!important;">
                <tr>
                    <td>
                        <b>Merchant ID: </b>
                    </td>
                    <td>
                    '.session()->get('merchId').'
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Transaction ID: </b>
                    </td>
                    <td>
                    '.session()->get('txnid').'
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Amount: </b>
                    </td>
                    <td>
                        '.session()->get('amount').'
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Reference Code: </b>
                    </td>
                    <td>
                        '.session()->get('param1').'
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Email: </b>
                    </td>
                    <td>
                        '.session()->get('param2').'
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Proc ID: </b>
                    </td>
                    <td>
                        '.session()->get('procid').'
                    </td>
                </tr>
                </table>
            </div>
            <div class="" style="margin-top: 1em;">
                <b>Current Balance:  </b>'.number_format((float)$userBal[0]->total_balance, 2, '.', ',').'<br>
                <b>Total Amount to Pay:  </b>'.session()->get('amount').'<br>
            </div>
            <div class="" style="margin-top:2em;">
                <p><input type="checkbox" id="chkAgreement" name="chkAgreement" value="chkAgreement"> I declare that I have read and accepted<br>The <a href="https://www.pinoytravel.com.ph/terms">PinoyTravel-Ewallet Policies</a> and my payment method rights.</p>
            </div>
        </div>
        ';
        echo $data;

    }

    public function payVal(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        if($request->payNow != "")
        {
            $messages = "Please Click Paynow";
            $error[] = $messages;
        }
        else if($request->input('chkVal') != "chkAgreement")
        {
            $messages = "Please read and accept our policies to proceed with your payment";
            $error[] = $messages;
        }
        else
        {
            $messages = "TRUE";
            $success[] = $messages;
        }
        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }

    public function payNow(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        $userBal = DB::connection('mysql')->select("
        SELECT a.id as userId, 
            (select sum(tuhh.amount) from top_up_history as tuhh where tuhh.userId = a.id) as total_topup,
            ((select sum(tuh.amount) from top_up_history as tuh where tuh.userId = a.id)
            -
            (select sum(tr.amount) from transaction_details as tr where tr.userId = a.id)) as total_balance
        FROM users AS a
        LEFT JOIN  top_up_history AS b ON a.id = b.userId
        LEFT JOIN transaction_details as c ON a.id = c.userId
        WHERE a.id = '".auth()->user()->id."' AND b.is_paid = 1
        GROUP BY a.id
        ");

        if($userBal != ""){
            $txnDtls = new TransactionDetails;
            $txnDtls->userId = auth()->user()->id;
            $txnDtls->merchId = session()->get('merchId');
            $txnDtls->transId = session()->get('txnid');
            $txnDtls->amount = session()->get('amount');
            $txnDtls->refCode = session()->get('param1');
            $txnDtls->transEmail = session()->get('param2');
            $txnDtls->procId = session()->get('procid');
            $txnDtls->deleted = 0;
            $txnDtls->save();
            $messages = "Successfully Saved!";
            $success[] = $messages;
        }else{
            $messages = "An occured error, Please try again";
            $success[] = $messages;
        }

        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }
}
