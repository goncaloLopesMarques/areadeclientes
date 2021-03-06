<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;



class RegistersController extends Controller
{
   public function registration(Request $request){
     $this->validate($request,[
        'username' => 'required|unique:users',
        'password' => 'required|confirmed|min:6',
        'emailCrm' => 'required',
        'idCrm' => 'required',
        'checked' => 'required',
     ]);
     $recaptcha = $request->input('g-recaptcha-response');
      if($recaptcha){
        //se entrar aqui quer dizer que há token, agora vamos validar
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
          'form_params' => array(
            'secret'    => '6LfU6VsUAAAAAOvqRF-dNEquTekd3VDxPuPzxUwt',
            'response'  => $recaptcha
          ) 
        ]);
        
        $result = json_decode($response->getBody()->getContents());
            if($result->success){
              $user = new User;
              $user->username = $request->input('username');
              $user->email = $request->input('emailCrm');
              $user->idCrm = $request->input('idCrm');
              $user->password = bcrypt($request->input('password'));
              $user->excluido = 0;
              $user->ip = $request->ip();
              $user->save();
      
              Mail::to($request->input('emailCrm'))->send(new Welcome($request));
              return redirect('/')->with('response','Registado com sucesso');
            }else{
              return redirect()->back()->with('response', 'A validação da recaptcha falhou');
            }
      }else{
        return redirect()->back()->with('response', 'Tem de confirmar que não é um robot');
      }
   }
}
