<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Include Reseller Model
use App\Reseller;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('pages.reseller.create');
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
            'Email' => 'required|email|unique:resellers,email',
            'Address' => 'required',
            'Contact' => array(
                        'required',
                        'regex:/^(09|\+639)\d{9}$/')
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

        $resellers = new Reseller;
        $resellers->name = $request->input('Name');
        $resellers->email = $request->input('Email');
        $resellers->address = $request->input('Address');
        $resellers->contact_no = $request->input('Contact');
        $resellers->password = \Hash::make('*pass@csi');
        $resellers->profile_pic = 'profile_pic';
        $resellers->save();

        // return 123;

        
        // return 123;
        // return redirect('pages.dashboard_1')->with('success', 'Reseller Created');
        // return redirect()->back()->with('message','Error Message Here');
        return redirect('/reseller/create')->with('success', 'Reseller Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reseller $reseller)
    {
        //Show Reseller By ID :)
        // return Reseller::find($id);
        // $resellers = Reseller::findOrFail($id);        
        // return view('pages.viewRacct_form');    
        // $resellers = Reseller::find($id);
        // return $reseller;
        return view('pages.reseller.viewform', compact('reseller')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseller $reseller)
    {
        // $resellers = Reseller::findOrFail($id);
        // echo $resellers; die;
        // return $resellers;
         return view('pages.reseller.editform', compact('reseller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseller $reseller)
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
                    'regex:/^(09|\+639)\d{9}$/')            
            ], $messages);
            // return 123;
        // return redirect('/dashboard/1')->with('success', 'Reseller Edited');
        // $resellers = Reseller::find($id);
        
        // echo $request->input('name');die;
        $reseller->name = $request->input('Name');
        $reseller->email = $request->input('Email');
        $reseller->address = $request->input('Address');
        $reseller->contact_no = $request->input('Contact');          
        // $resellers->password = \Hash::make($request->input('Password'));
        // $resellers->profile_pic = 'profile_pic';
        // echo $resellers->name; die;
        $reseller->save();
        // return 123;
        return redirect('reseller/'.$reseller->reseller_id.'/edit')->with('success', 'Reseller Updated');
    }
    else if($edit == 2)
    {
        // $resellers = Reseller::findOrFail($id);
        $reseller->is_blocked = 1;
        // echo $resellers; die;
        //DELETE (Will Block Reseller Account)
        $reseller->save();
        return redirect('reseller/delete')->with('error', 'Reseller Deleted');

    }
    else if($edit == 3)
    {
        // $resellers = Reseller::find($id);
        $reseller->on_hold = 1;
        // echo $resellers; die;
        //DELETE (Will Block Reseller Account)
        $reseller->save();
        return redirect('/reseller/hold')->with('error', 'Reseller ' . $reseller->name .' On Hold');

    }    
    else if($edit == 4)
    {
        // $resellers = Reseller::findOrFail($id);
        $reseller->on_hold = 0;
        // echo $resellers; die;
        //DELETE (Will Block Reseller Account)
        $reseller->save();
        return redirect('/reseller/hold')->with('error', 'Reseller ' . $reseller->name .' is active');

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
        $reseller = Reseller::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')            
        ->paginate(20);
        return view('pages.reseller.view', compact('reseller'));    
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
        $reseller = Reseller::orderBy('created_at', 'desc')
        ->where('is_blocked', '0')            
        ->paginate(20);
        return view('pages.reseller.wallet', compact('reseller'));   
        // return Reseller::where('name', 'Jon Snow')->get(); 
    }
}
