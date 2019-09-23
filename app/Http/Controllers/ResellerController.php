<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//Include User Model
use App\User;
use App\Models\TopUpHistory;
use DB;
use App\Models\UserBalance;
use App\Models\ViewTotalUserBalance;
use App\Models\Users;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $resellers = ViewTotalUserBalance::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        // ->paginate(20);
        ->get();


        $wallet_balance = UserBalance::orderBy('created_at','desc')
        ->take(1)
        ->get();

        // return view('pages.reseller.create');
        // return view('pages.reseller.create', compact('resellers'));     x        
        return view('pages.admin.create', compact('resellers'))->with('walletBal',$wallet_balance);             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(Request $request)
    {
        $messages = [
            'Contact.regex' => 'This is not a valid PH phone number',
            'Name.regex' => 'This is not a valid name',
        ];
        $this->validate($request, [
            'Name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:70',
            'Email' => 'required|email|unique:users,email|max:70',
            'Address' => 'required',
            'Contact' => array(
                        'required',
                        'regex:/^(09|\+639)\d{9}$/'),
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'min:8'
        ], $messages);
        // $validator = \Validator::make($request->all(), [
        //     'Name' => 'required',
        //     'Email' => 'required',
        //     'Address' => 'required',
        //     'Contact' => 'required'
        //     ]); 
        // return 123;
        
        // return redirect('/dashboard/1')->with('error', 'Please Fill the fields correctly');
        
        // if ($validator->fails()) {
        //     return redirect('/dashboard/1')           
        //     // ->withErrors($arrayOfErrorMsgs);
        //     ->with('error', 'Please Fill Up Fields Correctly');
            
        // }
        //MASS ASSIGNMENT NOT WORKING WITH CREATED_AT AND UPDATED_AT ON DB
        // Reseller::create(request(['Name', 'Email', 'Address', 'Contact']));

        $user = new User;
        // dd($user);
        $user->name = ucwords($request->input('Name'));
        $user->email = $request->input('Email');
        $user->password = Hash::make($request->input('password'));
        $user->address = ucwords($request->input('Address'));
        $user->contact_no = $request->input('Contact');
        $user->is_blocked = 0;
        $user->on_hold = 0;
        $user->wallet_bal = 0;
        $user->is_admin = 0;
        // $resellers->password = \Hash::make('*pass@csi');
        // $resellers->profile_pic = 'profile_pic';
        $user->save();

        // return 123;

        
        // return 123;
        // return redirect('pages.dashboard_1')->with('success', 'Reseller Created');
        // return redirect()->back()->with('message','Error Message Here');
        // return redirect('/reseller/create')->with('success', 'Reseller Created');
        return redirect('/admin/create/reseller')->with('success', 'Reseller Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $reseller)
    {
        
        $resellers = ViewTotalUserBalance::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        // ->paginate(20);
        ->get();

        $walletBal = UserBalance::orderBy('created_at','desc')
         ->where('userId','=',$reseller->id)
         ->take(1)
         ->get();


        return view('pages.admin.viewform', compact('reseller','resellers','walletBal'));
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $reseller)
    {
        // $resellers = Reseller::findOrFail($id);
        // echo $resellers; die;
        // return $resellers;
        //USED
        //  return view('pages.reseller.editform', compact('reseller'));
         //TEST
         $resellers = ViewTotalUserBalance::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        ->paginate(20);

         $walletBal = UserBalance::orderBy('created_at','desc')
         ->where('userId','=',$reseller->id)
         ->take(1)
         ->get();
        
         return view('pages.admin.editform', compact('reseller','resellers','walletBal'));
        //  return view('testing.test2', compact('reseller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $reseller)
    {
        //EDIT (1) = Edit Reseller Information        
        //EDIT (2) = Delete(Block Reseller)
        //EDIT (3) = Hold Reseller
        //EDIT (4) = Unhold? Reseller haha
        
        //CUSTOM MESSAGE FOR CONTACT VALIDATION
        $messages = [
            'Contact.regex' => 'Please enter a valid PH phone number',
            'Name.regex' => 'This is not a valid name',
        ];

        //GET HIDDEN FORM INPUT NAMED EDIT
        $edit = $request->input('Edit'); 
        // echo $edit; die;

        if ($edit == 1)
        {
            // $resellers = Reseller::find($id);
            $this->validate($request, [
                'Name' => 'required|regex:/^[\pL\s\-\.]+$/u|min:3|max:70',   
                'Email' => 'required|email',
                'Address' => 'required',
                'Contact' => array(
                    'required',
                    'regex:/^(09|\+639)\d{9}$/'),
                'password' => 'min:8|confirmed|nullable',
                'password_confirmation' => 'min:8|nullable'         
            ], $messages);
            
            // return 123;
            // return redirect('/dashboard/1')->with('success', 'Reseller Edited');
            // $resellers = Reseller::find($id);
            // dd('hello');
            // echo $request->input('name');die;
            $reseller->name = $request->input('Name');
            $reseller->email = $request->input('Email');
            if(!$request->input('password') == ''){$reseller->password = Hash::make($request->input('password'));}
            $reseller->address = $request->input('Address');
            $reseller->contact_no = $request->input('Contact');          
            // $resellers->password = \Hash::make($request->input('Password'));
            // $resellers->profile_pic = 'profile_pic';
            // echo $resellers->name; die;
            $reseller->save();
            // return 123;
            return redirect('/admin/edit/reseller/'.$reseller->id)->with('success', 'Reseller Updated');
        }
        else if($edit == 2)
        {
            // $resellers = Reseller::findOrFail($id);
            $reseller->is_blocked = 1;
            $reseller->deleted = 1;
            // echo $resellers; die;
            //DELETE (Will Block Reseller Account)
            $reseller->save();
            return back()->with('error', 'Reseller '. $reseller->name. ' Deleted');
            // return redirect('reseller/delete')->with('error', 'Reseller Deleted');

        }
        else if($edit == 3)
        {
            // $resellers = Reseller::find($id);
            $reseller->on_hold = 1;
            // echo $resellers; die;
            //DELETE (Will Block Reseller Account)
            $reseller->save();
            return back()->with('hold', 'Reseller ' . $reseller->name .' On Hold');
            // return redirect('/reseller/hold')->with('error', 'Reseller ' . $reseller->name .' On Hold');

        }    
        else if($edit == 4)
        {
            // $resellers = Reseller::findOrFail($id);
            $reseller->on_hold = 0;
            // echo $resellers; die;
            //DELETE (Will Block Reseller Account)
            $reseller->save();
            return back()->with('hold', 'Reseller ' . $reseller->name .' is active');
            // return redirect('/reseller/hold')->with('error', 'Reseller ' . $reseller->name .' is active');

        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $reseller)
    {
        // $resellers = Reseller::findOrFail($id);
        //must not delete users unless needed
        //uncomment to delete
        // $reseller->delete();
        return redirect('reseller/delete')->with('success', 'Reseller Deleted');
    }

    //Standard View For All Resellers
    public function all(User $resellers)
    {
        //Use the model of reseller to get all the data of the reseller table
        // $resellers = Reseller::all();
        // $resellers = Reseller::orderBy('name', 'desc')->paginate(1);
        $searched = 0;
        // $reseller = Reseller::orderBy('created_at', 'desc')
        $resellers = ViewTotalUserBalance::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        // ->paginate(20);
        ->get();

        $walletBal = UserBalance::orderBy('created_at','DESC')
        ->get();
        
        return view('pages.admin.view', compact('resellers', 'searched','walletBal'));    
    }
    //View on Edit
    public function all_edit()
    {
        //Use the model of reseller to get all the data of the reseller table
        // $resellers = Reseller::all();
        // $resellers = Reseller::orderBy('name', 'desc')->paginate(1);
        $reseller = Reseller::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')            
        ->paginate(20);
        return view('pages.reseller.edit', compact('reseller'));    
    }
    public function all_delete()
    {
        $reseller = Reseller::orderBy('created_at', 'desc')->where('is_blocked', '0')->paginate(20);
        // return view('pages.viewRacct')->with('resellers', $resellers);
        // return $resellers;
        return view('pages.reseller.delete', compact('reseller')); 

    }
    public function all_hold()
    {
        $reseller = Reseller::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')            
        ->paginate(20);
        return view('pages.reseller.hold', compact('reseller')); 
    }
    public function wallet()
    {   
        $searched = 0;
        //from User to ViewTotalUserBalance
        $resellers = ViewTotalUserBalance::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        ->paginate(20);
        
        return view('pages.admin.wallet', compact('resellers', 'searched'));   
        // return Reseller::where('name', 'Jon Snow')->get(); 
    }
    public function testall()
    {
        $reseller = Reseller::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')            
        ->paginate(20);
        return view('testing.test1', compact('reseller'));   
    }

    public function search(Request $request)
    {
        // echo "sad"; die;
        // $search = $request->input('search');
        // $reseller = Reseller::orderBy('created_at', 'desc')
        // ->where('name', 'like', '%'.$search.'%')
        // ->paginate(20);
        // return view('testing.test1', compact('reseller'));
        // dd('SAD');
        $search = $request->input('Search');
        if($search == "")
            {$searched = 0;}
        else
            {$searched = 1;}
                        
        // dd($search);
        // $resellers = User::orderBy('created_at', 'desc')
        // ->where('Name', 'like', '%'.$search.'%')
        // ->where('is_admin', 0)
        // ->paginate(20);

        //from User to ViewTotalUserBalance
        $resellers = ViewTotalUserBalance::orderBy('created_at', 'desc')
        ->where('name', 'like', '%'.$search.'%')
        ->where('is_admin', 0)
        ->paginate(20);

        $wallet_balance = UserBalance::orderBy('created_at','desc')
        ->take(1)
        ->get();


        //CHECK IF THE ADMIN IS SEARCHING IN THE WALLET PAGE OR NOT
        if($request->input('wallet_search') == 1){            
            return view('pages.admin.wallet', compact('resellers', 'searched'))->with('walletBal',$wallet_balance);         
            
        } else            
            return view('pages.admin.view', compact('resellers', 'searched'))->with('walletBal',$wallet_balance);         
        

    }


    //NEW ADDITIONS
    public function reservation()
    {
        // return 'this is reservation method from reseller controller';
        $userBal = UserBalance::where('userId', auth()->user()->id)
                                ->orderBy('created_at','desc')
                                ->take(1)
                                ->get();
        return view('pages.reseller.reservation')->with('userBal', $userBal);
    }
    public function commission()
    {
        //return 'this is commission method in reseller controller';
        $userBal = UserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->take(1)
        ->get();
        return view('pages.reseller.commission')->with('userBal', $userBal);
    }
    public function transactions()
    {
        $userBal = UserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->take(1)
        ->get();
        return view('pages.reseller.transactions')->with('userBal', $userBal);       
    }


    //192.168.0.18/pinoytravel.com.ph/booking/sample
    public function paymentStatus(Request $request)
    {
        $paymentAmount = $request->input('paymentAmount');
        // $id = $this->input->post('id');
        // $name = $this->input->post('name');

        // echo '{"status":"true", "User Details":"'.$id. " ".$name.'"}';
        echo '{"status":"true", "User Details":'.$paymentAmount .'}';
    }
    public function topup(User $reseller)
    {
        if(auth()->user()->on_hold == 0)
        {   
            //API RESPONSE FOR PROCESSORS
            // $procType1url = file_get_contents("https://www.pigglywiggly.com.ph/api/v1/dragonpay/processors?type=1");
            // $procType2url = file_get_contents("https://www.pigglywiggly.com.ph/api/v1/dragonpay/processors?type=2");
            // $procType4url = file_get_contents("https://www.pigglywiggly.com.ph/api/v1/dragonpay/processors?type=4");
            $procType1url = file_get_contents(env('APP_PROC1'));
            $procType2url = file_get_contents(env('APP_PROC2'));
            $procType4url = file_get_contents(env('APP_PROC4'));
            
            //TO FETCH RESPONSE (ON VIEW)
            $responseProc1 = json_decode($procType1url);
            $responseProc2 = json_decode($procType2url);
            $responseProc4 = json_decode($procType4url);

            // foreach($responseProc1 as $obj){
            //     echo $obj->longName;                     
            //  }
            //  die;            

            //dd($responseProc1);
            // foreach($responseProc1 as $response){
            //     $longName = $response['longName'];
            //     echo $longName;
            // }
            
            // $response = $this->checkoutDragonpay($txnid, $type ,$amount, "Pinoytravel reservation for transaction with refno: ".$description, $email, $record->ReferenceCode, $email,$clientip, $agent);
            // private function checkoutDragonpay($txnid,$procid, $amount, $description, $email, $param1,$param2, $ip_address, $agent){

            //COMPACT WILL PASS VARIABLES TO THE VIEW
            $userBal = UserBalance::where('userId', auth()->user()->id)
            ->orderBy('created_at','desc')
            ->take(1)
            ->get();
            return view('pages.reseller.topup', compact('reseller', 'responseProc1', 'responseProc2', 'responseProc4'))->with('userBal', $userBal); 
        }
        else
        {
            return redirect('/');
        }
    }
    // public function checkoutDragonpay($transactionId, $processorId, $amount, $description, $email, $referenceCode)
    // public function checkoutDragonpay(Request $request, User $reseller, $processorId, $amount, $description, $email)
    public function checkoutDragonpay(Request $request)
    {
        // $userID = \Auth::user()->id;

        //GET CURRENT USER INFO
        $resellerName = \Auth::user()->name;
        $resellerEmail = \Auth::user()->email;
        //GET VALUE FROM REQUEST
        $paymentAmount = $request->input('paymentAmount');
        $processorId1 = $request->input('selectProc1');
        $processorId2 = $request->input('selectProc2');
        $processorId3 = $request->input('selectProc4');
                //CUSTOM MESSAGE FOR CONTACT VALIDATION
                $messages = [
                    'paymentAmount.digits_between' => 'Topup amount must be between ₱50.00 to ₱10,000.00 only',
                    'Name.regex' => 'This is not a valid name',
                    'paymentAmountCustom.required' => 'Topup amount must be between ₱50.00 to ₱10,000.00 only',
                    'paymentAmountCustom.lte' => 'Topup amount must be between ₱50.00 to ₱10,000.00 only',
                    'paymentAmountCustom.gte' => 'Topup amount must be between ₱50.00 to ₱10,000.00 only',
                    'paymentAmountCustom.numeric' => 'Topup amount must be between ₱50.00 to ₱10,000.00 only',
                ];
        if($paymentAmount == "custom"){
            $this->validate($request, [
                    'paymentAmountCustom' => 'required|gte:50|lte:10000|numeric',
                    
                ], $messages);
        }
                // $this->validate($request, [
                    // 'paymentAmount' => 'required|min:50|max:10000|numeric',
                    // 'paymentAmount' => 'required|digits_between:50,10000|min:50|max:10000',
                // ], $messages);
        //GENERATE TRANSACTION ID & REFERENCE CODE
        // $transactionId = 'TOPID_'.strtoupper(str_random(12));
        // $referenceCode = 'TOPREF_'.strtoupper(str_random(8));
        $transactionId = strtoupper(str_random(12));
        $referenceCode = strtoupper(str_random(8));
        
        // DETERMINE WHAT PROCESSOR IS SELECTED ON TOPUP
        // SET $selectedProcessorId the PROCESSOR ID

        if ($processorId1 == '')
        {
           if($processorId2 == '')
           {
               if($processorId3 == '')
               {
                    return $paymentAmount;
               } 
               else
                {
                    $selectedProcessorId = $processorId3; 
                }
           } 
           else 
           {
                $selectedProcessorId = $processorId2;
           }
        } 
        else 
        {
            $selectedProcessorId = $processorId1;
        }

        //description
        $description = 'Payment for '.$referenceCode;
        // dd($description = '₱ '. $paymentAmount.' payment for ' .$referenceCode);
        // $transactionId = strtoupper(random_string('alnum', 12));
        // $referenceCode = strtoupper(random_string('alnum', 8));
        // return $request->input('paymentAmount');
        // return $paymentAmount. ' '. $selectedProcessorId . ' ' . $transactionId . ' '.$referenceCode . ' ' . $resellerName. ' ' .$resellerEmail . ' ' . $description;
        
        
        $digest_str = "PINOYTRAVEL".':'.$transactionId.':'.number_format((float)$paymentAmount, 2, '.', '').':PHP:Payment for '.$referenceCode.':'.$resellerEmail.':'.env('APP_DRAGONPAY_SECRET_KEY');
        // dd($digest_str);
        $sha1digest = sha1($digest_str);
        $urlString = env("APP_DRAGONPAY_URL");
        //https://test.dragonpay.ph/Bank/Gateway.aspx?
        $urlParam = "merchantid=".env("APP_DRAGONPAY_MERCHANT_ID");
        // $urlParam .= "&txnid=".$transactionId."&amount=".$paymentAmount."&ccy=PHP&description=".$description."&email=".$resellerEmail."&digest=".$sha1digest;
        $urlParam .= "&txnid=".$transactionId."&amount=".number_format((float)$paymentAmount, 2, '.', '')."&ccy=PHP&description=Payment for ".$referenceCode."&email=".$resellerEmail."&digest=".$sha1digest;
        $urlParam .= "&param1="."EW-".$referenceCode."&param2=".$resellerEmail."&procid=".$selectedProcessorId;
    
        $top_up = new TopUpHistory;
        $top_up->userId = auth()->user()->id;
        $top_up->txnid = $transactionId;
        $top_up->dpRefNo = NULL;
        $top_up->status = NULL;
        $top_up->dpProcID = NULL;
        $top_up->refCode = $referenceCode;
        $top_up->email = $resellerEmail;
        $top_up->procId = $selectedProcessorId;
        $top_up->amount = $paymentAmount;
        $top_up->is_paid = 0;
        $top_up->save();

        // $output = ($urlString.($urlParam));
        // echo json_encode($output);

        //return $sha1digest;
        //WORKING URL FOR TRANSACTION
        // $urlTest = "https://test.dragonpay.ph/Pay.aspx?merchantid=PINOYTRAVEL&txnid=GP7Y26OREPK3&amount=290.00&ccy=PHP&description=Payment%20for%20GP7Y26OR&email=leo@csi.com&digest=58f6d150b7ff25ad104b143ef430765ca4393f58&param1=GP7Y26OR&param2=leo@csi.com&procid=BDRX";
        // /// END OF WORIKIN
        // $urlTest2 = "https://test.dragonpay.ph/Pay.aspx?merchantid=PINOYTRAVEL&txnid=GP7Y26OREPK3&amount=290.00&ccy=PHP&description=Payment%20for%20GP7Y26OR&email=leo@csi.com&digest=58f6d150b7ff25ad104b143ef430765ca4393f58&param1=GP7Y26OR&param2=leo@csi.com&procid=BDRX";
        // return $sha1digest; //758f3c09df2b2eddb37bc603184f0a5539ecaf70
       // $urlTest = "https://test.dragonpay.ph/Bank/Gateway.aspx?procid=BOG&refno=WW4HM3B2&amount=380.00&ccy=PHP&description=Payment+for+3RBTXJQP&billerId=1678005430%7cDragonpay+Corporation%7cPeso+Checking&email=sample%40sample.com&digest=e0f630e75a1e5fec33c1522184c9e8236431a2f1&expiry=7%2f3%2f19+11%3a18&merchantid=PINOYTRAVEL";
        
       //Old post method of DragonPay
       return redirect($urlString.($urlParam));

        //return redirect($urlTest);
    }

    public function getTopup(){
        $TopUpHistory = DB::connection('mysql')->select("SELECT * FROM top_up_history WHERE userId = '".auth()->user()->id."' AND is_paid = 1 ORDER BY updated_at DESC");

        $data = "";
        
        $counter = 1;
        if(count($TopUpHistory) > 0){
            foreach($TopUpHistory as $field){
                $data .='
                        <tr class="">
                            <td> '.$field->txnid.'</td>                        
                            <td> '.$field->refCode.'</td>
                            <td> '.$field->procId.'</td>
                            <td> ₱ '.number_format((float)$field->amount, 2, '.', ',').'</td>
                            <td>'.date("F d Y - h:i a",strtotime($field->updated_at)).'</td>
                        </tr>
                        ';
                $counter++;
            }
        }
        echo $data;
    }

    public function modifyVal(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();
 
        $viewBal = DB::connection('mysql')->select("SELECT * FROM view_total_userbalance WHERE userId = '".$request->userId."'");


        if($request->proceed != "TRUE"){

            $messages = "Problem occurred please contact webmaster.";
            $error[] = $messages;

        }else if(count($viewBal) > 0 && number_format((float)$viewBal[0]->total_balance, 2, '.', ',') == 0.00 && ($request->radio == "deduct")){

            $messages = "Invalid deduction already ₱0.00 balance. ";
            $error[] = $messages;

        }else if(empty($viewBal) && ($request->radio == "deduct")){

            $messages = "Invalid deduction already ₱0.00 balance..";
            $error[] = $messages;

        }else if($request->amount == ""){

            $messages = "Amount is required!";
            $error[] = $messages;

        }else if($request->radio == ""){

            $messages = "Please choose if add or Deduct to reseller account";
            $error[] = $messages;

        }else if($request->modifyPwd == ""){

            $messages = "Manage Account Balance password is required";
            $error[] = $messages;

        }else{

            if(Hash::check($request->modifyPwd, auth()->user()->password)){
                $messages = "Success!";
                $success[] = $messages;
            }else{
                $messages = "Manage Account Balance password is incorrect!";
                $error[] = $messages;
            }
            
        }

        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }

    public function modifybalance(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        if($request->proceed == "TRUE"){
            
            $amount = number_format((float)$request->amount, 2, '.', '');
            $userId = $request->userId;
            $total_userbalance = DB::connection('mysql')->select("SELECT * FROM total_userbalance WHERE userId = '".$userId."' ORDER BY created_at DESC LIMIT 1");

            if(!empty($total_userbalance[0]->userId)){
                if($request->radio == "add"){
                    $finalAmount = $amount + $total_userbalance[0]->total_balance;
                    $type = "ADD";
                }
                else if($request->radio == "deduct")
                {
                    $resAmount = $total_userbalance[0]->total_balance - $amount;
                    $type = "DEDUCT";
                    if($resAmount < 0){
                        $finalAmount = number_format((float)0, 2, '.', '');
                    }else{
                        $finalAmount = number_format((float)$resAmount, 2, '.', '');
                    }
                }
            }else{
                $finalAmount = number_format((float)$amount, 2, '.', '');
                $type = "ADD";
            }

            $ttl_userbal = new UserBalance;
            $ttl_userbal->userId = $userId;
            $ttl_userbal->total_balance = $finalAmount;
            $ttl_userbal->txnamount = $amount;
            $ttl_userbal->type = $type;
            $ttl_userbal->updated_by = auth()->user()->name;
            $ttl_userbal->created_at = now();
            $ttl_userbal->updated_at = now();
            $ttl_userbal->save();

            $messages = "Account Balance Successfully Updated!";
            $success[] = $messages;

        }else{

            $messages = "Error...";
            $error[] = $messages;
        }

        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }

    public function create_admin(){
        return view('pages.admin.create_admin');
    }

    public function newAdminVal(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        $validateEmail = DB::connection('mysql')->select("SELECT * FROM users WHERE email = '".$request->email."'");

        if($request->proceed =="TRUE"){
            if($request->name == ""){
                $messages = "Name is Required!";
                $error[] = $messages;
            }
            else if($request->email == ""){
                $messages = "Email is Required!";
                $error[] = $messages;
            }
            else if($request->password == "") {
                $messages = "Password is Required!";
                $error[] = $messages;
            }
            else if($request->address == "") {
                $messages = "Address is Required!";
                $error[] = $messages;
            }
            else if($request->contact == "") {
                $messages = "Contact is Required!";
                $error[] = $messages;
            }         
            else if (count($validateEmail) > 0){
                $messages = "Email already exists!";
                $error[] = $messages;
            }
            else {
                $messages = "Success!";
                $success[] = $messages;
            }
        }
        else{
            $messages = "Validation error..";
            $error[] = $messages;
        }

        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }

    public function newAdmin(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();
        
        if($request->proceed == "TRUE"){

            $Users = new Users;
            $Users->name = $request->name;
            $Users->email = $request->email;
            $Users->password = Hash::make($request->password);
            $Users->address = $request->address;
            $Users->contact_no = $request->contact;
            $Users->is_blocked = 0;
            $Users->on_hold = 0;
            $Users->wallet_bal = 0.00;
            $Users->is_admin = 1;
            $Users->deleted = 0;
            $Users->created_at = now();
            $Users->updated_at = now();
            $Users->save();

            $messages = "Admin account successfully created!";
            $success[] = $messages;

        }
        else
        {
            $messages = "Email already exists..";
            $error[] = $messages;
        }
        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }

    public function getEPassbook(Request $request){

        //switch to total_userbalance if view_passbook is inaccurate
        $passbook = DB::connection('mysql')->select("SELECT * FROM view_passbook WHERE userId = '".$request->userId."' ORDER BY created_at DESC");
        $userBal = DB::connection('mysql')->select("SELECT * FROM view_total_userbalance WHERE userId = '".$request->userId."'");
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
                    $type = "Transaction History <em>(booked)</em>";
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
                    $type = "Top Up History <em>(paid)</em>";
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
