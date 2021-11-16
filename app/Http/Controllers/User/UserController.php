<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use app\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userListing = User::orderBy('id','desc')->get();
         return view('admin.users.index' , compact('userListing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $role = $request->get('role');
        $roles = (explode("_",$role));
        $checkRoleId = $roles[0];
        $checkRoleName = $roles[1];

        $this->validate($request , [

            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'business' => 'required',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password'

        ]);

        $userRegistration = new user([


        'name' => $request->get('fname'),
        'l_name' => $request->get('lname'),
        'status' => "Active",
        'email' => $request->get('email'),
        'businessName' => $request->get('business'),
        'role_id' => $checkRoleId,
        'category' => $checkRoleName,
        'password' => Hash::make($request['password']),

        ]);

        $userRegistration->save();
        return back()->with('success','Successfully User Has Registered');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $userEdit = User::where('id' , '=' , $id)->first();
        return view('admin.users.edit' , compact('userEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request , [

            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'business' => 'required',
            'status' => 'required',
            'role' => 'required'

        ]);

        $userUpdate =  User::find($id);

        $userUpdate->name = $request->get('fname');
        $userUpdate->l_name = $request->get('lname');
        $userUpdate->email = $request->get('email');
        $userUpdate->businessName = $request->get('business');
        $userUpdate->status = $request->get('status');
        $userUpdate->role_id = $request->get('role');

        $userUpdate->save();


        return back()->with('success' , 'Successfully User Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
