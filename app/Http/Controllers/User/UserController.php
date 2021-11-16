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
        'role_id' => $request->get('role'),
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
        //
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
