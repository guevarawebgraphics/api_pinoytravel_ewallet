<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Reseller; to include reseller model in the app
use App\Reseller;

class AdminController extends Controller
{
    public function create()
    {
        return view('pages.dashboard');
    }
    public function login()
    {
        return view('pages.login');
    }
    // public function create()
    // {
    //     return view('pages.dashboard');
    // }



}
