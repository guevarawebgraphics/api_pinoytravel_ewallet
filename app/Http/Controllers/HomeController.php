<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Include Reseller Model
use App\User;
use App\Models\UserBalance;

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
    public function index(User $user)
    {   
        // $userBal = UserBalance::where('userId', auth()->user()->id)->get();
        $searched = 0;
        // $reseller = Reseller::orderBy('created_at', 'desc')
        $reseller = User::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        ->paginate(20);
        // if($user->is_admin == 1){
            return view('pages.admin.view', compact('reseller', 'searched'));
        // }else{
        //     return view('pages.reseller.reservation')->with('userBal', $userBal);
        // }    
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
