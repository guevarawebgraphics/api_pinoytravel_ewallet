<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Route;
use App\Models\top_up_history;
use App\Models\total_userbalance;


class AuthController extends Controller
{
    public function search_user(Request $request){
        //Code for getting the current date of Asia/Manila
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Manila


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");


        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {
            if($request->email != "")
            {
                $email = $request->email;
                $search_email_query = "SELECT id, name, email, created_at, deleted FROM `users` WHERE email = '".$email."'";
                $search_email = DB::connection('mysql')->select($search_email_query);
                
                if(!empty($search_email)){
                    return $search_email;
                }else{
                    return response(['status'=>'error','message'=>'No user found!']);
                }
                
            }
            else if($request->resellerID != "")
            {
                $reseller_id = $request->resellerID;
                $search_reseller_id_query = "SELECT id, name, email, created_at, deleted FROM `users` WHERE id = '".$reseller_id."'";
                $search_reseller_id = DB::connection('mysql')->select($search_reseller_id_query);
                
                if(!empty($search_reseller_id)){
                    return $search_reseller_id;
                }else{
                    return response(['status'=>'error','message'=>'No user found!']);
                }
            }
            else
            {
                return response(['status'=>'error','message'=>'Search for resellerID/email!']);
            }            
        }
    }

    public function top_up_history(Request $request)
    {
        //Code for getting the current date of Asia/Manila
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Manila


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");


        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {
            $validatedData = $request->validate([
                'userId'=>'required'
                ]);

            $userId = $request->userId;

            $top_up_query = "SELECT * FROM `top_up_history` WHERE userId = '".$userId."'";
            $top_up_history = DB::connection('mysql')->select($top_up_query);

            return $top_up_history;
        }
    }

    public function top_up_wallet(Request $request)
    {
        //Code for getting the current date of Asia/Taipei
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Taipei


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");

        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {

            $validatedData = $request->validate([
                'txnid'=>'required',
                'refno'=>'required',
                'status'=>'required',
                'procid'=>'required',
                'param1'=>'required',
                'param2'=>'required',
                'amount'=>'required'
            ]);

            $top_up = new top_up_history;
            $top_up->userId = Auth::user()->id;
            $top_up->txnid = $request->txnid;
            $top_up->dpRefNo = $request->refno;
            $top_up->status = $request->status;
            $top_up->dpProcID = $request->procid;
            $top_up->refCode = $request->param1;
            $top_up->email = $request->param2; 
            $top_up->procId = "DPAY";
            $top_up->amount = number_format((float)$request->amount, 2, '.', ',');
            $top_up->is_paid = 0;
            $top_up->save();

            return response(['status'=>'ok','message'=>'Ewallet Top Up waiting to be paid.']);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        
        $user = User::where('email',$request->email)->first();

        if(!$user)
        {
            return response(['status'=>'error','message'=>'Incorrect email/password!']);
        }
        else if($user->deleted == 1){
            return response(['status'=>'error','message'=>'This account is deleted!']);
        }
        else if(Hash::check($request->password, $user->password))
        {

            $http = new Client;
            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'E76r80LtfyMMPi7bUEAn8shiIkLmSoEXYQyzfIHW',
                'username' => $user->email,
                'password' => $request->password,
                'scope' => '',
                ],
            ]);
        
            return response(['data'=>json_decode((string) $response->getBody(), true),
                'status'=>'Success',
                'message'=>'Authenticated',
                'ResellerName'=>$user->name
            ]);
        
        }
        else
        {
            return response(['status'=>'error','message'=>'Incorrect email/password!']);
        }
    }

    public function register(Request $request)
    {
        //Code for getting the current date of Asia/Manila
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Manila


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");


        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {

            $validatedData = $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'address'=>'required',
                'contact'=>'required',
                'is_admin'=>'required'
            ]);

            $user_info_email = User::where('email',$request->email)->first();

            if(!empty($user_info_email))
            {
                return response(['status'=>'error','message'=>'email already exists!']);
            }
            else
            {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->address = $request->address;
                $user->contact = $request->contact;
                $user->is_blocked = 0;
                $user->on_hold = 0;
                $user->wallet_bal = 0.00;
                $user->is_admin = $request->is_admin;
                $user->deleted = 0;
                $user->save();
                return response(['status'=>'ok','message'=>'Reseller Succuessfully Registered!']);
            }
        }
    }

    public function logout(Request $request)
    {
        //Code for getting the current date of Asia/Manila
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Manila


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");


        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {
            $tokenArray = Auth::user()->token()->id;
            
            //Update revoke field to destroy specific token logged in by the user.
            DB::table('oauth_access_tokens')
            ->where('user_id', Auth::user()->id)
            ->update([
            'revoked' => true
            ]);



            return response(['status'=>'oK','message'=>'Successfully logout!']);
        }
    }

    public function update(Request $request)
    {

        //Code for getting the current date of Asia/Manila
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Manila


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");


        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {
            $validatedData = $request->validate([
                'email'=>'required'
            ]);
            
            $email = $request->email;
            $user_info = User::where('email',$email)->first();
            
            if(!empty($user_info)){
    
                if($request->name == ""){
                    $name = $user_info->name;
                }else{
                    $name = $request->name;
                }
    
                if($request->email == ""){
                    $email = $user_info->email;
                }else{
                    $email = $request->email;
                }
    
                if($request->password == ""){
                    $password = bcrypt($user_info->password);
                }else{
                    $password = bcrypt($request->password);
                }

                if($request->address == ""){
                    $address = $user_info->address;
                }else{
                    $address = $request->address;
                }

                if($request->contact == ""){
                    $contact = $user_info->contact;
                }else{
                    $contact = $request->contact;
                }

                if($request->is_blocked == ""){
                    $is_blocked = $user_info->is_blocked;
                }else{
                    $is_blocked = $request->is_blocked;
                }

                if($request->on_hold == ""){
                    $on_hold = $user_info->on_hold;
                }else{
                    $on_hold = $request->on_hold;
                }

                if($request->wallet_bal == ""){
                    $wallet_bal = $user_info->wallet_bal;
                }else{
                    $wallet_bal = $request->wallet_bal;
                }

                if($request->is_admin == ""){
                    $is_admin = $user_info->is_admin;
                }else{
                    $is_admin = $request->is_admin;
                }

                if($request->deleted == ""){
                    $deleted = $user_info->deleted;
                }else{
                    $deleted = $request->deleted;
                }

                DB::table('users')
                ->where('email', $request->email)
                ->update([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'is_blocked' => $is_blocked,
                'on_hold' => $on_hold,
                'wallet_bal' => $wallet_bal,
                'is_admin' => $is_admin,
                'deleted' => $deleted,
                ]);

                return response(['status'=>'oK','message'=>'Successfully Updated!','Reseller'=>$name]);
                
            }
            else
            {
                return response(['status'=>'error','message'=>'Reseller email not found!']);
            }
        }
    }

    public function delete(Request $request)
    {
        //Code for getting the current date of Asia/Manila
        date_default_timezone_set('Asia/Taipei');
        $todays_date = date("Y-m-d H:i:s");
        $today = strtotime($todays_date);
        $todayDate = date("Y-m-d H:i:s", $today); 
        //Code for getting the current date of Asia/Manila


        //This will identify if the active token is expired will automatically mark it as revoked = true
        $tokenArray = Auth::user()->token()->id;
        
        $expires_query = DB::connection('mysql')->select("SELECT * from oauth_access_tokens WHERE id = '".$tokenArray."' AND user_id = '".auth()->user()->id."' AND expires_at <= '".$todayDate."' AND revoked = '0'");


        if(!empty($expires_query))
        {
            DB::table('oauth_access_tokens')
            ->where('expires_at', '<=',$todayDate)
            ->update([
            'revoked' => true
            ]);
            
            return response(['status'=>'error','message'=>'Your Token is Expired!']);
        }
        else
        {
            $validatedData = $request->validate([
                'email'=>'required'
            ]);
            $email = $request->email;

            $user_info = User::where('email',$email)->first();

            if(!empty($user_info)){

                DB::table('users')
                ->where('email', $email)
                ->update([
                'deleted' => '1'
                ]);
                
                return response(['status'=>'oK','message'=>'Successfully Deleted!']);
            }else{
                return response(['status'=>'error','message'=>'Reseller email not found!']);
            }
            
        }
    }


    public function dragonpay(Request $request)
    {
            $validatedData = $request->validate([
                'txnid'=>'required',
                'refCode'=>'required',
                'refno'=>'required',
                'status'=>'required',
                'procid'=>'required',
                'secret_key'=>'required',
            ]);
            
            $txnid = $request->txnid;
            $refno = $request->refno;
            $status = $request->status;
            $procid = $request->procid;
            $refCode = $request->refCode;
            $secret_key = $request->secret_key;
            $top_up_info = DB::connection('mysql')->select("SELECT * from top_up_history WHERE txnid = '".$txnid."' AND refCode = '".$refCode."'");
            
            $userIdBal = $top_up_info[0]->userId;
            $userBal = DB::connection('mysql')->select("SELECT * from total_userbalance WHERE userId = '".$userIdBal."' ORDER BY created_at DESC LIMIT 1");

            if(!empty($top_up_info)){
    
                if(sha1("PINOYTRAVEL-EWALLET") != $secret_key){
                    return response(['status'=>'error','message'=>'secret key did not match']);
                }else{
                    if($top_up_info[0]->is_paid != 1){
                        DB::table('top_up_history')
                        ->where('txnid', $txnid)
                        ->where('refCode', $refCode)
                        ->update([
                        'dpRefNo'=>$refno,
                        'status'=>$status,
                        'dpProcID'=>$procid,
                        'is_paid' => '1',
                        'updated_at' => now()
                        ]);
                        
                        if(!empty($userBal))
                        {
                            $ttl_bal = $userBal[0]->total_balance;
                            $final_bal = $ttl_bal + $top_up_info[0]->amount;
                            $ttl_userbal = new total_userbalance;
                            $ttl_userbal->userId = $userIdBal;
                            $ttl_userbal->tophistoryId = $top_up_info[0]->id;
                            $ttl_userbal->total_balance = $final_bal;
                            $ttl_userbal->created_at = now();
                            $ttl_userbal->updated_at = now();
                            $ttl_userbal->save();
                        }
                        else
                        {
                            $ttl_userbal = new total_userbalance;
                            $ttl_userbal->userId = $userIdBal;
                            $ttl_userbal->tophistoryId = $top_up_info[0]->id;
                            $ttl_userbal->total_balance = $top_up_info[0]->amount;
                            $ttl_userbal->created_at = now();
                            $ttl_userbal->updated_at = now();
                            $ttl_userbal->save();
                        }
                        
                        
                        return response(['status'=>'oK','message'=>'Ewallet Balance Successfully Topped up!']);
                    }else{
                        
                        return response([
                        'status'=>'error',
                        'txnid'=>$txnid,
                        'refCode'=>$refCode,
                        'message'=>'tnxid and refCode already paid!'
                        ]);
                    }

                }
                
            }
            else
            {
                return response(['status'=>'error','message'=>'txnid/refCode not found!']);
            }
    }
}
