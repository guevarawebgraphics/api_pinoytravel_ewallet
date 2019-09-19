<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Include Reseller Model
use App\User;
use App\Models\UserBalance;
use DB;
use App\Models\ViewTotalUserBalance;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, Request $request)
    {   

        $userBal = ViewTotalUserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->get();
        
        $user_record = DB::connection('mysql')->select("SELECT * FROM users WHERE id = '".auth()->user()->id."'");

        $searched = 0;

        $reseller = User::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        ->paginate(20);
    
        if($user_record[0]->is_blocked == 0){
            if($user_record[0]->is_admin == 1)
            {
                return  redirect('/admin/view/all');
            }
            else
            {
                return view('pages.reseller.reservation')->with('userBal', $userBal);
            }
        }else{
            session()->flush();
            $this->middleware('guest')->except('logout');
        }
    }
    public function admin(Request $req){
        return view('middleware')->withMessage("Admin");
    }


    public function test()
    {
        return 'test';
        // $reseller = Reseller::orderBy('created_at', 'desc')
        // ->where('is_blocked', '0')            
        // ->paginate(20);
        // return view('testing.test1', compact('reseller'));   
    }
    
}
