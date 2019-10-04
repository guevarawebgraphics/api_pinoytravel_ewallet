<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use DateTime;
use App\Models\UserBalance;


class ProfileController extends Controller
{
    public function index(){
        $userBal = UserBalance::where('userId', auth()->user()->id)
        ->orderBy('created_at','desc')
        ->take(1)
        ->get();
        return view('pages.reseller.profile')->with('userBal', $userBal);     
    }
}
