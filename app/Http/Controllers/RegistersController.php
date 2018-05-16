<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistersController extends Controller
{
   public function registration(Request $request){
     $this->validate($request,[
        'name' => 'required|unique:users',
        'password' => 'required|confirmed|min:6',
        'emailCrm' => 'required',
        'idCrm' => 'required',
        'checked' => 'required',
     ]);

     $user = new User;
     $user->name = $request->input('name');
     $user->email = $request->input('emailCrm');
     $user->idCrm = $request->input('idCrm');
     $user->password = bcrypt($request->input('password'));
     $user->excluido = 0;
     $user->save();
     
     return redirect('/')->with('response','Registado com sucesso');
   }
}
