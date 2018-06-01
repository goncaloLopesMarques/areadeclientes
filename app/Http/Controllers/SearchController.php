<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\User;
use GuzzleHttp\Client;
use App\Services\ClientService;


$sessId="";
$clientData="";

class SearchController extends Controller
{
    public function index(){
        return view('pages.searchPage');
    }

    public function pesquisar(Request $request, ClientService $service){
        $data = array();
    
        $result = $service->validateEmail($request->input("email"));
      
        if($result[0] == 1){
            
            $data=[
                'success' => 'O seu email consta na nossa base de dados',
                'email' => $request->input("email"),
                'id' => $result[1],
            ];
            //array_push($data,'O seu email consta na nossa base de dados',$request->input("email"));
           return redirect()->back()->with('Success',['data'=> $data]);
           
        }else{
            return redirect()->back()->with('Error','O seu email não consta na nossa base de dados');
        }
       
    }
}