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

    public function Index(ClientService $service)
    {
        
        $clientId = Auth::user()->idCrm;
        $result = $service->GetSuiteCrmData($clientId);

       
        // return view('clientHome')->with('result',$result);
        return view('pages.editarDados')->with('result',$result);

    }

    public function Exclusao(ClientService $service){

        $clientId = Auth::user()->idCrm;
        $result = $service->PedirExclusao($clientId); 
        return redirect('clientHome');
    }
    public function Remocao(ClientService $service){

        $clientId = Auth::user()->idCrm;
        $result = $service->PedirRemocao($clientId); 
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

        $clientId = Auth::user()->idCrm;
        $result = $service->AlterarDados($clientId,$data); 
        return redirect('clientHome');
        
    }


}