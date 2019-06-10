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
        // dd($user->is_admin);
        if($user->is_admin == 1){
            return  redirect('/admin/view/all');
        }
        else{
            return redirect('/reseller/reservation/view');
        }
        // IF THE ADMIN WILL NOT BE ALLOWED TO ACCESS RESELLER ACCOUNT
        // else if($user->is_admin == 0){
        //     return redirect('/reseller/reservation/view');
        // }
    }
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
