<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use DateTime;
use App\Models\UserBalance;

class ResellerPassbook extends Controller
{
    public function index(){
        $userBal = UserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->take(1)
        ->get();
        return view('pages.reseller.epassbook')->with('userBal', $userBal); 
    }
    public function getEPassbookReseller(){

        //switch to total_userbalance if view_passbook is inaccurate
        $passbook = DB::connection('mysql')->select("SELECT * FROM view_passbook WHERE userId = '".auth()->user()->id."' ORDER BY created_at DESC");
        $userBal = DB::connection('mysql')->select("SELECT * FROM view_total_userbalance WHERE userId = '".auth()->user()->id."'");
        $data = "";
        $counter = 1;
        if(count($passbook) > 0){
            $data .= '<tr class="is-selected">
                        <th><em><b style="color: #000000;">Closing Balance</b></em></th>
                        <th></th>
                        <th></th>
                        <th><b style="color: #000000;">₱'.number_format((float)$userBal[0]->total_balance, 2, '.', ',').'</b></th>
                    </tr>';
            foreach($passbook as $field){

                if($field->type == "ADD"){
                    $type = "Account Balance added by: ".$field->updated_by;
                    $debit = number_format((float)$field->txnamount, 2, '.', ',');
                    $credit = "";
                    $style = 'style="border-left:13px solid hsl(217, 71%, 53%);"';
                    $article = "is-link";
                    $title = "";
                    $content = "";
                }
                else if($field->type == "DEDUCT"){
                    $type = "Account Balance deducted by: ".$field->updated_by;
                    $debit = "";
                    $credit = number_format((float)$field->txnamount, 2, '.', ',');
                    $style = 'style="border-left:13px solid hsl(48, 100%, 67%);"';
                    $article = "is-warning";
                    $title = "";
                    $content = "";
                }
                else if($field->type == "TXN"){
                    $type = "Transaction History";
                    $debit = "";
                    $credit = number_format((float)$field->txnamount, 2, '.', ',');
                    $style = 'style="border-left:13px solid hsl(348, 100%, 61%);"';
                    // $article = "is-danger";
                    $article = "is-dark";
                    $title = "Booking Details";
                    $content = '
                    <b>Merchant ID : </b>'.$field->txmerchId.'<br>
                    <b>Transaction ID : </b>'.$field->txtransId.'<br>
                    <b>Booking Amount : </b>'.$field->txbookingAmount.'<br>
                    <b>Reference Code : </b>'.$field->txrefCode.'<br>
                    <b>Email : </b>'.$field->txtransEmail.'<br>
                    <b>Proc ID : </b>'.$field->txprocId.'<br>
                    <b>Booked Date : </b>'.date("F d Y - h:i a",strtotime($field->txbookingCreated)).'<br>
                    ';
                }
                else if($field->type == "TOPUP"){
                    $type = "Top Up History";
                    $debit = number_format((float)$field->txnamount, 2, '.', ',');
                    $credit = "";
                    $style = 'style="border-left:13px solid hsl(141, 71%, 48%);"';
                    // $article = "is-success";
                    $article = "is-dark";
                    $title = "Account Top Up Details";
                    $content = '
                    <b>Transaction ID : </b>'.$field->tptxnid.'<br>
                    <b>Reference No. : </b>'.$field->tpdpRefNo.'<br>
                    <b>Status : </b>'.$field->tpstatus.'<br>
                    <b>DP Proc ID : </b>'.$field->tpdpProcID.'<br>
                    <b>Reference Code : </b>'.$field->tprefCode.'<br>
                    <b>Email : </b>'.$field->tpemail.'<br>
                    <b>Proc ID : </b>'.$field->tpprocId.'<br>
                    <b>Top Up Amount : </b>₱'.number_format((float)$field->tpamount, 2, '.', ',').'<br>
                    <b>Top Up Date : </b>'.date("F d Y - h:i a",strtotime($field->tpup_created)).'<br>
                    ';
                }
                else{
                    $type = "OTHER";
                    $debit = "";
                    $credit = "";
                    $style = 'style="border-left:13px solid #000000;"';
                    $article = "is-dark";
                    $title = "";
                    $content = "";
                }

                if($field->type == "TXN"){
                    $rowId = $field->txhistoryId;
                    $rowType = $field->type;
                    $rowDivID = $field->type.$field->txhistoryId;
                }else if($field->type =="TOPUP"){
                    $rowId = $field->tophistoryId;
                    $rowType = $field->type;
                    $rowDivID = $field->type.$field->tophistoryId;
                }
                else{
                    $rowId = "NONE";
                    $rowType = "NONE";
                    $rowDivID = "NONE";
                }
                
                $data .='
                        <tr class="row" '.$style.' id="row'.$rowId.'" onClick="pbDiv(\''.$rowDivID.'\','.$field->id.')" data-id="'.$field->id.'">
                            <td>
                            '.date("F d Y - h:i a",strtotime($field->created_at)).'<br>
                            <small>'.$type.'</small>

                            <article class="message '.$article.'" id="'.$rowDivID.'" style="display:none; margin-top: 1.5em;">
                            <div class="message-header">
                                <p>'.$title.'</p>
                                <button class="delete" aria-label="delete"></button>
                            </div>
                            <div class="message-body" id="articleBody">
                                '.$content.'
                            </div>
                            </article>

                            </td>
                            <td>'.$debit.'</td>
                            <td>'.$credit.'</td>
                            <td>'.number_format((float)$field->total_balance, 2, '.', ',').'</td>
                        </tr>
                        
                        ';
                $counter++;
            }
        }
        echo $data;
    }
}
