<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use DateTime;
use App\Models\UserBalance;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index(){
        $userBal = UserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->take(1)
        ->get();
        return view('pages.reseller.profile')->with('userBal', $userBal);     
    }
    public function changePwdVal(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        $accPassword = auth()->user()->password;

        if($request->curPwd == ""){
            $messages = "Current Password is required!";
            $error[] = $messages;
        }
        else if($request->proceed != "TRUE"){
            $messages = "Parameter proceed is null!";
            $error[] = $messages;
        }
        else if($request->newPassword == ""){
            $messages = "New Password is required!";
            $error[] = $messages;
        }
        else if($request->cnfrmPassword == ""){
            $messages = "Confirm password is required!";
            $error[] = $messages;
        }
        else if($request->cnfrmPassword != $request->newPassword){
            $messages = "Password didn't match!";
            $error[] = $messages;
        }
        else{
            if(Hash::check($request->curPwd, $accPassword)){
                $messages = "Successfully Validated";
                $success[] = $messages;
            }else{
                $messages = "Please make sure your current password is correct!";
                $error[] = $messages;
            }
        }


        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }

    public function changePwd(Request $request){
        $message = "";
        $output = array();
        $error = array();
        $success = array();

        $accPassword = auth()->user()->password;
        $userId = auth()->user()->id;

        if(Hash::check($request->curPwd, $accPassword)){
            DB::table('users')
            ->where('id', $userId)
            ->update([
            'password'=>Hash::make($request->newPassword),
            'updated_at' => now()
            ]);


            $messages = "Successfully Updated!";
            $success[] = $messages;
        }else{
            $messages = "Incorrect current password!";
            $error[] = $messages;
        }

        $output = array(
            'error'=>$error,
            'success'=>$success
        );

        echo json_encode($output);
    }
}
