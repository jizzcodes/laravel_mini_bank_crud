<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\FlareClient\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $user = User::all();
        return View('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adduser()
    {
        return View('users.adduser'); 
    }


 

 



/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:6',
        ]);


 

        // $data = $request->all();

   
        $user = new User;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;


        // dd($data);

        
        $user->save();

         
        return back()->with('success','Successfully Registered');
           
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = user::find($id);

        return View('users.edituser',compact('user')); 

    }

    public function edit()
    {
        return View('users.edituser'); 
    }


    /**
     * Show the form for editing the specified resource.
     */
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->update();

         
        return redirect()->route('index')->with('update','Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return back()->with('delete','succesfully deleted');
    }
}
