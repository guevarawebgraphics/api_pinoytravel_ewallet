<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use DateTime;
use App\Models\UserBalance;

class ResellerUnpaid extends Controller
{
    public function index(){
        $userBal = UserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->take(1)
        ->get();
        return view('pages.reseller.unpaid')->with('userBal', $userBal); 
    }

    public function getUnpaidReseller(){
        $unpaid = DB::connection('mysql')->select("SELECT * FROM top_up_history WHERE userId = '".auth()->user()->id."' AND is_paid = 0
        ORDER BY created_at DESC");

        $data = "";
        $counter = 1;
        if(count($unpaid) > 0){
            foreach($unpaid as $field){
                $data .= '
                <tr class="">
                    <td>'.$field->txnid.'</td>
                    <td>'.$field->refCode.'</td>
                    <td>₱'.number_format((float)$field->amount, 2, '.', ',').'</td>
                    <td>'.$field->procId.'</td>
                    <td>'.date("F d Y - h:i a",strtotime($field->created_at)).'</td>
                </tr>
                ';
                $counter++;
            }
        }
        echo $data;
    }
}
