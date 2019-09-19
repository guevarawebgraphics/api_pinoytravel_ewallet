<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, User $user){
        if($user->is_blocked == 0){
            if($user->is_admin == 1){
                return  redirect('/admin/view/all');
            }
            else{
                if($user->on_hold == 0)
                {
                    $merchId = $request->post('merchId');
                    $txnid = $request->post('txnid');
                    $amount = $request->post('amount');
                    $param1 = $request->post('param1');
                    $param2 = $request->post('param2');
                    $procid = $request->post('procid');
                    $digest = $request->post('digest');
                    $secret_key = env("APP_EWALLET_SECRET_KEY");
                    $digest_str = $merchId.':'.$txnid.':'.number_format((float)$amount, 2, '.', ',').':PHP:Payment for '.$param1.':'.$param2.':'.$secret_key;
                    $sha1digest = sha1($digest_str); 

                    if($sha1digest == $digest){

                    $request->session()->put('merchId',$merchId);
                    $request->session()->put('txnid',$txnid);
                    $request->session()->put('amount',$amount);
                    $request->session()->put('param1',$param1);
                    $request->session()->put('param2',$param2);
                    $request->session()->put('procid',$procid);
                    $request->session()->put('digest',$digest);
                    $urlString = "pay?";
                    $urlParam = "merchantid=".$merchId;
                    $urlParam .= "&txnid=".$txnid."&amount=".number_format((float)$amount, 2, '.', ',')."&ccy=PHP&description=Payment for ".$param1."&email=".$param2."&digest=".$sha1digest;
                    $urlParam .= "&param1=".$param1."&param2=".$param2."&procid=".$procid;
                    return redirect($urlString);
                    // return redirect($urlString.($urlParam));
                    }else{
                         return redirect('/reseller/reservation/view');
                    }

                }
                else{
                    return redirect('/reseller/reservation/view');
                }
                
            }
        }else{
            session()->flush();
            $this->middleware('guest')->except('logout');
        }
    }
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session()->flush();
        $this->middleware('guest')->except('logout');
    }
}
