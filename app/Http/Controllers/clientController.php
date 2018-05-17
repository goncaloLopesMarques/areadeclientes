<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use Auth;

$sessId="";

class clientController extends Controller
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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function Index(Request $request,ClientService $service)
    {
        
        $clientId = Auth::user()->idCrm;  
        $result = $service->GetSuiteCrmData($clientId);
        if($result ==0){
            $request->session()->flush();
            return redirect('/')->with('semDados','Este utilizador não consta no nosso crm, se acha quem tem dados seus contacte-nos por email');
        }
       
        return view('pages.editarDados')->with('result',$result);

    }

    public function Exclusao(ClientService $service){

        $clientId = Auth::user()->idCrm;
        $id = Auth::user()->id;
        $clientEmail = Auth::user()->email;
        $result = $service->PedirExclusao($clientId,$clientEmail,$id); 
        return redirect('clientHome');
    }
    public function Remocao(ClientService $service){

        $clientId = Auth::user()->idCrm;
        $clientEmail = Auth::user()->email;
        $id = Auth::user()->id;
        $result = $service->PedirRemocao($clientId,$clientEmail,$id); 
        return redirect('clientHome');
    }

    public function AlterarDados(Request $request,ClientService $service){
        //validações
        $validatedData = $request->validate([
            'email' => 'required',
            'nome' => 'required',
        ]);
        
        $data=array();
        $aux;
        array_push($data,$request->nome,$request->apelido,$request->email,$request->telemovel,$request->telemovelDeTrabalho,$request->morada);
        
        for($i = 0;$i<= count($data)-1;$i++){

            $aux = strcmp($data[$i],NULL);
            if($aux == 0){
              $data[$i] = '';
            }
        }
        var_dump($data);
        $id = Auth::user()->id;
        $clientId = Auth::user()->idCrm;
        $clientEmail = Auth::user()->email;
        $result = $service->AlterarDados($clientId,$data,$clientEmail,$id); 
        return redirect()->back()->with('message', 'Os seus dados foram alterados com sucesso!');
        
    }


}