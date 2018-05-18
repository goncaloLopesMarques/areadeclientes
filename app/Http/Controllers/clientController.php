<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use Auth;
use Illuminate\Support\Facades\DB;

$sessId="";
$clientData="";
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
        
        DB::table('users')
            ->where('id', $id)
            ->update(['exclusaoData' => date('Y-m-d H:i:s')]);

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

        DB::table('users')
            ->where('id', $id)
            ->update(['alterouData' => date('Y-m-d H:i:s')]);
        return redirect()->back()->with('message', 'Os seus dados foram alterados com sucesso!');
        
    }

    public function exportFile(Request $request,ClientService $service){
        global $clientData;
        $clientId = Auth::user()->idCrm;  
        $clientData  = $service->GetSuiteCrmData($clientId);
        
         if($clientData  ==0){
            return redirect('/')->with('errorExcel','Erro a construir o excel, por favor volte a tentar ou entre em contacto conosco');
         }
       
         \Excel::create('Filename', function($excel) {

            $excel->sheet('Sheetname', function($sheet) {
                global $clientData;
                $excelKeys = array("Primeiro nome","Ultimo Nome","Telemovel","Telemovel Trabalho", "email", "morada"); 
                //remove os ultimos 2 indices que contem metadados que nao interessam ao cliente
                unset($clientData[count($clientData)-2]);
                unset($clientData[count($clientData)]);
             
                $sheet->row(1,$excelKeys);
                $sheet->row(2,$clientData);
                $sheet->row(3,$info = array("Se pretender mais informações contacte-nos pela area de cliente"));
            });
        })->export('xls');
    } 
    
}