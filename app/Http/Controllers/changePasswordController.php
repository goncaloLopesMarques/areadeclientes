<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Auth;

use Illuminate\Http\Request;

class changePasswordController extends Controller
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

 public function showChangePasswordForm(){
        return view('auth.changepassword');
   }

   public function changePassword(Request $request){
 
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","A password inserida não é igual com a que temos.");
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","A nova password não pode ser igual á sua antiga.");
    }

    $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
    ]);

    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with("success","Password changed successfully !");

}

}