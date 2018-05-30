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
        $result = $service->validateEmail($request->input("email"));
        dd($result);
        
        if($result == 1){
            return redirect('/pesquisar')->with('Success','O seu email consta na nossa base de dados');
        }else{
            return redirect('/pesquisar')->with('Error','O seu email não consta na nossa base de dados');
        }
        dd($result);
    }
}