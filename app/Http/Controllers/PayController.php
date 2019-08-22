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
        if(session()->get('merchId') == "")
        {
            abort(404);
        }
        else
        {
            return view('pay');
        }
    }

    public function getReceipt(Request $request)
    {
        $userBal = DB::connection('mysql')->select("
        SELECT a.id as userId, 
            (select sum(tuhh.amount) from top_up_history as tuhh where tuhh.userId = a.id AND tuhh.is_paid = 1) as total_topup,
            (select sum(trr.amount) from transaction_details as trr where trr.userId = a.id) as total_spent,
            ((select sum(tuh.amount) from top_up_history as tuh where tuh.userId = a.id AND tuh.is_paid = 1)
            -
            (select sum(tr.amount) from transaction_details as tr where tr.userId = a.id)) as total_balance
            
        FROM users AS a
        LEFT JOIN  top_up_history AS b ON a.id = b.userId
        LEFT JOIN transaction_details as c ON a.id = c.userId
        WHERE a.id = '".auth()->user()->id."' AND b.is_paid = 1
        GROUP BY a.id
        ");

        if(!empty($userBal)){
            $currentBalance = number_format((float)$userBal[0]->total_balance, 2, '.', ',');
        }else{
            $currentBalance = number_format((float)0, 2, '.', ',');
        }

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
            <b>Balance:&nbsp;<span>₱'.$currentBalance.'</span></b>
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
                <b>Current Balance:  </b>'.$currentBalance.'<br>
                <b>Total Amount to Pay:  </b>'.session()->get('amount').'<br>
            </div>
            <div class="" style="margin-top:2em;">
                <p><input type="checkbox" id="chkAgreement" name="chkAgreement" value="chkAgreement"> I declare that I have read and accepted<br>The <a href="https://www.pinoytravel.com.ph/terms">PinoyTravel-Ewallet Policies</a> and my payment method rights.</p>
            </div>
        </div>
        ';
        echo $data;

    }

    public function payVal(Request $request)
    {
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        $transId = session()->get('txnid');
        $refCode = session()->get('param1');
        $txnDtls = DB::connection('mysql')->select("SELECT * FROM transaction_details WHERE transId = '".$transId."' AND refCode = '".$refCode."'");

        $userBal = DB::connection('mysql')->select("
        SELECT a.id as userId, 
            (select sum(tuhh.amount) from top_up_history as tuhh where tuhh.userId = a.id AND tuhh.is_paid = 1) as total_topup,
            (select sum(trr.amount) from transaction_details as trr where trr.userId = a.id) as total_spent,
            ((select sum(tuh.amount) from top_up_history as tuh where tuh.userId = a.id AND tuh.is_paid = 1)
            -
            (select sum(tr.amount) from transaction_details as tr where tr.userId = a.id)) as total_balance
            
        FROM users AS a
        LEFT JOIN  top_up_history AS b ON a.id = b.userId
        LEFT JOIN transaction_details as c ON a.id = c.userId
        WHERE a.id = '".auth()->user()->id."' AND b.is_paid = 1
        GROUP BY a.id
        ");

        if(!empty($userBal)){
            $totalBalance = $userBal[0]->total_balance;
        }else{
            $totalBalance = 0.00;
        }

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
        // else if(!empty($txnDtls))
        // {
        //     $messages = "Transaction ID and Ref. Code already paid!";
        //     $error[] = $messages;
        // }
        else if($totalBalance < session()->get('amount')){
            $messages = "You don't have enough load to perform your payment.";
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

    public function payNow(Request $request)
    {
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        $userBal = DB::connection('mysql')->select("
        SELECT a.id as userId, 
            (select sum(tuhh.amount) from top_up_history as tuhh where tuhh.userId = a.id AND tuhh.is_paid = 1) as total_topup,
            (select sum(trr.amount) from transaction_details as trr where trr.userId = a.id) as total_spent,
            ((select sum(tuh.amount) from top_up_history as tuh where tuh.userId = a.id AND tuh.is_paid = 1)
            -
            (select sum(tr.amount) from transaction_details as tr where tr.userId = a.id)) as total_balance
            
        FROM users AS a
        LEFT JOIN  top_up_history AS b ON a.id = b.userId
        LEFT JOIN transaction_details as c ON a.id = c.userId
        WHERE a.id = '".auth()->user()->id."' AND b.is_paid = 1
        GROUP BY a.id
        ");

        if(count($userBal)){
        // if($userBal != ""){
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

            //Code for deleting session
            //session()->forget('');
            
            //Uncomment if you want toast for paid feedback
            // session()->put('tnxSuccess','Successfully paid!');

            //Comment if you want toast for paid feedback
            session()->forget('merchId');
            session()->forget('txnid');
            session()->forget('amount');
            session()->forget('param1');
            session()->forget('param2');
            session()->forget('procid');

            $messages = "Reference Code: ".session()->get('param1')." Successfully paid! ".session()->get('amount')." deducted to your wallet.";
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

    public function cancelEwallet(Request $request)
    {
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        if($request->cancelEwallet == "TRUE"){
            session()->forget('merchId');
            session()->forget('txnid');
            session()->forget('amount');
            session()->forget('param1');
            session()->forget('param2');
            session()->forget('procid');

            $messages = "Redirecting..";
            $success[] = $messages;
        }else{
            $messages = "Please select Cancel and return to Reseller Page";
            $error[] = $messages;
        }

        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }
}
