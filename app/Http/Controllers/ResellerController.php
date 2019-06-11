<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//Include User Model
use App\User;

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
        $resellers = User::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')
        ->where('is_admin', '0')            
        ->paginate(20);
        // return view('pages.reseller.create');
        // return view('pages.reseller.create', compact('resellers'));     x        
        return view('pages.admin.create', compact('resellers'));             
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
        //Show Reseller By ID :)
        // return Reseller::find($id);
        // $resellers = Reseller::findOrFail($id);        
        // return view('pages.viewRacct_form');    
        // $resellers = Reseller::find($id);
        // return $reseller;
        //USED
        // return view('pages.reseller.viewform', compact('reseller')); 
        //TEST
        // dd('test');
        $resellers = User::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')            
        ->where('is_admin', '0')
        ->paginate(20);
        return view('pages.admin.viewform', compact('reseller','resellers'));
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
         $resellers = User::orderBy('created_at', 'desc')
         ->where('is_blocked', '0')
         ->where('is_admin', '0')            
         ->paginate(20);
         return view('pages.admin.editform', compact('reseller','resellers')); 
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
    public function all()
    {
        //Use the model of reseller to get all the data of the reseller table
        // $resellers = Reseller::all();
        // $resellers = Reseller::orderBy('name', 'desc')->paginate(1);
        $searched = 0;
        // $reseller = Reseller::orderBy('created_at', 'desc')
        $resellers = User::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')  
        ->where('is_admin', '0')          
        ->paginate(20);
        return view('pages.admin.view', compact('resellers', 'searched'));    
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
        $resellers = User::orderBy('created_at', 'desc')
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

    // public function testall2(Request $request)
    // {
    //     // dd('SAD');
    //     // $search = $request->input('Search');
    //     // // dd($search);
    //     // $reseller = Reseller::orderBy('created_at', 'desc')
    //     // ->where('Name', 'like', '%'.$search.'%')
    //     // ->paginate(20);
        
    //     // return view('testing.test1', compact('reseller'));        


        
    //     // $reseller = Reseller::orderBy('created_at', 'desc')
    //     // ->where('is_blocked', '0')            
    //     // ->paginate(20);
    //     // return view('testing.test2', compact('reseller'));   
    // }
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
        $resellers = User::orderBy('created_at', 'desc')
        ->where('Name', 'like', '%'.$search.'%')
        ->where('is_admin', 0)
        ->paginate(20);
        //CHECK IF THE ADMIN IS SEARCHING IN THE WALLET PAGE OR NOT
        if($request->input('wallet_search') == 1){            
            return view('pages.admin.wallet', compact('resellers', 'searched'));         
            
        } else            
            return view('pages.admin.view', compact('resellers', 'searched'));         
        

    }


    //NEW ADDITIONS
    public function reservation()
    {
        // return 'this is reservation method from reseller controlelr';
        return view('pages.reseller.reservation');
    }
    public function commission()
    {
    //    return 'this is commission method in reseller controller';
        return view('pages.reseller.commission');
    }
    public function topup()
    {
        return view('pages.reseller.topup');
    }
}
